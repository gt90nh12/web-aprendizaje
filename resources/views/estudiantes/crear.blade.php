<!-- ************** Formulario admin *************** -->
@extends('connect.admin')
@section('titulo_pagina', 'Estudiante')
@section('descripcion_pagina', 'Formulario registrar estudiante')
<!-- *********************************************** -->
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header bg-info">
                    <h4 class="mb-0 text-white">Crear registro</h4>
                </div>
                <form action="{{ url('/almacenar_estudiante')}}" class="mt-5" novalidate>
                    @include('estudiantes._form')
                </form>
            </div>
        </div>
    </div>
                                {{-- <form class="mt-5" novalidate>
                                    <div class="form-group">
                                        <h5>Basic Text Input <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="text" class="form-control" > </div>
                                        <div class="form-control-feedback"><small>Add <code>required</code> attribute to field for required validation.</small></div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Email Field <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="email" name="email" class="form-control" required data-validation-required-message="This field is required"> </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Password Input Field <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="password" name="password" class="form-control" required data-validation-required-message="This field is required"> </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Repeat Password Input Field <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="password" name="password2" data-validation-match-match="password" class="form-control" required> </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>File Input Field <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="file" name="file" class="form-control" required> </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Input with Icon <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Addon To Right" data-validation-required-message="This field is required">
                                                <div class="input-group-append">
                                                    <span class="input-group-text">$</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Maximum Character Length <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="maxChar" class="form-control" required data-validation-required-message="This field is required" maxlength="10">
                                        </div>
                                        <div class="form-control-feedback"><small>Add <code>maxlength='10'</code> attribute for maximum number of characters to accept. </small></div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Minimum Character Length <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="minChar" class="form-control" required data-validation-required-message="This field is required" minlength="6">
                                        </div>
                                        <div class="form-control-feedback"><small>Add <code>minlength="6"</code> attribute for minimum number of characters to accept.</small></div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Only Numbers <span class="text-danger">*</span></h5>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">$</span>
                                            </div>
                                            <input type="number" name="onlyNum" class="form-control" required data-validation-required-message="This field is required">
                                            <div class="input-group-append">
                                                <span class="input-group-text">.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Maximum Number <span class="text-danger">*</span></h5>
                                        <input type="text" name="maxNum" class="form-control" required data-validation-required-message="This field is required" max="25">
                                        <div class="form-control-feedback"> <small><i>Must be lower than 25</i></small> - <small>Add <code>max</code> attribute for maximum number to accept. Also use <code>data-validation-max-message</code> attribute for max failure message</small> </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Minimum Number <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="minNum" class="form-control" required data-validation-required-message="This field is required" min="10">
                                        </div>
                                        <div class="form-control-feedback"><small><i>Must be higher than 10</i></small> - <small>Add <code>min</code> attribute for minimum number to accept. Also use <code>data-validation-min-message</code> attribute for min failure message</small></div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Text Input Range <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="text" class="form-control" required data-validation-required-message="This field is required" minlength="10" maxlength="20" placeholder="Enter number between 10 &amp; 20"> </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Input with Button <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Search" required>
                                                <div class="input-group-append">
                                                    <button class="btn btn-info" type="button">Go!</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>No Characters, Only Numbers <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="noChar" class="form-control" required data-validation-containsnumber-regex="(\d)+" data-validation-containsnumber-message="No Characters Allowed, Only Numbers"> </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Pattern <span class="text-danger">*</span> <small><i>Must start with 'a' and end with 'z'</i></small></h5>
                                        <div class="controls">
                                            <input type="text" name="pattern" pattern="a.*z" data-validation-pattern-message="Must start with 'a' and end with 'z'" class="form-control" required>
                                            <div class="form-control-feedback"><small>Add <code>pattern</code> attribute to set input pattern. Also use <code>data-validation-pattern-message</code> attribute for pattern failure message</small></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Enter URL <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" class="form-control" placeholder="Add URL" data-validation-regex-regex="((http[s]?|ftp[s]?):\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*" data-validation-regex-message="Only Valid URL's">
                                            <div class="form-control-feedback"><small>Add <code>data-validation-regex-regex</code> attribute for regular expression. Also use <code>data-validation-regex-message</code> attribute for regex failure message</small></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Enter Email Address <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" class="form-control" placeholder="Email Address" data-validation-regex-regex="([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})" data-validation-regex-message="Enter Valid Email"> </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Enter Date <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" class="form-control" placeholder="MM/DD/YYYY" data-validation-regex-regex="([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})" data-validation-regex-message="Enter Valid Email"> </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Basic Select <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="select" id="select" required class="form-control">
                                                <option value="">Select Your City</option>
                                                <option value="1">India</option>
                                                <option value="2">USA</option>
                                                <option value="3">UK</option>
                                                <option value="4">Canada</option>
                                                <option value="5">Dubai</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Textarea <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <textarea name="textarea" id="textarea" class="form-control" required placeholder="Textarea text"></textarea>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Checkbox <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <label class="custom-control custom-checkbox">
                                                        <input type="checkbox" required value="single" name="styled_single_checkbox" class="custom-control-input"><span class="custom-control-label">Check this custom checkbox</span> </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Checkbox Group <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <fieldset>
                                                        <label class="custom-control custom-checkbox">
                                                            <input type="checkbox" value="x" name="styled_checkbox" required class="custom-control-input"><span class="custom-control-label">I am unchecked Checkbox</span> </label>
                                                    </fieldset>
                                                    <fieldset>
                                                        <label class="custom-control custom-checkbox">
                                                            <input type="checkbox" value="y" name="styled_checkbox" class="custom-control-input"><span class="custom-control-label">I am unchecked too</span> </label>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Select Max 2 Checkbox<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <fieldset>
                                                        <label class="custom-control custom-checkbox">
                                                            <input type="checkbox" name="styled_max_checkbox" data-validation-maxchecked-maxchecked="2" data-validation-maxchecked-message="Don't be greedy!" required class="custom-control-input"><span class="custom-control-label">I am unchecked Checkbox</span> </label>
                                                    </fieldset>
                                                    <fieldset>
                                                        <label class="custom-control custom-checkbox">
                                                            <input type="checkbox" name="styled_max_checkbox" class="custom-control-input"><span class="custom-control-label">I am unchecked too</span> </label>
                                                    </fieldset>
                                                    <fieldset>
                                                        <label class="custom-control custom-checkbox">
                                                            <input type="checkbox" name="styled_max_checkbox" class="custom-control-input"><span class="custom-control-label">You can check me</span> </label>
                                                    </fieldset>
                                                </div> <small>Select any 2 options</small> </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Minimum 2 Checkbox selection<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <fieldset>
                                                        <label class="custom-control custom-checkbox">
                                                            <input type="checkbox" value="1" data-validation-minchecked-minchecked="2" data-validation-minchecked-message="Choose at least two" name="styled_min_checkbox" required class="custom-control-input"><span class="custom-control-label">I am unchecked Checkbox</span> </label>
                                                    </fieldset>
                                                    <fieldset>
                                                        <label class="custom-control custom-checkbox">
                                                            <input type="checkbox" value="2" name="styled_min_checkbox" class="custom-control-input"><span class="custom-control-label">I am unchecked too</span> </label>
                                                    </fieldset>
                                                    <fieldset>
                                                        <label class="custom-control custom-checkbox">
                                                            <input type="checkbox" value="3" name="styled_min_checkbox" class="custom-control-input"><span class="custom-control-label">You can check me</span> </label>
                                                    </fieldset>
                                                </div> <small>Select any 2 options</small> </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Radio Buttons <span class="text-danger">*</span></h5>
                                                <fieldset class="controls">
                                                    <label class="custom-control custom-radio">
                                                        <input type="radio" value="1" name="styled_radio" required id="styled_radio1" class="custom-control-input"><span class="custom-control-label">Check Me</span> </label>
                                                </fieldset>
                                                <fieldset>
                                                    <label class="custom-control custom-radio">
                                                        <input type="radio" value="2" name="styled_radio" id="styled_radio2" class="custom-control-input"><span class="custom-control-label">Or Me</span> </label>
                                                </fieldset>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Inline Radio Buttons <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <fieldset>
                                                        <label class="custom-control custom-radio">
                                                            <input type="radio" value="Yes" name="styled_inline_radio" required id="styled_radio_inline1" class="custom-control-input"><span class="custom-control-label">Check Me</span> </label>
                                                    </fieldset>
                                                    <fieldset>
                                                        <label class="custom-control custom-radio">
                                                            <input type="radio" value="No" name="styled_inline_radio" id="styled_radio_inline2" class="custom-control-input"><span class="custom-control-label">Or Me</span> </label>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-xs-right">
                                        <button type="submit" class="btn btn-info">Submit</button>
                                        <button type="reset" class="btn btn-inverse">Cancel</button>
                                    </div>
                                </form> --}}
@stop

