<?php
Auth::routes(['register' => false]);


Route::get('/', 'PagesController@index')->name('home');

Route::resource('dashboard', 'DashboardController');

Route::group([
	'prefix' => 'admin',
	'namespace' => 'Admin',
	'middleware' => 'auth'],
function (){
	Route::resource('users', 'UsersController', ['as' => 'admin']);
	Route::resource('rh/recibosnomina', 'RecibosNominaController', ['as' => 'admin']);
	Route::resource('closters', 'ClosterController', ['as' => 'admin']);
	Route::post('clostersrestore/{closter}', 'ClosterController@restore', ['as' => 'admin'])
	->name('admin.closters.restore');
	Route::post('clostersdelete/{closter}', 'ClosterController@forceDelete', ['as' => 'admin'])
	->name('admin.closters.forceDelete'); //Ruta para recuperar registro de Closter Borrado
	Route::resource('marcas', 'MarcaController', ['as' => 'admin']);
	Route::resource('emas', 'EmaController', ['as' => 'admin']);
	Route::resource('ebas', 'EbaController', ['as' => 'admin']);
});
