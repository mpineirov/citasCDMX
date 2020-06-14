<?php


namespace App\Traits;
use App\Repositories\CitaRepository;
use App\Repositories\ModuloRepository;
use App\Repositories\TramiteRepository;
use Illuminate\Container\Container;

trait CitasRepositories
{
    public function cita(){
        return new CitaRepository(Container::getInstance());
    }

    public function tramite(){
        return new TramiteRepository(Container::getInstance());
    }

    public function modulos(){
        return new ModuloRepository(Container::getInstance());
    }
}
