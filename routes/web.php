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
    Route::get('/', [
        'as' => 'admin.login',
        'uses' => 'AdminController@loginAdmin'
    ]);
    Route::post('/login/ok', [
        'as' => 'admin.loginpost',
        'uses' => 'AdminController@postLoginAdmin'
    ]);
    Route::get('/register', [
        'as' => 'admin.register',
        'uses' => 'AdminController@resgisterAdmin'
    ]);
    Route::post('/register/ok', [
        'as' => 'admin.registerpost',
        'uses' => 'AdminController@postregister'
    ]);
    Route::get('/logout', [
        'as' => 'admin.loguot',
        'uses' => 'AdminController@logoutAdmin'
    ]);
    Route::get('/', [
        'as' => 'admin.home',
        'uses' => 'AdminController@index'
    ]);
    Route::prefix('slider')->group(function () {
        Route::get('/slider', [
            'as' => 'admin.slider.index',
            'uses' => 'AdminSliderController@index'
        ]);
        Route::get('/slider/add', [
            'as' => 'admin.slider.add',
            'uses' => 'AdminSliderController@add'
        ]);
        Route::post('/slider/store', [
            'as' => 'admin.slider.store',
            'uses' => 'AdminSliderController@store'
        ]);
        Route::get('/edit/{id}', [
            'as' => 'slider.edit',
            'uses' => 'AdminSliderController@edit',
        ]);
        Route::post('/slider/{id}', [
            'as' => 'slider.update',
            'uses' => 'AdminSliderController@update'
        ]);
    
        Route::get('/delete/{id}', [
            'as' => 'slider.delete',
            'uses' => 'AdminSliderController@delete',
        ]);
    });
    Route::prefix('city')->group(function () {
        Route::get('/', [
            'as' => 'admin.city.index',
            'uses' => 'AdminCityController@index'
        ]);
        Route::get('/add', [
            'as' => 'admin.city.add',
            'uses' => 'AdminCityController@add'
        ]);
        Route::post('/store', [
            'as' => 'admin.city.store',
            'uses' => 'AdminCityController@store'
        ]);
        Route::get('/edit/{id}', [
            'as' => 'city.edit',
            'uses' => 'AdminCityController@edit',
        ]);
        Route::post('/update/{id}', [
            'as' => 'city.update',
            'uses' => 'AdminCityController@update'
        ]);
        Route::get('/delete/{id}', [
            'as' => 'city.delete',
            'uses' => 'AdminCityController@delete',
        ]);
    });
    Route::prefix('roles')->group(function () {
        Route::get('/',[
            'as'=>'roles.index',
            'uses'=>'AdminRoleController@index'
                             ]);
        Route::get('/create',[
            'as'=>'roles.create',
            'uses'=>'AdminRoleController@create'
                             ]);
        Route::post('/store',[
            'as'=>'roles.store',
            'uses'=>'AdminRoleController@store'
                             ]);
        Route::get('/edit/{id}',[
            'as'=>'roles.edit',
            'uses'=>'AdminRoleController@edit'
                             ]);
        Route::post('/update/{id}',[
            'as'=>'roles.update',
            'uses'=>'AdminRoleController@update'
                             ]);
    
         Route::get('/delete/{id}',[
            'as'=>'roles.delete',
            'uses'=>'AdminRoleController@delete'
                             ]);
        
    });
    Route::prefix('users')->group(function () {
        Route::get('/',[
            'as'=>'users.index',
            'uses'=>'AdminUserController@index'
        ]);
        Route::get('/create',[
            'as'=>'users.create',
            'uses'=>'AdminUserController@create'
        ]);
        Route::post('/store',[
            'as'=>'users.store',
            'uses'=>'AdminUserController@store'
        ]);
        Route::get('/edit/{id}',[
            'as'=>'users.edit',
            'uses'=>'AdminUserController@edit'
                             ]);
        Route::post('/update/{id}',[
            'as'=>'users.update',
            'uses'=>'AdminUserController@update'
        ]);
    
        Route::get('/delete/{id}',[
            'as'=>'users.delete',
            'uses'=>'AdminUserController@delete'
        ]);
    
    });
});
//Tỉnh thành phố 
Route::post('/delivery', [
    'as' => 'select_delivery',
    'uses' => 'AdminCityController@select_delivery'
]);

//User
<<<<<<< Updated upstream
Route::prefix('users')->group(function () {
    Route::get('/',[
        'as'=>'users.index',
        'uses'=>'AdminUserController@index'
    ]);
    Route::get('/create',[
        'as'=>'users.create',
        'uses'=>'AdminUserController@create'
    ]);
    Route::post('/store',[
        'as'=>'users.store',
        'uses'=>'AdminUserController@store'
    ]);
    Route::get('/edit/{id}',[
        'as'=>'users.edit',
        'uses'=>'AdminUserController@edit'
                         ]);
    Route::post('/update/{id}',[
        'as'=>'users.update',
        'uses'=>'AdminUserController@update'
    ]);

    Route::get('/delete/{id}',[
        'as'=>'users.delete',
        'uses'=>'AdminUserController@delete'
    ]);
});                         
=======
                            
>>>>>>> Stashed changes
Route::prefix('UserHome')->group(function(){
    Route::get('', [
        'as'=>'home.index',
        'uses'=>'UserHomeController@index'
    ]);
    Route::prefix('profile')->group(function(){
        Route::get('',[
            'as'=> 'profile.index',
            'uses'=> 'ProfileUserController@index'
        ]);
    });
    Route::prefix('login')->group(function(){
        Route::get('',[
            'as'=>'home.login',
            'uses'=>'UserHomeController@login'
        ]);
        Route::post('',[
            'as'=>'home.PostLogin',
            'uses'=>'UserHomeController@PostLogin'
        ]);
    });
    Route::prefix('Register')->group(function(){
        Route::get('',[
            'as'=>'home.register',
            'uses'=>'UserHomeController@register'
        ]);
        Route::post('',[
            'as'=>'home.PostRegister',
            'uses'=>'UserHomeController@PostRegister'
        ]);
    });
});
//Role

<<<<<<< Updated upstream
     Route::get('/delete/{id}',[
        'as'=>'roles.delete',
        'uses'=>'AdminRoleController@delete'
                         ]);
    
});
=======
>>>>>>> Stashed changes
