@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

@stop

@section('content')
    <div class="container">

        @if($errors->any() and $errors->all()[0] == 0)
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>¡Exito!</strong> La cita se actualizo correctamente.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @elseif($errors->any() and $errors->all()[0] == 1)
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>¡Error!</strong> La cita no se actualizo.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

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

                        <div class="container text-center">
                            <table class="table text-center">
                                <thead class="thead-light text-center">
                                <tr role="row" class="text-center">
                                    <th>CURP</th>
                                    <th>PLACA</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody class="text-center">
                                    @if(isset($citas))
                                        @foreach($citas as $cita)
                                            <tr>
                                                <td>{{ $cita->curp }}</td>
                                                <td>{{ $cita->placa }}</td>
                                                <td>
                                                    <a href="{{ url('asistencia/'. $cita->id_cita )}}" class="btn btn-outline-dark btn-block"><i class="fas fa-info-circle"></i> ASISTENCIA</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
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
