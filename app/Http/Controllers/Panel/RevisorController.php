<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\citaModel;
use App\Traits\CitasRepositories;
use Illuminate\Http\Request;

class RevisorController extends Controller
{
    use CitasRepositories;
    public function listado(){
        $citas = $this->cita()->getActivas();
        return view('panel.listado')->with('citas',$citas);
    }

    public function asistencia($id)
    {
        $cita = $this->cita()->asistencia($id);
        $citas = $this->cita()->getActivas();

        if(isset($cita) and $cita->estatus == 3){
            return view('panel.listado')->with('citas',$citas)->withErrors(['creo' => 0]);
        }else{
            return view('panel.listado')->with('citas',$citas)->withErrors(['creo' => 1]);
        }
    }
}
