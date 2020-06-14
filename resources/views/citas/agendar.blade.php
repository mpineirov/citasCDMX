@extends('layouts.cita')

@section('title', 'Inicio')

@section('content_header')
    <h1>Inicio</h1>
@stop

@section('content')
    <div class="container">

        <form action="{{ route('horario',$tramite) }}" method="post">

        <div class="card">
            <div class="card-header">
                <h3 class="card-title font-weight-bold">Agendar citas</h3>
            </div>

            <div class="card-body">
                <p class="card-text">Ingrese los datos indicados.
            </div>

            <div class="card-body">
                <form action="{{ url('consultar.show') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Placa</label>
                        <input type="text" class="form-control" name="placa" placeholder="Ingresa aquí" required>
                    </div>
                    <div class="form-group">
                        <label>Curp</label>
                        <input type="text" class="form-control" name="curp" placeholder="Ingresa aquí" required>
                    </div>

                </form>
            </div>

            <div class="card card-footer">
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{{ url('/') }}" class="btn btn-secondary">Regresar</a>
                    <button type="submit" class="btn btn-success">Agendar</button>
                </div>
            </div>

        </div>

        </form>

    </div>
@stop
