<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class cat_tramiteModel extends Model
{
    protected $connection = 'mysql';
    protected $table = 'cat_tramite';
    public $timestamps = false;

    protected $fillable = [
        'id_cat_tramite',
        'name',
        'description',
        'programa',
        'control'
    ];

    protected $prymaryKey = "id_cat_tramite";
}
