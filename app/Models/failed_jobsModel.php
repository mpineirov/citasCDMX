<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class failed_jobsModel extends Model
{
    protected $connection = 'mysql';
    protected $table = 'failed_jobs';
    public $timestamps = false;

    protected $fillable = [
        'id',
        'connection',
        'queue',
        'payload',
        'exception',
        'failed_at'
    ];

    protected $prymaryKey = "id";
}
