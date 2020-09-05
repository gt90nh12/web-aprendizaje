<!-- ************** Formulario admin *************** -->
@extends('connect.admin')
@section('titulo_pagina', 'Concentracion')
@section('descripcion_pagina', 'Formulario actualizar tecnica de la concentración')
<!-- *********************************************** -->
@section('archivos_style_form')
<!--        Wizard       -->
<link href="{{ ('assets/plugins/wizard/steps.css') }}" rel="stylesheet">
<!--        Dropify     -->
<link rel="stylesheet" href="{{ ('assets/plugins/dropify/dist/css/dropify.min.css') }}">
@stop

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header bg-info">
                <h4 class="mb-0 text-white">Actualizar registro</h4>
            </div>
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
                                        setTimeout(function () {
                                            $('.alert').slideUp();
                                        }, 10000);

                                    </script>
                                </div>
                            </div>
                            @endif
                            {{-- <form action="{{$action}}" class="validation-wizard wizard-circle" enctype="multipart/form-data" novalidate> --}}
                            {!! Form::open(['url' => "$action", 'class'=>'validation-wizard wizard-circle', 'files'=>'true']) !!}
                             {{-- {{ csrf_field() }} --}}
                                @include('tec_concentracion._form_tec_concentracion')
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @stop
        </div>
    </div>
</div>
@php
$artistas = $tecConcentracion->artistas;
$palabras = $tecConcentracion->palabras;

@endphp
@stop

@section('archivos_script_form')
<!--Custom JavaScript -->
<script src="{{ ('assets/plugins/moment/moment.js') }}"></script>
<script src="{{ ('assets/plugins/wizard/jquery.steps.min.js') }}"></script>
<script src="{{ ('assets/plugins/wizard/jquery.validate.min.js') }}"></script>
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
<!-- Incluir un campo de texto mas -->
<script src="{{ ('assets/plugins/dff/dff.js') }}" type="text/javascript"></script>

<script>
    var artistas = @php echo $artistas;
    @endphp;
    for (var i = 0; i < artistas.length; i += 1) {
        room++;
        var objTo = document.getElementById('artista_cancion')
        var divtest = document.createElement("div");
        divtest.setAttribute("class", "form-group removeclass" + room);
        var rdiv = 'removeclass' + room;
        divtest.innerHTML =
            '<div class="row"><div class="col-sm-12 nopadding"><div class="form-group"><div class="input-group"><input type="text" class="form-control" name="artistas[]" value="' +
            artistas[i] +
            '" placeholder="Ingresé el artista" required><div class="input-group-append"> <button class="btn btn-danger" type="button" onclick="eliminar_artista_de_cancion(' +
            room + ');"> <i class="fa fa-minus"></i> </button></div></div><div class="clear"></div></row>';
        objTo.appendChild(divtest)
    }

    var palabras = @php echo $palabras;
    @endphp;
    for (var i = 0; i < palabras.length; i += 1) {
        room++;
        var objTo = document.getElementById('palabra_de_cancion')
        var divtest = document.createElement("div");
        divtest.setAttribute("class", "form-group removeclass" + room);
        var rdiv = 'removeclass' + room;
        divtest.innerHTML =
            '<div class="row"><div class="col-sm-12 nopadding"><div class="form-group"><div class="input-group"><input type="text" class="form-control" name="palabras[]" value="' +
            palabras[i] +
            '" placeholder="Ingresé la palabra" required><div class="input-group-append"> <button class="btn btn-danger" type="button" onclick="eliminar_palabra_de_cancion(' +
            room + ');"> <i class="fa fa-minus"></i> </button></div></div><div class="clear"></div></row>';

        objTo.appendChild(divtest)

    }

</script>
@stop
