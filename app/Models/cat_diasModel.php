<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class cat_diasModel extends Model
{
    protected $connection = 'mysql';
    protected $table = 'cat_dias';
    public $timestamps = false;

    protected $fillable = [
        'id_cat_dia',
        'dia_inicio',
        'dia_final',
        'descripcion'
    ];

    protected $prymaryKey = "id_cat_dia";
}
