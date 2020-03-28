<!-- Formulario admin-->
@extends('connect\admin')
@section('titulo_pagina', 'Roles')
@section('descripcion_pagina', 'Formulario listar Rol de usuario')
<!-- -->
@section('content')
<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Listar de registros</h4>
                <!-- Button trigger modal -->
                <button type="button" class="btn float-right hidden-sm-down btn-success" data-toggle="modal"
                    data-target="#exampleModal"><i class="mdi mdi-plus-circle"></i>
                    Crear nuevo usuario
                </button>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Crear Nuevo Rol de usuario</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
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
                                {!! Form::open(['url' => '/crear_rol_usuario', 'files'=>'true']) !!}
                                <div class="form-group">
                                    <label for="rol_usuario">Nombre de rol</label>
                                    <input type="text" id="rol_usuario" name="nombre" class="form-control"
                                        placeholder="Ingrese el nombre de rol de usuario.">
                                </div>
                                <div class="form-group">
                                    <label for="rol_descripcion">Descripción</label>
                                    <input type="text" id="rol_descripcion" name="descripcion" class="form-control"
                                        placeholder="Ingrese la descripción del rol de usuario.">
                                </div>
                                <div class="form-group">
                                    <h5 class="form_descripcion">Imagen que represente al rol</h5>
                                    <div class="card">
                                        <label for="input-file-now">
                                            <button type="button" class="btn waves-effect waves-light btn-sm btn-info">
                                                <i class="fas fa-exclamation"></i>
                                            </button>
                                            OJO Solo archivos png
                                        </label>
                                        <input type="file" id="input-file-now" name="direccion_imagen" class="dropify"
                                            data-allowed-file-extensions="png" required />
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>


                {{-- <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6> --}}
                <div class="table-responsive m-t-40">
                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered"
                        cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Identificador</th>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th>Imagen</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Identificador</th>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th>Imagen</th>
                                <th>Acción</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @if(!empty($roles))
                            @foreach($roles as $rol)
                            @php
                            $datos = $rol->id."||".
                            $rol->nobre."||".
                            $rol->descripcion."||".
                            $rol->direccion_imagen."||";
                            @endphp
                            <tr>
                                <td>{{ $rol->id}}</td>
                                <td>{{ $rol->nobre}}</td>
                                <td>{{ $rol->descripcion}}</td>
                                <td>{{ $rol->direccion_imagen}}</td>
                                <td>
                                    <img class="img-lista img-responsive"
                                        src="http://localhost/aprendizaje/public/img/roles_usuario/{{ $rol->direccion_imagen }}">
                                </td>
                                <td>
                                    <a href="#" class="btn btn-warning footable-edit fas fas fa-edit" data-toggle="modal" data-target="#modalEdicion" onclick="agregarform('<?php echo $datos ?>')"> </a>
                                    @if($rol->estado==true)
                                    <a href="{{ route('estado_role', $rol->id) }}" class="btn btn-success  fas fa-arrow-alt-circle-up"></a>
                                    @elseif($rol->estado==false)
                                    <a href="{{ route('estado_role', $rol->id) }}" class="btn btn-danger fas fa-arrow-alt-circle-down"></a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>

                <!-- Modal modificar datos de rol de usuario-->
                <div class="modal fade" id="modalEdicion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Actualizar registro de Rol de usuario</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
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
                                {!! Form::open(['url' => '/modificar_rol_usuario', 'files'=>'true']) !!}
                                <input type="hidden" id="IdUsuario" name="IdUsuario">
                                <div class="form-group">
                                    <label for="rol_usuario">Nombre de rol</label>
                                    <input type="text" id="RolUsuario" name="nombre" class="form-control"
                                        placeholder="Ingrese el nombre de rol de usuario.">
                                </div>
                                <div class="form-group">
                                    <label for="rol_descripcion">Descripción</label>
                                    <input type="text" id="RolDescripcion" name="descripcion" class="form-control"
                                        placeholder="Ingrese la descripción del rol de usuario.">
                                </div>
                                <div class="form-group">
                                    <h5 class="form_descripcion">Imagen que represente al rol</h5>
                                    <div class="card">
                                        <label for="perfil_usuario">
                                            <button type="button" class="btn waves-effect waves-light btn-sm btn-info">
                                                <i class="fas fa-exclamation"></i>
                                            </button>
                                            OJO Solo archivos png
                                        </label>
                                        <input type="file" id="perfil_usuario" name="direccion_imagen" class="dropify"
                                            data-allowed-file-extensions="png"/>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-warning"">Actualizar</button>
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- End PAge Content -->
<!-- ============================================================== -->
<!-- ================================ jQuery file upload ================================ -->
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
                remove: 'eliminar',
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
<script>
    function agregarform(datos) {
        console.log(datos)
        var d   = datos.split('||');
        $('#IdUsuario').val(d[0]);
        $('#RolUsuario').val(d[1]);
        $('#RolDescripcion').val(d[2]);
        var direccion_imagen  = "http://localhost/aprendizaje/public/img/perfil_usuario/"+d[3]; console.log(direccion_imagen);
        var              img  =  document.getElementById('perfil_usuario');
        img.setAttribute("data-default-file", direccion_imagen);
    }

</script>
@stop
