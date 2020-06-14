<?php


namespace App\Repositories;

use App\Models\cat_moduloModel;

class ModuloRepository extends Repository
{
    function model()
    {
        return cat_moduloModel::class;
    }

    public function getModulo($id)
    {
        return $this->findBy("id_modulo", $id);
    }

    public function getModulosActivos()
    {
        return $this->model->where("estatus", 1)->get();
    }

    public function getModuloRojo()
    {
        return $this->model->where("clave", 'rojo')->get();
    }

    public function getModuloVerdeAmarillo()
    {
        return $this->model->where("clave", 'no_rojo')->get();
    }

    public function getHorario($id_modulo)
    {
        $horarios = array();
        $modulo = $this->model->find($id_modulo);

        for ($i = 0; $i < count($modulo->meses()->get()); $i++){
            $horarios[$i]['mes_inicio'] = $modulo->meses()->get()[$i]['dia_mes_inicio'];
            $horarios[$i]['mes_final'] = $modulo->meses()->get()[$i]['dia_mes_final'];
            $horarios[$i]['mes_descricion'] = $modulo->meses()->get()[$i]['descripcion'];
            $horarios[$i]['dia_inicio'] = $modulo->dias()->get()[$i]['dia_inicio'];
            $horarios[$i]['dia_final'] = $modulo->dias()->get()[$i]['dia_final'];
            $horarios[$i]['dia_descripcion'] = $modulo->dias()->get()[$i]['descripcion'];
            $horarios[$i]['hora_inicio'] = $modulo->horas()->get()[$i]['hora_inicio'];
            $horarios[$i]['hora_final'] = $modulo->horas()->get()[$i]['hora_final'];
            $horarios[$i]['hora_duracion_citas'] = $modulo->horas()->get()[$i]['duracion_citas'];
        }

        $modulo['inhabiles'] = $modulo->inhabiles()->get()->toArray();
        $modulo['horarios'] = $horarios;
        return $modulo;
    }

}
