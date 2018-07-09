<?php

Route::get('/', function () {
    return view('Auth.login');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
//midleware para oficial de partes
Route::group(['middleware' => 'oficialpartes'], function(){
	Route::group(['prefix'=>'oficialpartes'],function(){
		Route::get('home','oficialPartesController@index');
		Route::get('eliminardocumento','oficialPartesController@deldocumento');
		ROute::get('restaurardocumento','oficialPartesController@resdocumento');
		Route::get('agregardocumento','oficialPartesController@adddocumento');
		Route::get('gettipodoc','oficialPartesController@gettipodoc');
		Route::get('actualizartipo','oficialPartesController@actualizartipo');
		Route::group(['prefix'=>'demanda'],function(){
			Route::get('','oficialPartesController@demandas');
			Route::get('recuperar','oficialPartesController@recuperar');
			Route::get('nueva','oficialPartesController@nuevademanda');
			Route::get('nueva/getusuario','oficialPartesController@searchd1');
			Route::any('enviar','oficialPartesController@enviar');
			Route::get('gettipo','oficialPartesController@gettipo');
			Route::post('registro','oficialPartesController@registrodemanda');
			Route::any('anexardoc','oficialPartesController@add_file');
			Route::get('getdemandante','oficialPartesController@getd');
			Route::get('entradas','oficialPartesController@entradas');
			Route::get('getname','oficialPartesController@getname');
			Route::get('validar','oficialPartesController@validademanda');
			Route::get('sendmesage','oficialPartesController@sendmensaje');
		});
		Route::any('perfil/{id}','oficialPartesController@perfil');
		Route::get('notificaciones','oficialPartesController@notificaciones');
		Route::post('notificaciones/update','oficialPartesController@updatenotif');
		Route::get('seguimiento','oficialPartesController@seguimiento');
		Route::get('seguimiento/anexos','oficialPartesController@getseguimiento');
		Route::any('newuser','oficialPartesController@nuevousuario');
		Route::get('getusedmail','oficialPartesController@getusedmails');
		Route::group(['prefix'=>'busqueda'],function(){
			Route::get('1','oficialPartesController@search1');
			Route::get('2','oficialPartesController@search2');
			Route::get('3','oficialPartesController@search3');
			Route::get('getusuario','oficialPartesController@search4');
			Route::post('update','oficialPartesController@updateuser');
		});
		Route::get('usersearch','oficialPartesController@buscausuario');
	});
});
//middleware para proyectista
Route::group(['middleware'=>'proyectista'],function(){
	Route::group(['prefix'=>'proyectista'],function(){
		Route::any('perfil/{id}','proyectistaController@perfil');
		Route::get('home','proyectistaController@index');
		Route::group(['prefix'=>'expedientes'],function(){
			Route::get('','proyectistaController@expedientes');
			Route::get('ver/{id}','proyectistaController@ver');
			Route::get('redactar/{id}','proyectistaController@redactar');
			Route::get('agregar','proyectistaController@agregarsentecia');
			Route::post('notificar','proyectistaController@notificar');
		});
		Route::group(['prefix'=>'proyectos'],function(){
			Route::get('','proyectistaController@proyectos');
			Route::get('ver/{id}_{id2}','proyectistaController@ver2');
			Route::get('texto','proyectistaController@gettexto');
			Route::post('editar','proyectistaController@editar');
			Route::post('chat','proyectistaController@addchat');
			Route::post('guardar','proyectistaController@guardar');
			Route::get('redactarnuevo/{id}','proyectistaController@nuevoproy');
			Route::post('guardarnuevo','proyectistaController@guardar2');
			Route::get('seguimiento','proyectistaController@segproy');
			Route::get('enviar','proyectistaController@enviar');
		});
		Route::group(['prefix'=>'notificaciones'],function(){
			Route::get('','proyectistaController@notificaciones');
			Route::post('update','proyectistaController@updatenotif');
		});
		Route::group(['prefix'=>'seguimiento'],function(){
			Route::get('','proyectistaController@seguimiento');
			Route::get('anexos','proyectistaController@getseguimiento');
		});
		Route::get('eliminardocumento','proyectistaController@deldocumento');
		ROute::get('restaurardocumento','proyectistaController@resdocumento');
		Route::get('agregardocumento','proyectistaController@adddocumento');
		Route::get('gettipodoc','proyectistaController@gettipodoc');
		Route::get('actualizartipo','proyectistaController@actualizartipo');
	});
});
//middleware para actuario
Route::group(['middleware'=>'actuario'],function(){
	Route::group(['prefix'=>'actuario'],function(){
		Route::get('eliminardocumento','actuarioController@deldocumento');
		ROute::get('restaurardocumento','actuarioController@resdocumento');
		Route::get('agregardocumento','actuarioController@adddocumento');
		Route::get('gettipodoc','actuarioController@gettipodoc');
		Route::get('actualizartipo','actuarioController@actualizartipo');
		Route::get('/getsecretario','actuarioController@getsecre');
		Route::get('home','actuarioController@index');
		Route::group(['prefix'=>'expedientes'],function(){
			Route::get('','actuarioController@acuerdos');
			Route::get('recuperar','actuarioController@recuperar');
			Route::post('subir','actuarioController@subirdoc');
			Route::post('retornar','actuarioController@retornar');
		});
		Route::group(['prefix'=>'notificaciones'],function(){
			Route::get('','actuarioController@notificaciones');
			Route::post('update','actuarioController@updatenotif');
		});
		Route::group(['prefix'=>'seguimiento'],function(){
			Route::get('','actuarioController@seguimiento');
  			Route::get('anexos','actuarioController@getseguimiento');	
		});
		
		
		Route::any('perfil/{id}','actuarioController@perfil');
		Route::get('getinvolved','actuarioController@getinvolved');
		Route::post('notificar','actuarioController@notificar');
		
	});
});
//middleware para secretariodeacuerds
Route::group(['middleware'=>'secretarioacuerdo'],function(){
  	Route::group(['prefix'=>'secretarioacuerdo'],function(){
  		Route::get('eliminardocumento','secretarioacuerdoController@deldocumento');
		ROute::get('restaurardocumento','secretarioacuerdoController@resdocumento');
		Route::get('agregardocumento','secretarioacuerdoController@adddocumento');
		Route::get('gettipodoc','secretarioacuerdoController@gettipodoc');
		Route::get('actualizartipo','secretarioacuerdoController@actualizartipo');
  		Route::get('home','secretarioacuerdoController@index');
  		Route::get('notificaciones','secretarioacuerdoController@notif');
  		Route::post('notificaciones/update','secretarioacuerdoController@updatenotif');
  		Route::any('perfil/{id}','secretarioacuerdoController@perfil');
  		Route::get('seguimiento','secretarioacuerdoController@seguimiento');
  		Route::get('seguimiento/anexos','secretarioacuerdoController@getseguimiento');
  		Route::group(['prefix'=>'acuerdos'],function(){
  			Route::get('','secretarioacuerdoController@acuerdos');
  			Route::get('recuperar','secretarioacuerdoController@recuperar');
  			Route::post('enviar','secretarioacuerdoController@agregar');
  			Route::POST('notificar','secretarioacuerdoController@notificar');
  			Route::post('enviar2','secretarioacuerdoController@enviar');
  		});
  	});
});
//middleware para institucion
Route::group(['middleware'=>'institucion'],function(){
	Route::group(['prefix'=>'institucion'],function(){
		Route::get('home','institucionController@index');
		Route::any('perfil/{id}','institucionController@perfil');
	});
});
//middleware para magistrado
Route::group(['middleware'=>'magistrado'],function(){
	Route::group(['prefix'=>'magistrado'],function(){
		Route::get('home','magistradoController@index');
		Route::any('perfil/{id}','magistradoController@perfil');
		Route::group(['prefix'=>'usuarios'],function(){
			Route::get('crear','magistradoController@crear');
			Route::get('buscar','magistradoController@search');
			Route::post('registro','magistradoController@registro');
		});
		Route::group(['prefix'=>'demanda'],function(){
			Route::get('','magistradoController@demandas');
			Route::get('recuperar','oficialPartesController@recuperar');
		});
		Route::group(['prefix'=>'notificaciones'],function(){
			Route::get('','magistradoController@notif');
  			Route::post('update','magistradoController@updatenotif');
		});
		Route::get('eliminardocumento','magistradoController@deldocumento');
		ROute::get('restaurardocumento','magistradoController@resdocumento');
		Route::get('agregardocumento','magistradoController@adddocumento');
		Route::get('gettipodoc','magistradoController@gettipodoc');
		Route::get('actualizartipo','magistradoController@actualizartipo');
		
	});

});
//middleware para amparos
Route::group(['middleware'=>'amparos'],function(){
	Route::group(['prefix'=>'amparos'],function(){
		Route::get('pefril','amparosController@perfil');
		Route::get('home','amparosController@perfil');
	});

});
//middleware para administrador
Route::group(['middleware'=>'admin'],function(){
	Route::group(['prefix'=>'admin'],function(){
		Route::get('perfil','adminController@perfil');
		Route::get('home','userController@index');
	});

});
//middleware para usuario
Route::group(['middleware'=>'user'],function(){
	Route::group(['prefix'=>'user'],function(){
		Route::get('home','userController@index');
		Route::group(['prefix'=>'perfil'],function(){
			Route::any('{id}','userController@perfil');
		});
		Route::group(['prefix'=>'demandas'],function(){
			Route::get('','userController@demandas');
			Route::get('recuperar','userController@recuperar');
			Route::get('nueva','userController@nuevademanda');
			Route::post('guardar','userController@guardar');
			Route::get('gettipo','userController@gettipo');
			Route::post('anexardoc','userController@add_file');
		});
		Route::group(['prefix'=>'seguimiento'],function(){
			Route::get('','userController@seguimiento');
  			Route::get('anexos','userController@getseguimiento');	
		});
		Route::group(['prefix'=>'notificaciones'],function(){
			Route::get('','userController@notif');
  			Route::post('update','userController@updatenotif');
		});
	});
});
