<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class cat_inhabilesModel extends Model
{
    protected $connection = 'mysql';
    protected $table = 'cat_inhabiles';
    public $timestamps = false;

    protected $fillable = [
        'id_dias_inhabiles',
        'fecha',
        'observacion'
    ];

    protected $prymaryKey = "id_dias_inhabiles";
}
