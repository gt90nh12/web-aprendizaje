<!--             llamar ala plantilla del administrador             -->
@extends('connect.admin')
@section('titulo_pagina', 'Técnica de la Cadena')
@section('descripcion_pagina', 'Formulario crear técnica de la cadena')
<!-- ************************************************************** -->
@section('archivos_style_form')
<link href="{{ ('assets/plugins/wizard/steps.css') }}" rel="stylesheet">
<!-- Dropzone css -->
<link href="{{ ('assets/plugins/dropzone-master/dist/dropzone.css') }}" rel="stylesheet" type="text/css" />
@stop
@section('content')
<!-- Validation wizard -->
<div class="row" id="validation">
    <div class="col-12">
        <div class="card wizard-content">
            <div class="card-body">
                <h4 class="card-title">Crear tecnica</h4>
                {{-- <h6 class="card-subtitle">Debe ingresar todos los datos para crear el juego.</h6> --}}
                {{-- <form action="#" class="validation-wizard wizard-circle"> --}}
                <!-- Seccino de errrores-->
                {{-- <form method="post" action="{{route('almacenar_tec_cadena')}}" class="mt-5"
                enctype="multipart/form-data" novalidate> --}}
                {!! Form::open(['url' => 'almacenar_tec_cadena', 'class'=>'validation-wizard wizard-circle',
                'files'=>'true']) !!}
                {{ csrf_field() }}
                @if(Session::has('message'))
                <div class="container">
                    <div class="alert alert-{{ Session::get('typealert') }}" style="display:none;">
                        {{ Session::get('message')}}
                        @if ($errors->any())
                        <ul>
                            @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        @endif
                        <script>
                            $('.alert').slideDown();
                            setTimeout(function () {
                                $('.alert').slideUp();
                            }, 10000);

                        </script>
                    </div>
                </div>
                @endif
                <!-- Step 1 -->
                <h6>Descripción</h6>
                <section>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="titulo">Título :</label>
                                <input type="text" name="titulo" class="form-control required" required
                                    data-validation-required-message="El campo título es requerido." id="titulo">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="descripcion">Descripción :</label>
                                <textarea name="descripcion" id="descripcion" rows="6" class="form-control required"
                                    required
                                    data-validation-required-message="El campo descripcion es requerido."></textarea>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Step 2 -->
                <h6>Contenido</h6>
                <section>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card">
                                            <input type="file" name="imagen[]" value="" multiple>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Step 3 -->
                <h6>Step 3</h6>
                <section>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="nivel">Nivel de complejidad :</label>
                                <select name="nivel" id="select" class="form-control required" required
                                    data-validation-required-message="El campo nivel de complejidad es requerido."
                                    id="nivel">
                                    <option value="">Seleccione genero</option>
                                    <option value="bajo">Bajo</option>
                                    <option value="medio">Medio</option>
                                    <option value="alto">Alto</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="puntuacion">Puntuación:</label>
                                <input type="number" name="puntaje" class="form-control required" required
                                    data-validation-required-message="El campo puntuación de juego es requerido."
                                    id="puntuacion">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="tiempo_juego">Tiempo de juego:</label>
                                <input type="time" name="tiempo" class="form-control required" required
                                    data-validation-required-message="El campo tiempo de juego es requerido."
                                    id="tiempo_juego">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="fecha_inicio">Fecha inicio de juego:</label>
                                <input type="date" name="fecha_inicio" class="form-control requiredo" required
                                    data-validation-required-message="El campo fecha de inicio de juego es requerido."
                                    id="fecha_inicio">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="fecha_fin">Fecha fin de juego:</label>
                                <input type="date" name="fecha_fin" class="form-control required" required
                                    data-validation-required-message="El campo fecha de finalización de juego es requerido."
                                    id="fecha_fin">
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Step 4 -->
                <h6>Step 4</h6>
                <section>
                    <div class="row">
                        <div class="col-md-12">
                            <input type="submit" value="Guardar">
                        </div>
                    </div>
                </section>
                </form>
            </div>
        </div>
    </div>
</div>


@stop
@section('archivos_script_form')
<!-- Dropzone Plugin JavaScript -->
<script src="{{ ('assets/plugins/dropzone-master/dist/dropzone.js') }}"></script>
<!--Custom JavaScript -->
<script src="{{ ('assets/plugins/moment/moment.js') }}"></script>
<script src="{{ ('assets/plugins/wizard/jquery.steps.min.js') }}"></script>
<script src="{{ ('assets/plugins/wizard/jquery.validate.min.js') }}"></script>
<!-- Sweet-Alert  -->
<script src="{{ ('assets/plugins/sweetalert/sweetalert.min.js') }}"></script>
<script src="{{ ('assets/plugins/wizard/steps.js') }}"></script>
@stop
