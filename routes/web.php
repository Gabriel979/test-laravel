<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
/*
Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/','FrontController@index');
Route::get('home','FrontController@index');
Route::get('contacto','FrontController@contacto');
Route::get('reviews','FrontController@reviews');
Route::get('admin','FrontController@admin');

Route::resource('usuario','UsuarioController');
Route::post('usuario/store','UsuarioController@store'); //Esta línea solo la utilizo cuando el formu esta hecho sin Laravel Collective!!

Route::resource('log','LogController');
Route::get('logout','LogController@logout');

Route::resource('genero', 'GeneroController');
Route::resource('generos', 'GeneroController@listing');

Route::resource('pelicula', 'MovieController');

Route::resource('mail', 'MailController');

Route::get('password/email', 'Auth\ForgotPasswordController@showLinkRequestForm');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
//Route::post('password/email', 'Auth\ResetPasswordController');

Route::post('password/reset','Auth\ResetPasswordController@reset');
Route::get('password/reset/{token}','Auth\ResetPasswordController@showResetForm');
	

Auth::routes();

Route::get('/home', 'HomeController@index');
