@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

@stop

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center"><i class="fas fa-list-ul"></i> Citas</div>

                    <div class="card-body text-center">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                            <br>
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
                            </div>
                            <br>

                            <div class="row">
                                <div class="form-group col-md-6 text-center">
                                    <label for="nombre">NOMBRE</label>
                                    <input class="form-control text-center fs-B1" name="nombre" id="nombre" value="" readonly required>
                                </div>

                                <div class="form-group col-md-6 text-center">
                                    <label for="curp">CURP</label>
                                    <input class="form-control text-center fs-B1" name="curp"  id="curp" value="" readonly disabled>
                                </div>

                                <div class="form-group col-md-6 text-center">
                                    <label for="descripcion">DESCRIPCION</label>
                                    <input class="form-control text-center fs-B1" name="descripcion" id="descripcion" value="" readonly disabled>
                                </div>

                                <div class="form-group col-md-6 text-center">
                                    <label for="fecha">FECHA CITA</label>
                                    <input class="form-control text-center fs-B1" name="fecha" id="fecha" value="" readonly disabled>
                                </div>

                                <div class="col-md-3">
                                </div>
                                <div class="col-md-6">
                                    <input type="submit" class="btn btn-outline-success btn-block fas" value="ASISTIO">
                                </div>
                                <div class="col-md-3">
                                </div>
                            </div>

                            <br>
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
