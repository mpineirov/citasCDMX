<?php


namespace App\Repositories;

use App\Models\citaModel;
use Illuminate\Support\Facades\DB;

class CitaRepository extends Repository
{
    public function model()
    {
        return citaModel::class;
    }

    public function getCita($placa, $curp, $estatus = 1)
    {
        $cita = $this->model->where('placa', $placa)
            ->where("curp", $curp)
            ->where('estatus',1)->first();

        if(is_null($cita)){
            return false;
        }

        return $cita;
    }


    public function getDisponibilidad($modulo, $fecha)
    {
        return $this->model->whereDate('fecha_cita', $fecha)
            ->where("modulo_id", $modulo)
            ->where('estatus',1)->count();
    }

    public function getActivas()
    {
        return $this->model->where('estatus',1)->get();
    }

    public function getCitaFechasOcupadas($id_modulo, $fecha)
    {
        $citas = $this->model->select('fecha_cita')
            ->whereDate('fecha_cita', $fecha)
            ->where("modulo_id", $id_modulo)
            ->where('estatus',1)->get();

        $fechas = array();
        foreach ($citas as $cita) {
            $fechas[] = $cita["fecha_cita"];
        }
        return $fechas;
    }

    public function crearCita($placa,$curp,$tramite_id,$modulo_id,$fecha)
    {
        try{
            return $this->model->create([
                'placa' => $placa,
                'curp' => $curp,
                'tramite_id' => $tramite_id,
                'modulo_id' => $modulo_id,
                'fecha_cita' => $fecha,
                'estatus' => 1,
                'ip' => request()->getClientIp()
            ]);
        }catch (\Exception $exception){
            return $exception->getMessage();
        }
    }

    public function asistencia($id)
    {
        try{
            $cita = $this->model->where('id_cita',$id)->first();

            $estatus = $cita->update(["estatus" => 3]);

            if($cita instanceof citaModel and $estatus === true){
                return $cita;
            }

            return false;
        }catch (\Exception $exception){
            return false;
        }
    }

    public function reagendar($id)
    {
        try{
            $cita = $this->model->where('id_cita',$id)->first();

            $estatus = $cita->update(["estatus" => 2]);

            if($cita instanceof citaModel and $estatus === true){
                return $cita;
            }

            return false;
        }catch (\Exception $exception){
            return $exception->getMessage();
        }
    }

    public function comprobante($id)
    {
        try{
            $cita = $this->model->where('id_cita',$id)->first();
            return $cita;
        }catch (\Exception $exception){
            return $exception->getMessage();
        }
    }
}
