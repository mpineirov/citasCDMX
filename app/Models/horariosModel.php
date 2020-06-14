<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class horariosModel extends Model
{
    protected $connection = 'mysql';
    protected $table = 'horarios';
    public $timestamps = false;

    protected $fillable = [
        'cat_horario_id',
        'cat_modulo_id',
        'cat_dia_id',
        'cat_mes_id',
        'cat_tramite_id'
    ];

}
