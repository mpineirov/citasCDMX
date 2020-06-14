<?php

namespace App\Http\Controllers\Citas;

use App\Http\Controllers\Controller;
use App\Traits\CitasRepositories;
use Illuminate\Http\Request;

class CitasController extends Controller
{
    use CitasRepositories;
    public function bienvenida(){
        $tramites = $this->tramite()->all();
        return view('citas.bienvenida')->with('tramites',$tramites);
    }
}
