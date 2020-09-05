<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator, Hash, Auth;
use App\TecCadena;
use App\Archivo;
use Carbon\carbon;
use DB;
class TecCadenaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Primera consulta envia todos los datos de la tabla
        // $tecCadenas = TecCadena::all();
        // return view('tec_cadena.listar')->with(compact('tecCadenas'));
        //segunda forma combinar dos tablas
        $tecCadenas = DB::table('tec_cadenas')
        ->join('users', 'users.id', '=' ,'tec_cadenas.usuario_id')
        ->select('tec_cadenas.id','tec_cadenas.titulo','tec_cadenas.descripcion','tec_cadenas.nivel','tec_cadenas.puntaje','tec_cadenas.estado as estadoTEC','users.estado','users.name')
        ->get();
        return view('tec_cadena.listar')->with(compact('tecCadenas'));
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tec_cadena.create');
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
            'nivel'  =>  'required',
            'puntaje'  =>  'required',
            'tiempo'  =>  'required',
            'fecha_inicio'  =>  'required',
            'fecha_fin'  =>  'required',
            'imagen'  =>  'required'
        ];
 
        $messages =[
            'titulo.required' => 'El titulo es requerido.',
            'descripcion.required' => 'La descripción es requerido.',
            'nivel.required'  =>  'El nivel del juego es requerido.',
            'puntaje.required'  =>  'Es puntaje del juego es requerido.',
            'tiempo.required'  =>  'El tiempo de juego es requerido.',
            'fecha_inicio.required'  =>  'La fecha de inicio de juego es requerido.',
            'fecha_fin.required'  =>  'La fecha de finalización de juego es requerido.',
            'imagen.required'  =>  'La imagen en la tecnica de la cadena es necesario.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message','Se ha producido un error de validacion')->with('typealert', 'danger');
        else:
            /*---------------------- imagen id --------------------*/
            $registroTablaTecCadenas = tecCadena::count(); $imagen_id=$registroTablaTecCadenas+1;
            /*--------------------- usuario id  -------------------*/
            $usuario_id=auth()->user()->id;
            /*----------------------------------------------------*/
            if (isset($_FILES['imagen'])){
                $cantidad= count($_FILES["imagen"]["tmp_name"]);
                for ($i=0; $i<$cantidad; $i++){
                    move_uploaded_file($_FILES["imagen"]["tmp_name"][$i],'./../storage/img/tecnica_cadena/'.$_FILES["imagen"]["name"][$i]);
                    $archivo = new archivo;
                    $archivo->nombre = $_FILES["imagen"]["name"][$i];
                    $archivo->tipo = $_FILES["imagen"]["type"][$i];
                    $archivo->pertenece = $imagen_id;
                    if($archivo->save()):
                        echo "se almaceno la imagen";
                    endif;
                }
            }
            $tecCadena = new tecCadena;
            $tecCadena->titulo = e($request->input('titulo'));
            $tecCadena->descripcion = e($request->input('descripcion'));
            $tecCadena->nivel = e($request->input('nivel'));
            $tecCadena->puntaje = e($request->input('puntaje'));
            $tecCadena->tiempo = e($request->input('tiempo'));
            $tecCadena->fecha_inicio = e($request->input('fecha_inicio'));
            $tecCadena->fecha_fin = e($request->input('fecha_fin'));
            $tecCadena->imagen_id = $imagen_id;
            $tecCadena->curso_id = ".";
            $tecCadena->usuario_id = $usuario_id;
            $tecCadena->estado=1;
            if($tecCadena->save()):
                return back()->withErrors($validator)->with('message','Tecnica de la cadena registrado')->with('typealert', 'success');
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
        return view('tec_cadena.mostrar');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $estado_tcadena = TecCadena::find($id);
        $estadoActual = $estado_tcadena->estado;
        
        if ($estadoActual==true){
            $tecCadenaEstado                       = TecCadena::find($id);
            $tecCadenaEstado->estado               = false;
            $tecCadenaEstado->save();
            return redirect()->route('listar_tec_cadena');
        }elseif ($estadoActual==false) {
            $tecCadenaEstado                       = TecCadena::find($id);
            $tecCadenaEstado->estado               = true;
            $tecCadenaEstado->save();
            return redirect()->route('listar_tec_cadena');
        }else{
            return redirect()->route('listar_tec_cadena');
        }
    }
}
