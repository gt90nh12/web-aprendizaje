<div class="form-body">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <h5 class="form_descripcion">Nombre <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="nombre" name="nombre" class="form-control" required
                            data-validation-required-message="El nombre es requerido">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <h5 class="form_descripcion">Apellido Paterno</h5>
                    <div class="controls">
                        <input type="apellido_paterno" name="apellido_paterno" class="form-control">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <h5 class="form_descripcion">Apellido Materno</h5>
                    <div class="controls">
                        <input type="text" name="apellido_materno" class="form-control">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <h5 class="form_descripcion">Genero <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <select name="sexo" id="select" class="form-control" required
                            data-validation-required-message="El genero es requerido">
                            <option value="">Seleccione genero</option>
                            <option value="masculino">Masculino</option>
                            <option value="femenino">Femenino</option>
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
                            data-validation-required-message="La cedula de identidad es requerido">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <h5 class="form_descripcion">Fecha de nacimiento<span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="date"  name="fecha_nacimiento" class="form-control" required
                            data-validation-required-message="La fecha de nacimiento es requerido">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <h5 class="form_descripcion">Numero de celular</h5>
                    <div class="controls">
                        <input type="text" name="celular" class="form-control">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <h5 class="form_descripcion">Correo electronico<span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="email"  name="correo_electronico" class="form-control" required
                            data-validation-required-message="El correo electronico es requerido">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="form-actions">
        <div class="card-body">
            <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
            <button type="button" class="btn btn-dark">Cancel</button>
        </div>
    </div>
</div>
