<?php

use Illuminate\Support\Facades\Route;

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
Route::prefix('admin')->group(function () {
    Route::get('/',[
        'as'=>'admin.login',
        'uses'=>'AdminController@loginAdmin'
    ]);
    Route::post('/login/ok',[
        'as'=>'admin.loginpost',
        'uses'=>'AdminController@postLoginAdmin'
    ]);
    Route::get('/register',[
        'as'=>'admin.register',
        'uses'=>'AdminController@resgisterAdmin'
    ]);
    Route::post('/register/ok',[
        'as'=>'admin.registerpost',
        'uses'=>'AdminController@postregister'
    ]);
    Route::get('/logout',[
        'as'=>'admin.loguot',
        'uses'=>'AdminController@logoutAdmin'
    ]);
    

    
    Route::get('/home',[
        'as'=>'admin.home',
        'uses'=>'AdminController@index'
    ]);
});
Route::prefix('admin/slider')->group(function () {
    Route::get('/slider',[
        'as'=>'admin.slider.index',
        'uses'=>'AdminSliderController@index'
    ]);
    Route::get('/slider/add',[
        'as'=>'admin.slider.add',
        'uses'=>'AdminSliderController@add'
    ]);
    Route::post('/slider/store',[
        'as'=>'admin.slider.store',
        'uses'=>'AdminSliderController@store'
    ]);
    Route::get('/edit/{id}',[
        'as'=>'slider.edit',
        'uses'=>'AdminSliderController@edit',
        

                         ]);
    Route::post('/slider/{id}',[
        'as'=>'slider.update',
        'uses'=>'AdminSliderController@update'
                         ]);

     Route::get('/delete/{id}',[
        'as'=>'slider.delete',
        'uses'=>'AdminSliderController@delete',
        

                         ]);
});
//Tỉnh thành phố 
Route::post('/delivery',[
	'as'=>'select_delivery',
	'uses'=>'AdminCityController@select_delivery'
]);

Route::prefix('admin/city')->group(function () {
    Route::get('/',[
        'as'=>'admin.city.index',
        'uses'=>'AdminCityController@index'
    ]);
    Route::get('/add',[
        'as'=>'admin.city.add',
        'uses'=>'AdminCityController@add'
    ]);
    Route::post('/store',[
        'as'=>'admin.city.store',
        'uses'=>'AdminCityController@store'
    ]);
    Route::get('/edit/{id}',[
        'as'=>'city.edit',
        'uses'=>'AdminCityController@edit',
        

                         ]);
    Route::post('/update/{id}',[
        'as'=>'city.update',
        'uses'=>'AdminCityController@update'
                         ]);

     Route::get('/delete/{id}',[
        'as'=>'city.delete',
        'uses'=>'AdminCityController@delete',
        

                         ]);
});

