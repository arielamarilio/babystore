<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', ['as'=>'home']);

Route::group(['prefix'=>'categorias', 'where'=>['id'=>'[0-9]+']], function() {
	Route::get('',['as'=>'categories', 'uses'=>'CategoriesController@index']);
	Route::get('novo',['as'=>'categories.create', 'uses'=>'CategoriesController@create']);
	Route::post('store',['as'=>'categories.store', 'uses'=>'CategoriesController@store']);
	Route::get('{id}/remover',['as'=>'categories.destroy', 'uses'=>'CategoriesController@destroy']);
	Route::get('{id}/editar',['as'=>'categories.edit', 'uses'=>'CategoriesController@edit']);
	Route::put('{id}/update',['as'=>'categories.update', 'uses'=>'CategoriesController@update']);
});

Route::group(['prefix'=>'marcas', 'where'=>['id'=>'[0-9]+']], function() {
	Route::get('',['as'=>'brands', 'uses'=>'BrandsController@index']);
	Route::get('novo',['as'=>'brands.create', 'uses'=>'BrandsController@create']);
	Route::post('store',['as'=>'brands.store', 'uses'=>'BrandsController@store']);
	Route::get('{id}/remover',['as'=>'brands.destroy', 'uses'=>'BrandsController@destroy']);
	Route::get('{id}/editar',['as'=>'brands.edit', 'uses'=>'BrandsController@edit']);
	Route::put('{id}/update',['as'=>'brands.update', 'uses'=>'BrandsController@update']);
});

Route::group(['prefix'=>'produtos', 'where'=>['id'=>'[0-9]+']], function() {
	Route::get('',['as'=>'products', 'uses'=>'ProductsController@index']);

	Route::get('novo',['as'=>'products.create', 'uses'=>'ProductsController@create']);
	Route::get('{id}/remover',['as'=>'products.destroy', 'uses'=>'ProductsController@destroy']);
	Route::get('{id}/editar',['as'=>'products.edit', 'uses'=>'ProductsController@edit']);
	Route::post('update',['as'=>'products.update', 'uses'=>'ProductsController@internal_update']);

	Route::get('upload',['as'=>'products.upload', 'uses'=>'ProductsController@upload_get']);
	Route::post('upload',['as'=>'products.upload', 'uses'=>'ProductsController@upload_post']);
	
	Route::post('remove_upload',['as'=>'products.upload', 'uses'=>'ProductsController@remove_upload']);
});

Route::group(['prefix'=>'meus_dados', 'where'=>['id'=>'[0-9]+']], function() {
	Route::get('',['as'=>'users', 'uses'=>'UsersController@index']);
	Route::get('/editar',['as'=>'users.edit', 'uses'=>'UsersController@edit']);
	Route::post('/internal_update',['as'=>'users.internal_update', 'uses'=>'UsersController@internal_update']);
});

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
