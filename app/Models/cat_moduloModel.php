<?php

namespace App\Models;

use App\Models\Citas\Catalogos\Dia;
use App\Models\Citas\Catalogos\DiasInhabiles;
use App\Models\Citas\Catalogos\Hora;
use App\Models\Citas\Catalogos\Mes;
use Illuminate\Database\Eloquent\Model;

class cat_moduloModel extends Model
{
    protected $connection = 'mysql';
    protected $table = 'cat_modulo';
    protected $primaryKey = 'id_modulo';

    protected $fillable = [
        'estatus',
        'nombre',
        'direccion',
        'num_citas',
        'num_ventanillas',
        'altitud',
        'latitud'
    ];

    public function meses(){
        return $this->belongsToMany(cat_mesesModel::class,
            'horarios','cat_modulo_id','cat_mes_id','id_modulo','id_cat_mes');
    }

    public function dias(){
        return $this->belongsToMany(cat_diasModel::class,
            'horarios','cat_modulo_id','cat_dia_id','id_modulo','id_cat_dia');
    }

    public function horas(){
        return $this->belongsToMany(cat_horarioModel::class,
            'horarios','cat_modulo_id','cat_horario_id','id_modulo','id_cat_horario');
    }

    public function inhabiles(){
        return $this->belongsToMany(cat_inhabilesModel::class,
            'inhabil_modulo','modulo_id','inhabil_id','modulo_id','id_dias_inhabiles');
    }
}
