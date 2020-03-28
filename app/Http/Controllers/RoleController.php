<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator, Auth;
use App\Role;


class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        return view('role.list')->with(compact('roles'));
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
            'nombre'      =>  'required',
            'descripcion'      =>  'required',
            'direccion_imagen'  =>  'required',
        ];
        $messages =[
            'nombre.required' => 'El rol de usuario es requerido.',
            'descripcion.required' => 'La descripción del rol es requerido.',
            'direccion_imagen.required' => 'La imagen que representa al rol de usuario es requerido.',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message','Se ha producido un error de validacion')->with('typealert', 'danger');
        else:
            /*------------------- id usuario -----------------*/
            //$registroTablaroles = role::count(); $id=$registroTablaroles+1;
            /*--------------- almacenar imagen ---------------*/
            $formato = array('.png', '.jpeg');//extenciones validas
            $imagenUsuario = ($_FILES['direccion_imagen']['name']);//Nombre de la imagen
            $extencion = substr($imagenUsuario, strrpos($imagenUsuario, '.'));//Extencion de la imagen 
            if(!in_array($extencion, $formato)) {
                $data['documento_general']='El tipo de archivo no esta permitido.';
            }else {
                $ruta="./../public/img/roles_usuario/".$_FILES['direccion_imagen']['name'];
                $nombreArchivo = $_FILES['direccion_imagen']['name'];
                move_uploaded_file($_FILES['direccion_imagen']['tmp_name'], $ruta);
            }
            $role = new Role;
            $role->nobre = e($request->input('nombre'));
            $role->descripcion = e($request->input('descripcion'));
            $role->direccion_imagen = $nombreArchivo;
            $role->estado = false;
            if($role->save()):
                return redirect()->route('roles_usuario');
            endif;
        endif;
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id=intval($request->input('IdUsuario'));
        $imagenUsuario = ($_FILES['direccion_imagen']['name']);//Nombre de la imagen
        $rules=[
            'nombre'      =>  'required',
            'descripcion'      =>  'required',
        ];
        $messages =[
            'nombre.required' => 'El rol de usuario es requerido.',
            'descripcion.required' => 'La descripción del rol es requerido.',
          
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message','Se ha producido un error de validacion')->with('typealert', 'danger');
        else:
            if($imagenUsuario != ""){
                /*--------------- almacenar imagen ---------------*/
                $formato = array('.png', '.jpeg');//extenciones validas
                $imagenUsuario = ($_FILES['direccion_imagen']['name']);//Nombre de la imagen
                $extencion = substr($imagenUsuario, strrpos($imagenUsuario, '.'));//Extencion de la imagen 
                if(!in_array($extencion, $formato)) {
                    $data['documento_general']='El tipo de archivo no esta permitido.';
                }else {
                    $ruta="./../public/img/roles_usuario/".$_FILES['direccion_imagen']['name'];
                    $nombreArchivo = $_FILES['direccion_imagen']['name'];
                    move_uploaded_file($_FILES['direccion_imagen']['tmp_name'], $ruta);
                }
                $role = Role::find($id);
                $role->nobre = e($request->input('nombre'));
                $role->descripcion = e($request->input('descripcion'));
                $role->direccion_imagen = $nombreArchivo;
                if($role->save()):
                    return redirect()->route('roles_usuario');
                endif;
            }else{
                $role = Role::find($id);
                $role->nobre = e($request->input('nombre'));
                $role->descripcion = e($request->input('descripcion'));
                if($role->save()):
                    return redirect()->route('roles_usuario');
                endif;
            }
        endif;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rol = Role::find($id);
        $estado = $rol->estado;
        if ($estado==true){
            $rol                       = Role::find($id);
            $rol->estado               = false;
            $rol->save();
            return redirect()->route('listar_role');
        }elseif ($estado==false) {
            $rol                       = Role::find($id);
            $rol->estado               = true;
            $rol->save();
            return redirect()->route('listar_role');
        }else{
            return redirect()->route('listar_role');
        }
    }
}
