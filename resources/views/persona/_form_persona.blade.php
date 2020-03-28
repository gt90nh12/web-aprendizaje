<div class="form-body">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <h5 class="form_descripcion">Nombre <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="nombre" class="form-control" required
                            data-validation-required-message="El nombre es requerido" value="{{ $persona->nombre }}">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <h5 class="form_descripcion">Apellido Paterno</h5>
                    <div class="controls">
                        <input type="text" name="apellido_paterno" class="form-control" value="{{ $persona->apellido_paterno }}">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <h5 class="form_descripcion">Apellido Materno</h5>
                    <div class="controls">
                        <input type="text" name="apellido_materno" class="form-control" value="{{ $persona->apellido_materno }}">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <h5 class="form_descripcion">Genero <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <select name="genero" id="select" class="form-control" required
                            data-validation-required-message="El genero es requerido">
                            <option value="">Seleccione genero</option>
                            @if     ($persona->sexo == "mujer")
                                <option value="varon">Masculino</option>
                                <option value="mujer" selected>Femenino</option>
                            @elseif ($persona->sexo == "varon")
                                <option value="varon"selected>Masculino</option>
                                <option value="mujer">Femenino</option>
                            @else
                                <option value="varon">Masculino</option>
                                <option value="mujer">Femenino</option>
                            @endif
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <h5 class="form_descripcion">Cedula de Identidad <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="number" name="ci" class="form-control" required
                            data-validation-required-message="La cedula de identidad es requerido" value="{{ $persona->ci }}">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <h5 class="form_descripcion">Fecha de nacimiento<span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="date"  name="fecha_nacimiento" class="form-control" required
                            data-validation-required-message="La fecha de nacimiento es requerido" value="{{ $persona->fecha_nacimiento }}">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <h5 class="form_descripcion">Numero de celular</h5>
                    <div class="controls">
                        <input type="number" name="celular" class="form-control" value="{{ $persona->celular }}">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <h5 class="form_descripcion">Correo electronico<span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="email"  name="correo_electronico" class="form-control" required
                            data-validation-required-message="El correo electronico es requerido" value="{{ $persona->correo_electronico }}">
                        <input type="hidden" name="estado" value="{{ $persona->estado }}">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="form-actions">
        <div class="card-body">
            <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i>Guardar</button>
            <a href="{{ route('listar_persona') }}" class="btn btn-dark">Cancelar</a>
        </div>
    </div>
</div>