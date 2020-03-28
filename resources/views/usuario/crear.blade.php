<!-- ************** Formulario admin *************** -->
@extends('connect.admin')
@section('titulo_pagina', 'Usuario')
@section('descripcion_pagina', 'Formulario registrar usuario')
<!-- *********************************************** -->
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header bg-info">
                    <h4 class="mb-0 text-white">Crear registro</h4>
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
                                    setTimeout(function(){$('.alert').slideUp(); }, 10000);
                                </script>
                            </div>
                        </div>
                    @endif
                <form method="post" action="{{route('almacenar_usuario')}}" class="mt-5" enctype="multipart/form-data" novalidate>
                    {{ csrf_field() }}
                    @include('usuario._form_usuario')
                </form>
            </div>
        </div>
    </div>
@stop
@section('archivos_script_form')
 <!-- checked - radio -->
    <script src="{{ ('assets/plugins/icheck/icheck.min.js') }}"></script>
    <script src="{{ ('assets/plugins/icheck/icheck.init.js') }}"></script>
@stop

