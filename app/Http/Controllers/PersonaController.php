<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator, Hash, Auth;
use App\Persona;
use Carbon\carbon;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personas = Persona::all();
        return view('persona.listar')->with(compact('personas'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {   
        $persona = new Persona();
        $action = route('almacenar_persona');
        return view('persona.crear')->with(compact('action','persona'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'nombre'=>'required',
            'genero'=>'required',
            'ci'=>'numeric|required|min:7',
            'fecha_nacimiento'=>'required',
            'celular'=>'numeric|required|min:8',
            'correo_electronico'=>'required'
        ];
        $messages = [
            'nombre.required' => 'Debe ingresar el nombre de la persona.',
            'genero.required' => 'Debe seleccionar el género de la persona.',
            'ci.numeric' => 'El número de cedula debe ser numérico.',
            'ci.required' => 'Debe ingresar el numero de cedula de identidad.',
            'ci.min:7' => 'El numero de celdula de identidad debe tener al menos 7 caracteres.',
            'fecha_nacimiento.required' => 'Debe ingresar la fecha de nacimiento.',
            'celular.numeric' => 'El número de celular debe ser numérico.',
            'celular.required' => 'Debe ingresar el número de celular.',
            'celular.min:8' => 'El numero de celular debe tener al menos 8 caracteres.',
            'correo_electronico.required' => 'Debe ingresar el correo electrónico.',
            'correo_electronico.email' => 'El formato de su correo electrónico es invalido.'
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message','Se ha producido un error de validacion')->with('typealert', 'danger');
        else:
            $registroTablaPersona = Persona::count(); $idPersona=$registroTablaPersona+1;
            $persona=[
                'id'=>$idPersona,
                'nombre'=>$request->input('nombre'),
                'apellido_paterno'=>$request->input('apellido_paterno'),
                'apellido_materno'=>$request->input('apellido_materno'),
                'sexo'=>$request->input('genero'),
                'ci'=>$request->input('ci'),
                'fecha_nacimiento'=>$request->input('fecha_nacimiento'),
                'celular'=>$request->input('celular'),
                'correo_electronico'=> $request->input('correo_electronico'),
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
                'estado'=>false
            ];
            Persona::insert($persona);
            return redirect()->route('listar_persona');
            // if($user->save()):
            //     return back()->withErrors($validator)->with('message','Usuario registrado')->with('typealert', 'success');
            // endif;
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
        $persona = Persona::find($id);
        $action = route('modificar_registro', ['id' => $id]);
        return view('persona.actualizar')->with(compact('action', 'persona'));
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
        $persona                       = Persona::find($id);
        $persona->nombre               = $request->input('nombre');
        $persona->apellido_paterno     = $request->input('apellido_paterno');
        $persona->apellido_materno     = $request->input('apellido_materno');
        $persona->sexo                 = $request->input('genero');
        $persona->ci                   = $request->input('ci');
        $persona->fecha_nacimiento     = $request->input('fecha_nacimiento');
        $persona->celular              = $request->input('celular');
        $persona->correo_electronico   = $request->input('correo_electronico');
        $persona->updated_at           = Carbon::now();
        $persona->save();
        return redirect()->route('listar_persona');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $persona = Persona::find($id);
        $estado = $persona->estado;
        if ($estado==true){
            $persona                       = Persona::find($id);
            $persona->estado               = false;
            $persona->save();
            return redirect()->route('listar_persona');
        }elseif ($estado==false) {
            $persona                       = Persona::find($id);
            $persona->estado               = true;
            $persona->save();
            return redirect()->route('listar_persona');
        }else{
            return redirect()->route('listar_persona');
        }
    }
}

