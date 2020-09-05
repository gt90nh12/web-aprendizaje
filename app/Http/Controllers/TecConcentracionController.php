<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator, Hash, Auth;
use App\Archivo;
use App\TecConcentracion;
use Carbon\carbon;
use DB;

class TecConcentracionController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tecConcentraciones = DB::table('tec_concentracions')
        ->join('users', 'users.id', '=' ,'tec_concentracions.usuario_id')
        ->select('tec_concentracions.id','tec_concentracions.titulo','tec_concentracions.descripcion','tec_concentracions.nivel','tec_concentracions.puntaje','tec_concentracions.estado as estadoTEC','users.estado','users.name')
        ->get();
        return view('tec_concentracion.listar')->with(compact('tecConcentraciones'));
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tec_concentracion.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules=[
            'titulo'      =>  'required',
            'descripcion'  =>  'required',
            // 'cancion'  =>  'required',
            'cantante'  =>  'required',
            // 'artista'  =>  'required',
            'letra'  =>  'required',
            // 'palabra'  =>  'required',
            'nivel'  =>  'required',
            'puntaje'  =>  'required',
            'tiempo'  =>  'required',
            'fecha_inicio'  =>  'required',
            'fecha_fin'  =>  'required'
        ];
 
        $messages =[
            'titulo.required' => 'El titulo es requerido.',
            'descripcion.required' => 'La descripción es requerido.',
            // 'cancion.required' => 'La cancion es requerido.',
            'cantante.required' => 'El cantante es requerido.',
            // 'artista.required' => 'EL artista es requerido.',
            'letra.required' => 'La letra de la cancion es requerido.',
            // 'palabra.required' => 'La palabra es requerido.',
            'nivel.required'  =>  'El nivel del juego es requerido.',
            'puntaje.required'  =>  'Es puntaje del juego es requerido.',
            'tiempo.required'  =>  'El tiempo de juego es requerido.',
            'fecha_inicio.required'  =>  'La fecha de inicio de juego es requerido.',
            'fecha_fin.required'  =>  'La fecha de finalización de juego es requerido.'
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message','Se ha producido un error de validacion')->with('typealert', 'danger');
        else:
            $validator = Validator::make($request->all(), $rules, $messages);
            /*------------- (id) tabla concentracions ------------*/
            $registroTablaTecConcentracion = tecConcentracion::count(); $id=$registroTablaTecConcentracion+1;
            /*--------------------- usuario id  -------------------*/
            $usuario_id=auth()->user()->id;
            /*------------------ almacenar video ------------------*/
            $formato = array('.mp4', '.mp3');//extenciones validas
                $nombre_cancion = ($_FILES['cancion']['name']);//Nombre de la imagen
                $extencion = substr($nombre_cancion, strrpos($nombre_cancion, '.'));//Extencion de la imagen 
                if(!in_array($extencion, $formato)) {
                    $data['documento_general']='El tipo de archivo no esta permitido.';
                }else {
                    $ruta="./../storage/videos/tecnica_concentracion/".$_FILES['cancion']['name'];
                    $nombreArchivo = $_FILES['cancion']['name'];
                    move_uploaded_file($_FILES['cancion']['tmp_name'], $ruta);
                    echo "Se movio el archivo";
                }
            /*------------------- json artistas ------------------*/
            $artistasCantante    =   json_encode($_POST["artistas"]); var_dump($artistasCantante);
            /*------------------- json palabras ------------------*/
            $palabraLetraCancion =   json_encode($_POST["palabras"]); var_dump($palabraLetraCancion);
            /*--------------- almacenar en la tabla --------------*/
            $tecConcentracion = new tecConcentracion;
            $tecConcentracion->titulo = e($request->input('titulo'));
            $tecConcentracion->descripcion = e($request->input('descripcion'));
            $tecConcentracion->nivel = e($request->input('nivel'));
            $tecConcentracion->puntaje = e($request->input('puntaje'));
            $tecConcentracion->tiempo = e($request->input('tiempo'));
            $tecConcentracion->archivo_id = $nombre_cancion;
            $tecConcentracion->cantante = e($request->input('cantante'));;
            $tecConcentracion->artistas = $palabraLetraCancion;
            $tecConcentracion->letra = e($request->input('letra'));;
            $tecConcentracion->palabras = $artistasCantante;
            $tecConcentracion->usuario_id = $usuario_id;
            $tecConcentracion->fecha_inicio = e($request->input('fecha_inicio'));
            $tecConcentracion->fecha_fin = e($request->input('fecha_fin'));
            $tecConcentracion->estado=1;
            if($tecConcentracion->save()):
                return back()->withErrors($validator)->with('message','Tecnica de la Concentración registrado')->with('typealert', 'success');
            endif;
        endif;     
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tecConcentracion = TecConcentracion::find($id);
        $action = route('modificar_tec_concentracion', ['id' => $id]);
        return view('tec_concentracion.actualizar')->with(compact('action', 'tecConcentracion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        /*--------------------- usuario id  -------------------*/
        $usuario_id=auth()->user()->id;
        
        /*------------ Validar video de la cancion ------------*/
        $archivoConCambio = $_FILES['cancion'];
        $archivoSinCambio = e($request->input('archivo_id'));
        if ($archivoConCambio != ""){
            $nombre_cancion = ($_FILES['cancion']['name']);//Nombre del archivo nuevo
            $formato = array('.mp4', '.mp3');//extenciones validas
            $extencion = substr($nombre_cancion, strrpos($nombre_cancion, '.'));//Extencion de la imagen 
            if(!in_array($extencion, $formato)) {
                $data['documento_general']='El tipo de archivo no esta permitido.';
            }else {
                $ruta="./../storage/videos/tecnica_concentracion/".$_FILES['cancion']['name'];
                $nombreArchivo = $_FILES['cancion']['name'];
                move_uploaded_file($_FILES['cancion']['tmp_name'], $ruta);
            }
            echo "no se selecciono ningun archivo";
        }elseif($archivoSinCambio != ""){
            $nombre_cancion = $archivoSinCambio;
            echo "el archivo no sufrira ningun cambio";
        }else{
            echo "es necesario Seleccionar una cancion";
        }
       
        /*------------------- json artistas ------------------*/
        $artistasCantante    =   json_encode($_POST["artistas"]); var_dump($artistasCantante);
        /*------------------- json palabras ------------------*/
        $palabraLetraCancion =   json_encode($_POST["palabras"]); var_dump($palabraLetraCancion);
        /*--------------- almacenar en la tabla --------------*/
        $tecConcentracion = TecConcentracion::find($id); //Identificador del registro 
        $tecConcentracion->titulo       = e($request->input('titulo'));
        $tecConcentracion->descripcion  = e($request->input('descripcion'));
        $tecConcentracion->nivel        = e($request->input('nivel'));
        $tecConcentracion->puntaje      = e($request->input('puntaje'));
        $tecConcentracion->tiempo       = e($request->input('tiempo'));
        $tecConcentracion->archivo_id   = $nombre_cancion;
        $tecConcentracion->cantante     = e($request->input('cantante'));;
        $tecConcentracion->artistas     = $palabraLetraCancion;
        $tecConcentracion->letra        = e($request->input('letra'));;
        $tecConcentracion->palabras     = $artistasCantante;
        $tecConcentracion->usuario_id   = $usuario_id;
        $tecConcentracion->fecha_inicio = e($request->input('fecha_inicio'));
        $tecConcentracion->fecha_fin    = e($request->input('fecha_fin'));
        $tecConcentracion->updated_at   = Carbon::now();
        $tecConcentracion->save();
        return redirect()->route('listar_tec_concentracion');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $estado_tconcentracion = TecConcentracion::find($id);
        $estadoActual = $estado_tconcentracion->estado;
        
        if ($estadoActual==true){
            $tecConcentracionEstado                       = TecConcentracion::find($id);
            $tecConcentracionEstado->estado               = false;
            $tecConcentracionEstado->save();
            return redirect()->route('listar_tec_concentracion');
        }elseif ($estadoActual==false) {
            $tecConcentracionEstado                       = TecConcentracion::find($id);
            $tecConcentracionEstado->estado               = true;
            $tecConcentracionEstado->save();
            return redirect()->route('listar_tec_concentracion');
        }else{
            return redirect()->route('listar_tec_concentracion');
        }
    }
}
