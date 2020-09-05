<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Router Auth or auth
Route::get('/login', 'ConnectController@getLogin')->name('login');
Route::post('/login_user', 'ConnectController@postLogin')->name('login_user');
Route::get('/registro_usuario', 'ConnectController@getRegistro_usuario')->name('registro_usuario');
Route::post('/almacenar_usuario', 'ConnectController@postAlmacenar_usuario')->name('almacenar_usuario');
Route::get('/listar_usuario', 'ConnectController@getListar_Usuario')->name('listar_usuario');
Route::get('/registro_usuario_admin', 'ConnectController@getRegistro_Usuario_Adm')->name('registro_usuario_admin');
Route::get('/actualizar_registro_usuario{id}', 'ConnectController@actualizarDatosUsuario')->name('actualizar_registro_usuario');
Route::post('/modificar_datos_usuario', 'ConnectController@modificarDatosUsuarios')->name('modificar_datos_usuario');
Route::get('/estado_datos_usuario{id}', 'ConnectController@estadoDatosUsuarios')->name('estado_datos_usuario');


//Router admin
Route::get('/admin', 'AdministradorController@index')->name('admin');

//Router estudiante
Route::get('/crear_estudiante', 'EstudianteController@index')->name('crear_estudiante');
Route::get('/almacenar_estudiante', 'EstudianteController@create')->name('almacenar_estudiante');

//Router persona
Route::get('/listar_persona', 'PersonaController@index')->name('listar_persona');
Route::get('/almacenar_persona', 'PersonaController@create')->name('almacenar_persona');
Route::get('/registrar_persona', 'PersonaController@store')->name('registrar_persona');
Route::get('/editar_persona{id}', 'PersonaController@edit')->name('editar_persona');
Route::get('/modificar_registro{id}', 'PersonaController@update')->name('modificar_registro');
Route::get('/estado_registro{id}', 'PersonaController@destroy')->name('estado_registro');

//rol usuario sistema
Route::get('/listar_role', 'RoleController@index')->name('listar_role');
Route::get('/roles_usuario', 'RoleController@index')->name('roles_usuario');
Route::post('/crear_rol_usuario', 'RoleController@store')->name('crear_rol_usuario');
Route::post('/modificar_rol_usuario', 'RoleController@update')->name('modificar_rol_usuario');
Route::get('/estado_role{id}', 'RoleController@destroy')->name('estado_role');

/*-------------------------------- TECNICA DE LA MEMORIA  --------------------------------*/
//Crear tecnica
Route::get('/listar_tec_cadena','TecCadenaController@index')->name('listar_tec_cadena');
Route::get('/crear_tec_cadena','TecCadenaController@create')->name('crear_tec_cadena');
Route::post('/almacenar_tec_cadena','TecCadenaController@store')->name('almacenar_tec_cadena');
Route::get('/mostrar_tec_cadena{id}','TecCadenaController@show')->name('mostrar_tec_cadena');
Route::get('/estado_tcadena{id}', 'TecCadenaController@destroy')->name('estado_tcadena');

/*-------------------------------- TECNICA DE LA CONCENTRACION  --------------------------------*/
Route::get('/listar_tec_concentracion','TecConcentracionController@index')->name('listar_tec_concentracion');
Route::get('/crear_tec_concentracion','TecConcentracionController@create')->name('crear_tec_concentracion');
Route::post('/almacenar_tec_concentracion','TecConcentracionController@store')->name('almacenar_tec_concentracion');
Route::get('/editar_tec_concentracion{id}','TecConcentracionController@edit')->name('editar_tec_concentracion');
Route::post('/modificar_tec_concentracion{id}', 'TecConcentracionController@update')->name('modificar_tec_concentracion');
Route::get('/estado_tconcentracion{id}', 'TecConcentracionController@destroy')->name('estado_tconcentracion');

/*-------------------------------------- PRUEBA GENERAL  ---------------------------------------*/
Route::get('/listar_prueba','PruebaController@index')->name('listar_prueba');
Route::get('/crear_prueba','PruebaController@create')->name('crear_prueba');
Route::post('/almacenar_prueba','PruebaController@store')->name('almacenar_prueba');
Route::get('/estado_prueba{id}', 'PruebaController@destroy')->name('estado_prueba');