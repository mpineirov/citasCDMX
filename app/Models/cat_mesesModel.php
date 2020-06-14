<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class cat_mesesModel extends Model
{
    protected $connection = 'mysql';
    protected $table = 'cat_meses';
    public $timestamps = false;

    protected $fillable = [
        'dia_mes_inicio',
        'dia_mes_final',
        'descripcion'
    ];

    protected $prymaryKey = "id_cat_mes";
}
