<!-- ************** Formulario admin *************** -->
@extends('connect.admin')
@section('titulo_pagina', 'Persona')
@section('descripcion_pagina', 'Formulario registrar persona')
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
                <form action="{{route('registrar_persona')}}" class="mt-5" novalidate>
                    @include('persona._form_persona')
                </form>
            </div>
        </div>
    </div>
@stop

