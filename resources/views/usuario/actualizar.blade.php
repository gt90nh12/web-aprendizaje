<!-- ************** Formulario admin *************** -->
@extends('connect.admin')
@section('titulo_pagina', 'Usuario')
@section('descripcion_pagina', 'Formulario actualizar registro de usuario')
<!-- *********************************************** -->
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header bg-info">
                <h4 class="mb-0 text-white">Actualizar registro</h4>
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
            
            {!! Form::open(['url' => '/modificar_datos_usuario', 'enctype'=>'multipart/form-data', 'method'=>'post']) !!}
             {{-- <form action="{{route('modificar_datos_usuario')}}" class="mt-5" enctype="multipart/form-data" novalidate> --}}
              {{ csrf_field() }}
                <div class="form-body">
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <h5 class="form_descripcion">Imagen usuario</h5>
                                    <div class="card">
                                        <label for="input-file-now">
                                            <button type="button" class="btn waves-effect waves-light btn-sm btn-info">
                                                <i class="fas fa-exclamation"></i>
                                            </button>
                                            OJO Solo archivos png
                                        </label>
                                        {{-- <input type="file" id="input-file-now" name="direccion_imagen" class="dropify"
                                            data-allowed-file-extensions="png" data-default-file="{{ ('img/perfil_usuario/'.$usuario->direccion_imagen) }}" /> --}}
                                        {{-- <input type="file" id="input-file-now" name="direccion_imagen" class="dropify"
                                            data-allowed-file-extensions="png" data-default-file="http://localhost/aprendizaje/public/img/perfil_usuario/estudiante.png" /> --}}
                                        <input type="file" id="input-file-now" name="imagen" class="dropify"
                                            data-allowed-file-extensions="png" data-default-file="http://localhost/aprendizaje/public/img/perfil_usuario/{{ $usuario->direccion_imagen }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <h5 class="form_descripcion">Perfil usuario</h5>
                                    <div class="card">
                                        <label for="input-file-now">
                                            <button type="button" class="btn waves-effect waves-light btn-sm btn-info">
                                                <i class="fas fa-cog"></i>
                                            </button>
                                            Debe seleccionar un perfil
                                        </label>
                                        <div class="input-group">
                                            <ul class="icheck-list">
                                                <li>
                                                    <input tabindex="7" type="radio" class="check" id="minimal-radio-1"
                                                        name="rol" value="1">
                                                    <label for="minimal-radio-1">Director</label>
                                                </li>
                                                <li>
                                                    <input tabindex="8" type="radio" class="check" id="minimal-radio-2"
                                                        name="rol" value="2" checked>
                                                    <label for="minimal-radio-2">Profesor</label>
                                                </li>
                                                <li>
                                                    <input type="radio" class="check" id="minimal-radio-disabled" disabled>
                                                    <label for="minimal-radio-disabled">Estudiante</label>
                                                </li>
                                                <li>
                                                    <input type="radio" class="check" id="minimal-radio-disabled-checked"
                                                        checked disabled>
                                                    <label for="minimal-radio-disabled-checked">Padre de &amp;
                                                        familia</label>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="input-group">
                                        <label for="exampleInputEmail1">Numero de cédula de identidad</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">
                                                    <i class="ti-id-badge "></i>
                                                </span>
                                            </div>
                                            <input type="number" name="persona_id" class="form-control"
                                                value="{{ $usuario->persona_id }}" required disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Correo electronico</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">
                                                <i class="ti-email "></i>
                                            </span>
                                        </div>
                                        <input type="text" name="email" class="form-control" value="{{ $usuario->email }}"
                                            required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Contraseña</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">
                                                <i class="mdi mdi-key-variant"></i>
                                            </span>
                                        </div>
                                        <input type="text" name="password" class="form-control" value="********" required disabled>
                                        <input type="hidden" name="id" class="form-control" value="{{ $usuario->id }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Usuario</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">
                                                <i class="mdi mdi-account"></i>
                                            </span>
                                        </div>
                                        <input type="text" name='name' class="form-control" value="{{ $usuario->name }}"
                                            required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="card-body">
                            <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i>Guardar</button>
                            <a href="{{ route('listar_usuario') }}" class="btn btn-dark">Cancelar</a>
                        </div>
                    </div>
                </div>
            {{-- </form> --}}
            {!! Form::close() !!}
        </div>
    </div>
</div>
@stop
@section('archivos_script_form')
<!-- jQuery file upload -->
<script src='{{ ('assets/plugins/dropify/dist/js/dropify.min.js') }}'></script>
<script>
    $(document).ready(function () {
        $('.dropify').dropify({
            messages: {
                default: 'Arrastre un archivo o haga click',
                replace: 'Arrastre un archivo para reemplazar',
                remove: 'Eliminar',
                error: 'Lo sentimos, el archivo es demasiado grande.'
            }
        });
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
@stop
