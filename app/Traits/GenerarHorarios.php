<?php


namespace App\Traits;


use App\Models\Citas\Cita;
use Carbon\Carbon;

trait GenerarHorarios
{
    use CitasRepositories;

    protected function generarDiasDisponibles($id_modulo)
    {
        $dias_disponibles = array();
        $modulo = $this->modulos()->getHorario($id_modulo);

        foreach ($modulo['horarios'] as $horario)
        {
            $fecha_tramites_inicio = now()->copy()->addDay(1);

            $dia_inico = Carbon::createFromFormat('Y-m-d',$horario['mes_inicio']);
            $dia_fin = Carbon::createFromFormat('Y-m-d',$horario['mes_final']);
            #dd($dia_inico,$dia_fin);

            #$dia_inico = Carbon::createFromFormat('Y-m-d H:i:s',$fecha_tramites_inicio);
            #$dia_fin = Carbon::createFromFormat('Y-m-d H:i:s',$dia_inico->copy()->addDay(15));

            $dias_total = $dia_inico->diff($dia_fin)->days;

            for($i = 0; $i <= $dias_total; $i++)
            {
                $dia = array();
                $dia_ciclo = $dia_inico->copy()->addDays($i);

                $ndia = (int)$dia_ciclo->dayOfWeek;
                $ndia_inicio = (int)$horario['dia_inicio'];
                $ndia_fin = (int)$horario['dia_final'];

                if(array_search($dia_ciclo->format('Y-m-d'),array_column($dias_disponibles,'dia')) === false
                and ($ndia >= $ndia_inicio and $ndia <= $ndia_fin))
                {
                    $dia["dia"] = $dia_ciclo->format('Y-m-d');

                    $disponibles = (int)$this->cita()->getDisponibilidad($id_modulo,$dia["dia"]);
                    $disponibles = (int)$modulo['num_citas'] - $disponibles;
                    $dia["disponibilidad"] = $disponibles;

                    if($dia["dia"] >= '2020-06-01' and $dia["dia"] <= '2020-06-14'){
                        $dia["disponibilidad"] = 0;
                    }

                    if(array_search($dia["dia"], array_column($modulo['inhabiles'], 'fecha')) !== false) {
                        //dias inhabiles
                        $pos_inhabil = array_search($dia["dia"], array_column($modulo['inhabiles'], 'fecha'));
                        $dia["inhabil"] = true;
                        $dia["inhabil_observacion"] = $modulo['inhabiles'][$pos_inhabil]['observacion'];
                    }

                    $dias_disponibles[] = $dia;
                }
            }
        }
        return $dias_disponibles;
    }

    protected function generarHorariosDisponibles($id_modulo)
    {
        $array = array();
        $modulo = $this->modulos()->getHorario($id_modulo);

        foreach($modulo['horarios'] as $horario){
            $array[$horario['mes_inicio'].$horario['mes_final'].$horario['dia_inicio'].$horario['dia_final']][] = $horario;

        }

        return $array;
    }

    protected function generarCitaFinal($id_modulo,$dia)
    {

        if(trim($dia ?? '') == ''){
            return false;
        }

//        $dia = date("Y-m-d",strtotime($dia));
        $dia = new Carbon($dia);
        $dia = $dia->format('Y-m-d');

        $citas_aplican = array();
        $no_aplica = array();
        $citas_disponibles = array();
        $limites = array();

        $modulo = $this->modulos()->getHorario($id_modulo);

        $citasOcupadas = $this->cita()->getCitaFechasOcupadas($id_modulo,$dia);
        $limites = array_count_values($citasOcupadas);

        foreach ($modulo['horarios'] as $horario)
        {
            if($dia >= $horario['mes_inicio'] and $dia <= $horario['mes_final'])
            {
                $dia_cita_inico = new Carbon($dia.' '.$horario['hora_inicio']);
                $dia_cita_fin = new Carbon($dia.' '.$horario['hora_final']);

                $minutos_total = $dia_cita_inico->diffInMinutes($dia_cita_fin);

                $rango_minutos = (int)$horario['hora_duracion_citas'];
                $ventanillas = (int)$modulo['numero_ventanillas'];

                $rango_horario = round($minutos_total / $rango_minutos);

                for($i = 0; $i <= $rango_horario; $i++)
                {
                    array_push($citas_disponibles,$dia_cita_inico);
                    $dia_cita_inico = $dia_cita_inico->copy()->addMinute($rango_minutos);
                }
            }
        }

        if(trim($rango_minutos ?? '') == '' or trim($ventanillas ?? '') == ''){
            return false;
        }

        foreach($limites as $dialimite => $limite){
            if($limite >= $ventanillas){
                array_push($no_aplica,$dialimite);
            }
        }

        $citas_aplican = array_diff($citas_disponibles, $no_aplica);

        //dd($citas_disponibles);
       //dd($modulo['horarios'],$id_modulo,$dia,$rango_minutos,$ventanillas,$citasOcupadas,$limites,$citas_disponibles, $no_aplica,$citas_aplican);

        if(is_array($citas_aplican) and count($citas_aplican) <= 0){
            return false;
        }

        $citaFinal = $this->getHorarioAleatorio($citas_aplican);

        if($dia != $citaFinal->format('Y-m-d')){
            return false;
        }

        return $citaFinal;
    }

    private function getHorarioAleatorio($citas){
        $citas = array_values($citas); //Las llaves del array despues del array_dif se modifican, con esto se reinician.
        $longitud = count($citas) - 1 ;
        return $citas[random_int(0 , $longitud)];
    }

    private function reajusteEspecial($hora_inicio,$hora_fin,$rango)
    {
        $count = 0;
        $masminutos = " +".$rango." minutes";
        $inicio =  date('H:i:s',strtotime($hora_inicio));
        $final =  date('H:i:s',strtotime($hora_fin));
        while ($inicio !== $final){
            $count++;
            $inicio =  date("H:i:s",strtotime($inicio.$masminutos));
        }
        return $count;
    }

}
