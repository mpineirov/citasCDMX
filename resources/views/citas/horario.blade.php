@extends('layouts.cita')

@section('title', 'Inicio')

@section('content_header')
    <h1>Inicio</h1>
@stop

@section('content')
    <div class="container">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title font-weight-bold">Seleccionar horario</h3>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Placa:</label>
                                <input type="text" class="form-control" id="placa" name="placa" value="{{ $placa }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Curp:</label>
                                <input type="text" class="form-control" id="curp" name="curp" value="{{ $curp }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Tramite:</label>
                                <input type="text" class="form-control" id="tramite" name="tramite" value="{{ $tramite }}">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Modulos disponibles</label>
                                <select class="form-control" name="modulo" id="modulo">
                                    <option disabled value="default" selected>Seleccionar modulo</option>
                                    @if(isset($modulos))
                                        @foreach($modulos as $modulo)
                                            <option data-direccion='{{$modulo->direccion}}' value="{{ $modulo->id_modulo }}" onclick="cargarModulo()">{{ $modulo->nombre }}</option>
                                        @endforeach
                                    @endif
                                </select>
                                <label id="llenarDireccion"></label>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="row" id="llenarFechas"></div>
                        </div>
                    </div>
                </div>


                <div class="card card-footer">
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="{{ url('/') }}" class="btn btn-secondary">Regresar</a>
                    </div>
                </div>

            </div>

    </div>



    <!-- Modal -->
    <div class="modal fade" id="modalFecha" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('guardar') }}" method="post">
                    @csrf
                <div class="modal-body">

                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Placa:</label>
                            <input type="text" class="form-control" id="placa" name="placa">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Curp:</label>
                            <input type="text" class="form-control" id="curp" name="curp">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Tramite:</label>
                            <input type="text" class="form-control" id="tramite" name="tramite">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Dia:</label>
                            <input type="text" class="form-control" id="dia" name="fecha">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Modulo:</label>
                            <input type="text" class="form-control" id="direccion" name="direccion">
                        </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>

@stop

@section('js')
    <script>
        $('#modulo').on("change", function () {
            var modulo = $(this).val();
            var divFechas = $('#llenarFechas');
            var moduloDireccion = $('#llenarDireccion');
            moduloDireccion.text($('#modulo option:selected').data('direccion'))
            divFechas.html("");
            url = '/api/fecha/' + modulo;
            axios.get(url)
                .then(horarios => {
                    html = ''
                    $.each(horarios.data, function (index, horario) {
                        moment.locale('es');
                        f = moment(horario.dia);
                        dia = f.format('dddd', 'es').toUpperCase();
                        ff = f.format('DD-MM-YYYY');
                        html = html +
                            '<div class="card text-center" style="cursor: pointer" ' +
                            'data-toggle="modal" ' +
                            'data-target="#modalFecha" ' +
                            'data-placa="' + $('#placa').val() +'" ' +
                            'data-curp="' + $('#curp').val() +'" ' +
                            'data-tramite="' + $('#tramite').val() +'" ' +
                            'data-fecha="' + f +'" ' +
                            'data-direccion="' + $('#modulo option:selected').data('direccion') + '">'+
                            '<div class="card-header">'+
                            '<h5>' + dia + '</h5>'+
                            '</div>'+
                            '<div class="card-body">'+
                            '<h5 class="card-title">' + horario.dia + '</h5>'+
                            '<p class="card-text">Disponibles: <code>' + horario.disponibilidad + '</code></p>'+
                            '</div>'+
                            '</div>';
                    });
                    divFechas.html(html)
                });
        });

        $('#modalFecha').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var fecha = button.data('fecha')
            var direccion = button.data('direccion')
            var tramite = button.data('tramite')
            var placa = button.data('placa')
            var curp = button.data('curp')
            f = moment(fecha);
            dia = f.format('dddd', 'es').toUpperCase();
            mes = f.format('MMMM', 'es').toUpperCase();
            anio = f.format('YYYY', 'es').toUpperCase();
            ff = f.format('YYYY-MM-DD');
            fechaBonita = dia + ", " + f.format('DD') + " de " + mes + " del " + anio;
            var modal = $(this)
            modal.find('.modal-title').text('¿Seguro que quieres agendar tu cita?');
            modal.find('#dia').val(ff)
            modal.find('#direccion').val(direccion)
            modal.find('#placa').val(placa)
            modal.find('#curp').val(curp)
            modal.find('#tramite').val(tramite)
        })

        function aceptarFecha(fecha) {
            alert(fecha)
        }

    </script>
@stop
