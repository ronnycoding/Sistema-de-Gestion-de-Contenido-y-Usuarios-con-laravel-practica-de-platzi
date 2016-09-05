<?php

use Illuminate\Support\Facades\Storage;


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//El método group que opciones queremos antes de acceder a la vista

Route::group(['middleware'=>'auth'], function(){
	
	Route::get('mail', function(){
		Mail::send('nombre_de_la_vista',['nombre'=>'Ronny'], function (Message $message){
			$message->to('')->subject('');
		});
	});
	
	Route::get('/', [
			'uses' => 'HomeController@index',
			'as' => 'home_show_path'
	]);
	
	Route::get('posts/create', [
			'uses' => 'PostsController@create',
			'as' => 'post_create_path'
	]);
	
	Route::post('posts/create', [
			'uses' => 'PostsController@store',
			'as' => 'post_store_store',
	]);
	
	Route::get('posts/{id}/edit', [
			'uses' => 'PostsController@edit',
			'as' => 'post_edit_path'
	])->where('id', '[1-9]+');
	
	Route::patch('posts/{id}/edit', [
			'uses' => 'PostsController@update',
			'as' => 'post_patch_path'
	])->where('id', '[1-9]+');
	
	Route::delete('posts/{id}', [
			'uses' => 'PostsController@destroy',
			'as' => 'post_delete_path'
	])->where('id', '[1-9]+');
	
	Route::get('posts/{id}', [
			'uses' => 'PostsController@show',
			'as' => 'post_show_path'
	])->where('id', '[1-9]+');
	
});

Route::group(['prefix'=>'api'],function(){
	Route::get('/',function(){
		return 'Hola soy tu api';
	});
});

Route::get('sesion/login', [
		'uses' => 'AuthController@index',
		'as' => 'auth_show_path'
]);

Route::post('sesion/logged', [
		'uses' => 'AuthController@store',
		'as' => 'auth_store_path'
]);


Route::get('sesion/logout', [
		'uses' => 'AuthController@destroy',
		'as' => 'auth_destroy_path'
]);

/**
 * Create User
 */

Route::get('/register-user',[
		'uses' => 'UserController@create',
		'as' => 'user_create_path'
]);

Route::post('/register-user', [
		'uses' => 'UserController@store',
		'as' => 'user_store_path'
]);

/**
 * File System
 */

Route::get('filesystem', function(){
	
	//Storage::put('file.txt', 'Este archivo fue guardado localmente.');
	
	Storage::disk('s3')->put('file.txt', 'Este archivo fue guardado en Amazo Web Service.');
	
	return 'Save it!';
});


Route::get('filesystem/{name}',function($name){
	
	return Storage::disk('s3')->get($name);
	
});









