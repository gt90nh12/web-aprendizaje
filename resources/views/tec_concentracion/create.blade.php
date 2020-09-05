<!--             llamar ala plantilla del administrador             -->
@extends('connect.admin')
@section('titulo_pagina', 'Técnica de la Cadena')
@section('descripcion_pagina', 'Formulario crear técnica de la cadena')
<!-- ************************************************************** -->

@section('archivos_style_form')
<!--        Wizard       -->
<link href="{{ ('assets/plugins/wizard/steps.css') }}" rel="stylesheet">
<!--        Dropify     -->
<link rel="stylesheet" href="{{ ('assets/plugins/dropify/dist/css/dropify.min.css') }}">
<!--        Switchery     -->
{{-- <link rel="stylesheet" href="{{ ('assets/plugins/select2/dist/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ ('assets/plugins/switchery/switchery.css') }}">
<link rel="stylesheet" href="{{ ('assets/plugins/bootstrap-select/bootstrap-select.min.css') }}">
<link rel="stylesheet" href="{{ ('assets/plugins/multiselect/css/multi-select.css') }}"> --}}

@section('content')
<!-- Validation wizard -->
<div class="row" id="validation">
    <div class="col-12">
        <div class="card wizard-content">
            <div class="card-body">
                <h4 class="card-title">Crear tecnica</h4>
                <!-- Seccino de errrores-->
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
                                    setTimeout(function(){$('.alert').slideUp(); }, 10000);
                                </script>
                            </div>
                        </div>
                    @endif
                {!! Form::open(['url' => 'almacenar_tec_concentracion', 'class'=>'validation-wizard wizard-circle',
                'files'=>'true']) !!}
                {{ csrf_field() }}
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
                        <div class="col-md-6">
                            <label for="jobTitle1">Cargar archivo: </label>
                            
                                <input type="file" name="cancion" id="input-file-now-custom-1" class="dropify"
                                    data-default-file="{{ ('assets/images/imagenes_sistema/music.jpg') }}" required/>
                       
                            <!-- Row -->
                            <label for="videoUrl1">Cantante de la canción: </label>
                            <input type="text" class="form-control" name="cantante" id="videoUrl1" required>
                            <!-- Row -->

                            <!-- Row -->
                            <label for="videoUrl1">Artistas cantantes: </label><br />
                            <div id="artista_cancion"></div>
                            <div class="row">
                                <div class="col-sm-12 nopadding">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="artistas[]" value=""
                                                placeholder="Ingresé el artista" required>
                                            <div class="input-group-append">
                                                <button class="btn btn-success" type="button"
                                                    onclick="adicionar_artistasCantantes();"><i class="fa fa-plus"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Row -->
                        </div>
                        <div class="col-md-6">
                            <label for="videoUrl1">Letra de la canción: </label><br />
                            <textarea name="letra" id="letras_musica" class="form-control" rows="7" placeholder="Ingrese la letra de la canción" required></textarea>
                            <!-- Row -->
                            <label for="videoUrl1">Seleccionar las palabras de la canción: </label><br />
                            <div id="palabra_de_cancion"></div>
                            <div class="row">
                                <div class="col-sm-12 nopadding">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="palabras[]" value=""
                                                placeholder="Ingresé la palabra" required>
                                            <div class="input-group-append">
                                                <button class="btn btn-success" type="button"
                                                    onclick="education_fields();"><i class="fa fa-plus"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Row -->
                        </div>
                    </div>
                </section>
                <!-- Step 3 -->
                <h6>Reglas</h6>
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
                <h6>Guardar</h6>
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

<!--Custom JavaScript -->
<script src="{{ ('assets/plugins/moment/moment.js') }}"></script>
<script src="{{ ('assets/plugins/wizard/jquery.steps.min.js') }}"></script>
<script src="{{ ('assets/plugins/wizard/jquery.validate.min.js') }}"></script>
{{-- <script src="{{ ('assets/plugins/switchery/switchery.js') }}"></script>
<script src="{{ ('assets/plugins/select2/dist/js/select2.full.min.js') }}"></script>
<script src="{{ ('assets/plugins/bootstrap-select/bootstrap-select.min.js') }}"></script>
<script src="{{ ('assets/plugins/multiselect/js/jquery.multi-select.js') }}"></script> --}}
<script>
    $(document).ready(function () {
        jQuery.extend(jQuery.validator.messages, {
            required: "Este campo es obligatorio.",
            remote: "Por favor, rellena este campo.",
            email: "Por favor, escribe una dirección de correo válida",
            url: "Por favor, escribe una URL válida.",
            date: "Por favor, escribe una fecha válida.",
            dateISO: "Por favor, escribe una fecha (ISO) válida.",
            number: "Por favor, escribe un número entero válido.",
            digits: "Por favor, escribe sólo dígitos.",
            creditcard: "Por favor, escribe un número de tarjeta válido.",
            equalTo: "Por favor, escribe el mismo valor de nuevo.",
            accept: "Por favor, escribe un valor con una extensión aceptada.",
            maxlength: jQuery.validator.format("Por favor, no escribas más de {0} caracteres."),
            minlength: jQuery.validator.format("Por favor, no escribas menos de {0} caracteres."),
            rangelength: jQuery.validator.format(
                "Por favor, escribe un valor entre {0} y {1} caracteres."),
            range: jQuery.validator.format("Por favor, escribe un valor entre {0} y {1}."),
            max: jQuery.validator.format("Por favor, escribe un valor menor o igual a {0}."),
            min: jQuery.validator.format("Por favor, escribe un valor mayor o igual a {0}.")
        });
    });

</script>
<!-- Sweet-Alert & wizard -->
<script src="{{ ('assets/plugins/sweetalert/sweetalert.min.js') }}"></script>
<script src="{{ ('assets/plugins/wizard/steps.js') }}"></script>

<!-- jQuery file upload -->
<script src="{{ ('assets/plugins/dropify/dist/js/dropify.min.js') }}"></script>
<script>
    $(document).ready(function () {
        // Basic
        $('.dropify').dropify();

        // Translated
        $('.dropify-fr').dropify({
            messages: {
                default: 'Glissez-déposez un fichier ici ou cliquez',
                replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                remove: 'Supprimer',
                error: 'Désolé, le fichier trop volumineux'
            }
        });

        // Used events
        var drEvent = $('#input-file-events').dropify();

        drEvent.on('dropify.beforeClear', function (event, element) {
            return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
        });

        drEvent.on('dropify.afterClear', function (event, element) {
            alert('File deleted');
        });

        drEvent.on('dropify.errors', function (event, element) {
            console.log('Has Errors');
        });

        var drDestroy = $('#input-file-to-destroy').dropify();
        drDestroy = drDestroy.data('dropify')
        $('#toggleDropify').on('click', function (e) {
            e.preventDefault();
            if (drDestroy.isDropified()) {
                drDestroy.destroy();
            } else {
                drDestroy.init();
            }
        })
    });

</script>

<!-- ============================================================== -->
<!-- Incluir un campo de texto mas -->
<!-- ============================================================== -->
<script src="{{ ('assets/plugins/dff/dff.js') }}" type="text/javascript"></script>

@stop
