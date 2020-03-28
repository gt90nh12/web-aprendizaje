<!-- ************** Formulario admin *************** -->
@extends('connect.admin')
@section('titulo_pagina', 'Persona')
@section('descripcion_pagina', 'Formulario actualizar persona')
<!-- *********************************************** -->
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header bg-info">
                    <h4 class="mb-0 text-white">actualizar registro</h4>
                </div>
                <form action="{{$action}}" class="mt-5" novalidate>
                    @include('persona._form_persona')
                </form>
            </div>
        </div>
    </div>
@stop