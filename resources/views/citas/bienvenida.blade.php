@extends('layouts.cita')

@section('title', 'Inicio')

@section('content_header')
    <h1>Inicio</h1>
@stop

@section('content')
    <div class="container">

        @if($errors->any() and $errors->all()[0] == 0)
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>¡Advertencia!</strong> Su cita ya existe.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @elseif($errors->any() and $errors->all()[0] == 1)
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>¡Exito!</strong> La cita se creo correctamente.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @elseif($errors->any() and $errors->all()[0] == 2)
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>¡Error!</strong> La cita no se creo.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @elseif($errors->any() and $errors->all()[0] == 3)
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>¡Adertencia!</strong> La cita que intenta buscar no existe.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @elseif($errors->any() and $errors->all()[0] == 4)
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>¡Exito!</strong> La cita se reagendo correctamente.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @elseif($errors->any() and $errors->all()[0] == 5)
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>¡Error!</strong> La cita no se reagendo correctamente.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <div class="card">
            <div class="card-header">
                <h3 class="card-title font-weight-bold">Solicitud de citas</h3>
            </div>
            <div class="card-body">
                <p class="card-text">Bienvenido al sistema de <strong>citas en Linea</strong>.
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <a class="nav-link" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Registrar Cita</a>
                            <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Consulta o cancela tu cita</a>
                          </div>
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content" id="v-pills-tabContent">
                            <div class="tab-pane fade" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="list-group list-group-flush">
                                             @if(isset($tramites))
                                                @foreach($tramites as $tramite)
                                                    <a href="{{ route('registro', $tramite->name) }}" class="list-group-item list-group-item-action">{{ $tramite->description }}</a>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                  </div>
                            </div>
                            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                <form action="{{ url('consulta') }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label>PLACA:</label>
                                        <input type="text" class="form-control" name="placa" placeholder="Ingresa aquí" required>
                                    </div>
                                    <div class="form-group">
                                        <label>CURP:</label>
                                        <input type="text" class="form-control" name="curp" placeholder="Ingresa aquí" required>
                                    </div>
                                    <button type="submit" class="btn btn-lg btn-secondary">Consultar/Cancelar cita</button>
                                </form>
                            </div>
                          </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@stop
