<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class cat_horarioModel extends Model
{
    protected $connection = 'mysql';
    protected $table = 'cat_horario';
    public $timestamps = false;

    protected $fillable = [
        'id_cat_horario',
        'hora_inicio',
        'hora_final',
        'dias',
        'descripcion'
    ];

    protected $prymaryKey = "id_cat_horario";
}
