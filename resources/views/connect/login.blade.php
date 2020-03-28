@extends('connect.master')
@section('title', 'Iniciar sesión')
@section('content')
<!-- ============================================================== -->
    <!--  Iniciar sesion -->
    <!-- ============================================================== -->
    <section id="wrapper" class="login-register login-sidebar"
        style="background-image:url({{ ('assets/images/background/fondo.jpg') }});">
        <div class="login-box card">
            <div class="card-body">
            {!! Form::open(['url' => '/login_user']) !!}
                    <img src="{{ ('assets/logo/logo_aprendizaje.jpeg') }}" id="logo_sistema" alt="Home" /></a>

                    <div class="form-group mt-5">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" placeholder="Usuario" name="name" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" type="password" placeholder="contraseña" name="password" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                  
                            <a href="javascript:void(0)" id="to-recover" class="text-dark float-right"><i
                                    class="fa fa-lock mr-1"></i> Olvidé mi contraseña</a> </div>
                    </div>
                    <div class="form-group text-center mt-3">
                        <div class="col-xs-12">
                            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light"
                                type="submit">Iniciar sesión</button>
                        </div>
                    </div>
                    <div class="form-group mb-0">
                        <div class="col-sm-12 text-center">
                            <p>¿No tienes una cuenta? <a href="{{url('/registro_usuario')}}"
                                    class="text-primary ml-1"><b>Regístrate</b></a></p>
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