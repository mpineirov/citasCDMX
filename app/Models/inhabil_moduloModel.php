<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class inhabil_moduloModel extends Model
{
    protected $connection = 'mysql';
    protected $table = 'inhabil_modulo';
    public $timestamps = false;

    protected $fillable = [
        'inhabil_id',
        'modulo_id'
    ];

    protected $prymaryKey = "inhabil_id";
    protected $prymaryKey2 = "modulo_id";
}
