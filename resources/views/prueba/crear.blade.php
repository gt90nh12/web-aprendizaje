<!-- ************** Formulario admin *************** -->
@extends('connect.admin')
@section('titulo_pagina', 'Pueba general')
@section('descripcion_pagina', 'Formulario registrar prueba')
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
                    <h4 class="mb-0 text-white">Crear pregunta</h4>
                </div>
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
                                setTimeout(function () { $('.alert').slideUp(); }, 10000);
                            </script>
                        </div>
                    </div>
                @endif
                {!! Form::open(['url' => 'almacenar_prueba', 'class'=>'validation-wizard wizard-circle', 'files'=>'true', 'novalidate'=>'true']) !!}
                    @include('prueba._form_prueba')
                </form>
            </div>
        </div>
    </div>
@stop

@section('archivos_script_form')
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
