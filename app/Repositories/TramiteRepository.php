<?php


namespace App\Repositories;

use App\Models\cat_tramiteModel;

class TramiteRepository extends Repository
{
    function model()
    {
        return cat_tramiteModel::class;
    }
}
