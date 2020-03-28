@extends('connect.master')
@section('title', 'Registro Usuario')
@section('content')
<!-- ============================================================== -->
<!--  Iniciar sesion -->
<!-- ============================================================== -->
<section id="wrapper" class="login-register login-sidebar"
    style="background-image:url({{ ('assets/images/background/fondo.jpg') }});">
    <div class="login-box card">
        <div class="card-body">
            {!! Form::open(['url' => '/almacenar_usuario']) !!}
                <div class="form-body">
                    <h4 class="card-title titulo_Rusuario">Registro de usuario</h4>
                    <div class="form-group mb-2">
                        <label for="input1">Nombre</label>
                        <input type="text" class="form-control" name="nombre" required>
                    </div>
                    <div class="form-group mb-2">
                        <label for="input2">Correo electronico</label>
                        <input type="email" class="form-control" name="correo" required>
                    </div>
                    <div class="form-group mb-2">
                        <label for="input3">Contraseña</label>
                        <input type="password" class="form-control"  name="contrasenia" required>
                    </div>
                    <div class="form-group mb-2">
                        <label for="input3">Repita contraseña</label>
                        <input type="password" class="form-control" name="rcontrasenia" required>
                    </div>
                    <div class="form-actions">
                        <div class="card-body">
                            <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Guardar</button>
                            <a class="btn btn-dark" href="{{ url('/login')}}">Salir</a>
                        </div>
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
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</section>
<!-- ============================================================== -->
<!-- Finaliza inicio de sesion -->
<!-- ============================================================== -->
@stop
