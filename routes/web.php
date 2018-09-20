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

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::group(['namespace'=>'Admin'],function(){
	Route::group(['prefix'=>'login','middleware'=>'CheckLogedIn'],function(){
		Route::get('/','LoginController@getLogin');
		Route::post('/','LoginController@postLogin');

	});
	Route::get('logout','HomeController@getLogout');
	Route::group(['prefix'=>'admin','middleware'=>'CheckLogedOut'],function(){
		Route::get('home','HomeController@getHome')->name('Home');

		Route::group(['prefix'=>'category'],function(){
			Route::get('/','CategoryController@getCate')->name('Category');
			Route::post('/','CategoryController@postCate');

			Route::get('/edit/{id}','CategoryController@getEditCate')->name('EditCate');
			Route::post('/edit','CategoryController@postEditCate')->name('postEditCate');

			Route::get('delete/{id}','CategoryController@getDeleteCate');

		});
		Route::group(['prefix'=>'product'],function(){
			Route::get('/','ProductController@getProduct')->name('Product');

			Route::get('add','ProductController@getAddProduct')->name('AddProduct');
			Route::post('add','ProductController@postAddproduct')->name('postAddproduct');

			Route::get('/edit/{id}','ProductController@getEditProduct')->name('EditProduct');
			Route::post('/edit','ProductController@postEditProduct')->name('postEditProduct');

			Route::get('delete/{id}','ProductController@getDeleteproduct')->name('DeleteProduct');

		});
	});

});
