@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

@stop

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card animate__animated animate__rotateIn animate__delay-1s">
                    <div class="card-header text-center"><i class="fas fa-clipboard"></i> BIENVENIDO</div>

                    <div class="card-body text-center">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <b>Aquí podrás visualizar el registro de las citas, y administrar las asistencias de cada una.</b>
                        <div align="center">
                            <img src="vendor/adminlte/dist/img/CDMXL.png" alt="Image" class="center" height="500" width="500">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"/>
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
