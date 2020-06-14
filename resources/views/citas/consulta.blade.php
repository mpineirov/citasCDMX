@extends('layouts.cita')

@section('title', 'Inicio')

@section('content_header')
    <h1>Inicio</h1>
@stop

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title font-weight-bold">Consultar citas</h3>
            </div>

            <div class="card-body">
            </div>

            <div class="card-body">
                <table class="table">
                    <tbody>
                    <tr>
                        <th>CURP</th>
                        <td>{{ $cita->curp }}</td>
                    </tr>
                    <tr>
                        <th>PLACA</th>
                        <td>{{ $cita->placa }}</td>
                    </tr>
                    <tr>
                        <th>FECHA</th>
                        <td>{{ $cita->fecha_cita }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <div class="card card-footer">
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{{ url('/') }}" class="btn btn-secondary">Regresar</a>
                    <a href="{{ route('reagendar', $cita->id_cita) }}" class="btn btn-danger">Re-agendar</a>
                    <a href="{{ route('comprobante', $cita->id_cita) }}" class="btn btn-success">Comprobante</a>
                </div>
            </div>

        </div>
    </div>
@stop
