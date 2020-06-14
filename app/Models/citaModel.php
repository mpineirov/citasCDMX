<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class citaModel extends Model
{
    protected $table = 'cita';
    protected $primaryKey = 'id_cita';

    protected $fillable = [
        'curp',
        'placa',
        'tramite_id',
        'modulo_id',
        'fecha_cita',
        'estatus',
        'ip'
    ];
}
