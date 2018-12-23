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


Auth::routes();


Route::get('/', function() {
    return redirect('/admin/products');
});

Route::get('/logout', function() {
    Auth::logout();
    return redirect('/admin');

});

Route::middleware(['auth'])->group(function () {

    Route::get('/products', 'Admin\HomeController@products')->name('admin-dashboard');
    Route::post('/products', 'Admin\HomeController@products')->name('admin-dashboard');

    Route::get('/product', 'Admin\HomeController@product')->name('admin-product-detail');
    Route::post('/save_product', 'Admin\HomeController@save_product')->name('admin-product-save');


});
/*
Route::post('/results', 'ResultsController@getAll');

Route::get('/admin', 'AdminController@hotsheet');
Route::post('/admin', 'AdminController@hotsheet');

Route::get('/about',function(){
    return view('about');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
*/