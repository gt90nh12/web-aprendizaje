var room = 1;

function education_fields() {

    room++;
    var objTo = document.getElementById('palabra_de_cancion')
    var divtest = document.createElement("div");
    divtest.setAttribute("class", "form-group removeclass" + room);
    var rdiv = 'removeclass' + room;
    divtest.innerHTML = '<div class="row"><div class="col-sm-12 nopadding"><div class="form-group"><div class="input-group"><input type="text" class="form-control" name="palabras[] value="" placeholder="Ingresé la palabra" required><div class="input-group-append"> <button class="btn btn-danger" type="button" onclick="eliminar_palabra_de_cancion(' + room + ');"> <i class="fa fa-minus"></i> </button></div></div><div class="clear"></div></row>';

    objTo.appendChild(divtest)
}

function eliminar_palabra_de_cancion(rid) {
    $('.removeclass' + rid).remove();
}


function adicionar_artistasCantantes() {
    room++;
    var objTo = document.getElementById('artista_cancion')
    var divtest = document.createElement("div");
    divtest.setAttribute("class", "form-group removeclass" + room);
    var rdiv = 'removeclass' + room;
    divtest.innerHTML = '<div class="row"><div class="col-sm-12 nopadding"><div class="form-group"><div class="input-group"><input type="text" class="form-control" name="artistas[]" value="" placeholder="Ingresé el artista" required><div class="input-group-append"> <button class="btn btn-danger" type="button" onclick="eliminar_artista_de_cancion(' + room + ');"> <i class="fa fa-minus"></i> </button></div></div><div class="clear"></div></row>';
    objTo.appendChild(divtest)
}


function eliminar_artista_de_cancion(rid) {
    $('.removeclass' + rid).remove();
}

// respuestas encuesta general tipo de pregunta (SELECCION MULTIPLE)
function adicionar_respuesta_multiple() {
    room++;
    var objTo = document.getElementById('respuesta_multiple')
    var divtest = document.createElement("div");
    divtest.setAttribute("class", "form-group removeclass" + room);
    var rdiv = 'removeclass' + room;
    divtest.innerHTML = `<div class="row">
    <div class="col-sm-1 nopadding">
        <input type="checkbox" name="checkbox`+ room +`">
    </div>
    <div class="col-sm-8 nopadding">
        <input type="text" class="form-control" name="opcion[]" value="" placeholder="Ingresé el respuesta"
            required>
    </div>
    <div class="col-sm-2 nopadding">
        <input type="number" class="form-control" name="puntajemultiple[]" value="" placeholder="Puntaje" required>
    </div>
    <div class="col-sm-1 nopadding">
        <div class="input-group-append">
            <button class="btn btn-danger" type="button" onclick="eliminar_seleccionMultiple(`+ room + `);">
                <i class="fa fa-minus"></i></button>
        </div>
    </div>
    <div class="clear"></div>
</div>`;
    objTo.appendChild(divtest)
}
function eliminar_seleccionMultiple(rid) {
    $('.removeclass' + rid).remove();
}

// respuestas encuesta general tipo de pregunta (CERRADO)
function adicionar_respuesta_cerrada() {
    room++;
    //contador de las respuestas
    var numero_respuesta = parseInt(document.getElementById("numero-respuesta-cerrada").value);
    document.getElementById("contador-respuesta-cerrada").innerHTML=numero_respuesta+1;
    document.getElementById("numero-respuesta-cerrada").value=numero_respuesta+1;
    var objTo = document.getElementById('respuesta_cerrada')
    var divtest = document.createElement("div");
    divtest.setAttribute("class", "form-group removeclass" + room);
    var rdiv = 'removeclass' + room;
    divtest.innerHTML = `
    <!-- Row -->
    <div class="row respuesta_cerrada">
        <div class="col-sm-7 nopadding">
            <div class="row">
                <div class="col-sm-5 nopadding">
                    <p for="respuesta" class="card-subtitle">Respuesta<span class="text-danger">*</span></p>
                </div>
                <div class="col-sm-7 nopadding">
                    <textarea class="form-control" rows="3" name="respuesta`+ room +`" ></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-5 nopadding">
                    <label for="respuesta" class="card-subtitle">Respuesta correcta</label>
                </div>
                <div class="col-sm-7 nopadding">
                    <div class="row opcion-respuesta">
                        <div class="custom-control custom-radio">
                            <input type="radio" name="opcionRespuesta`+ room +`" class="custom-control-input" id="customCheck1`+ room +`" value="verdadero">
                            <label class="custom-control-label" for="customCheck1`+ room +`">Verdadero</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" name="opcionRespuesta`+ room +`" class="custom-control-input" id="customCheck2`+ room +`" value="falso">
                            <label class="custom-control-label" for="customCheck2`+ room +`">Falso</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" name="opcionRespuesta`+ room +`" class="custom-control-input" id="customCheck3`+ room +`" value="ninguna">
                            <label class="custom-control-label" for="customCheck3`+ room +`">Ninguna</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-4 nopadding">
            <div class="imagen_archivo">
                <p class="descripcion_imagen">Subir archivo </p>
                <div class="boton_imagen">
                    <input id="archivo_seleccionado`+ room +`" name="imagen_respuesta_cerrada`+ room +`" class="archivo_seleccionado" type="file" onchange="seleccionar_archivo_imagen(`+ room+`)" />
                </div>
            </div>
            <div id="vista_imagen">
                <div id="ver_archivo`+ room +`" class="ver_archivo"></div>
            </div>
        </div>
        <div class="borrar_respuesta_cerrada col-sm-1 nopadding">
            <div class="input-group-append">
                <button class="btn btn-danger boton-borrar-redondo" type="button" onclick="eliminar_preguntaCerrada(`+ room + `);"><i class="fa fa-minus"></i></button>
            </div>
        </div>
    </div>       
    <!-- End Row -->`;
    objTo.appendChild(divtest)
}
function eliminar_preguntaCerrada(rid) {
    $('.removeclass' + rid).remove();
    //contador de las respuestas
    var numero_respuesta = parseInt(document.getElementById("numero-respuesta-cerrada").value);
    document.getElementById("contador-respuesta-cerrada").innerHTML=numero_respuesta-1;
    document.getElementById("numero-respuesta-cerrada").value=numero_respuesta-1;
}