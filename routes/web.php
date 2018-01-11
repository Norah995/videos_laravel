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

/*Route::get('/', function () {
    return view('welcome');
});*/


Route::get('/', function(){
	$tasks = App\Task::latest()->get();
	return view('welcome', compact('tasks'));
});

Route::get('/pruu', function(){
	return view('Tags');
});

Route::get('/listaro', 'RoleController@lista');
/*Route::get('/usuarios', function(){	
	return 'usuarios';
});


Route::get('/usuarios/{id}', function($id){
	return "mostrando detalle del usuario: $id";
})->where('id', '[0-9]+');


//crear nuevo usuario genera conficto arregla con where en {id}
Route::get('/usuarios/nuevo', function(){
	return 'Crear nuevo usuario';
});

/*Route::get('/usuarios/{id}', function($id){
	return "mostrando detalle del usuario: {$id}";
}); para manera automatica

Route::get('/saludo/{name}/{nickname?}', function($name, $nickname=null){
	$name=ucfirst($name);
	if($nickname){
		return "bienvenido {$name}, tu apodo es {$nickname}";
	}else{
		return "bienvenido {$name}";
	}	
});**/

//Route::get('norah', function(){	
	//$nombre=array('nombre'=>'david');
	//return $nombre;
//});

Route::get('/usuarios', 'UserController@index');

Route::get('/usuarios/{id}', 'UserController@show')
->where('id', '[0-9]+');

Route::get('/usuarios/nuevo', 'UserController@create');

/*Route::get('/saludo/{name}/{nickname?}', 'WelcomerUserController@index'); o tambien*/
Route::get('/saludo/{name}/{nickname?}', 'WelcomeUserController');