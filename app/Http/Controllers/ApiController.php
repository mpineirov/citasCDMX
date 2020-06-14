<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponse;
use App\Traits\GenerarHorarios;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    use ApiResponse, GenerarHorarios;

    public function getFechas($id_modulo){
        $dias = $this->generarDiasDisponibles($id_modulo);
        return $this->showMessage($dias,200);
    }

    public function getHorarios($id_modulo){
        $horarios = $this->generarHorariosDisponibles($id_modulo);
        return $this->showMessage($horarios,200);
    }

    public function getCitaFinal($dia,$id_modulo){
        $cita = $this->generarCitaFinal($id_modulo,$dia);
        return $this->showMessage($cita,200);
    }
}
