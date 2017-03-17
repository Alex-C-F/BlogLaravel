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
Route::group(['middleware'=>['web']], function(){
	Route::get('blog/{slug}',['as' => 'blog.single', 'uses' => 'BlogController@getSingle'])
		->where('slug','[\w\d\-\_]+');
	Route::get('blog',['uses'=>'BlogController@getIndex','as'=>'blog.index']);
	//roda para galeria de imagens
	Route::get('/galeria',function(){
		return view('galeria.index');
	});
	Route::get('/','PagesController@getIndex');
	Route::get('/about', 'PagesController@getAbout');
	Route::get('/contact', 'PagesController@getContact');
	Route::post('/contact','PagesController@postContact');
	Route::resource('posts','PostController');
	Route::resource('categorias','CategoriasController');
	//rotas de atenticação
	Route::get('login',['as'=>'login','uses'=> 'Auth\LoginController@showLoginForm']
	);

	Route::post('login',['as'=>'login','uses'=> 'Auth\LoginController@login']
	);

	Route::post('password/reset',['as'=>'password.reset','uses'=>'Auth\ResetPasswordController@reset']
	);

	Route::get('password/reset', ['as'=>'password.request','uses'=>'Auth\ResetPasswordController@showLinkRequestForm']);
	
	Route::get('sair',['as'=>'logout','uses'=>'Auth\LoginController@logout']
		);

});

	

