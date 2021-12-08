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

// Route::get('/', function () {
//     return view('UserHome.pages.home');
// });
Route::prefix('admin')->group(function () {
    Route::get('/', [
        'as' => 'admin.home',
        'uses' => 'AdminController@index'
    ]);
    Route::get('/login', [
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
    Route::prefix('adminblog')->group(function(){
        Route::get('/',[
            'as'=> 'adminblog.index',
            'uses'=> 'AdminBlog@index'
        ]);
        Route::get('/add_blog',[
            'as'=> 'adminblog.add',
            'uses'=> 'AdminBlog@add'
        ]);
        Route::post('/add_blog/store',[
            'as'=> 'adminblog.addstore',
            'uses'=> 'AdminBlog@addstore'
        ]);
        Route::get('/update_blog/{id}',[
            'as'=> 'adminblog.update',
            'uses'=> 'AdminBlog@update'
        ]);
        Route::post('/update_blgpost/{id}',[
            'as'=> 'adminblog.pupdate',
            'uses'=> 'AdminBlog@pupdate'
        ]);
    });
    Route::prefix('admincontact')->group(function(){
        Route::get('/',[
            'as'=> 'admincontact.index',
            'uses'=> 'AdminContact@index'
        ]);
        Route::get('/view-admin_contact/{id}',[
            'as'=> 'admincontact.view',
            'uses'=> 'AdminContact@view'
        ]);
    });
});
//Tỉnh thành phố 
Route::post('/delivery', [
    'as' => 'select_delivery',
    'uses' => 'AdminCityController@select_delivery'
]);
Route::post('/delivery/sonha', [
    'as' => 'select_delivery',
    'uses' => 'AdminTinController@select_delivery'
]);
Route::post('/delivery/songay', [
    'as' => 'select_delivery',
    'uses' => 'AdminTinController@select_day'
]);

Route::prefix('admin/city')->group(function () {
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
//User
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
                            
Route::prefix('UserHome')->group(function(){
    Route::get('', [
        'as'=>'home.index',
        'uses'=>'UserHomeController@index'
    ]);
    
    Route::get('/logout', [
        'as'=>'home.logout',
        'uses'=>'UserHomeController@logout'
    ]);

    Route::prefix('profile')->group(function(){
        Route::get('',[
            'as'=> 'profile.index',
            'uses'=> 'ProfileUserController@index'
        ]);
        Route::get('Postings', [
            'as'=> 'profile.postings',
            'uses'=> 'ProfileUserController@postings'
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
//setting
Route::prefix('settings')->group(function () {
    Route::get('/',[
        'as'=>'settings.index',
        'uses'=>'AdminSettingController@index',
        
                         ]);
    Route::get('/create',[
        'as'=>'settings.create',
        'uses'=>'AdminSettingController@create',
        

                         ]);
    Route::post('/store',[
        'as'=>'settings.store',
        'uses'=>'AdminSettingController@store'
        
                         ]);
    Route::get('/edit/{id}',[
        'as'=>'settings.edit',
        'uses'=>'AdminSettingController@edit',
        

                         ]);
    Route::post('/update/{id}',[
        'as'=>'settings.update',
        'uses'=>'AdminSettingController@update'
                         ]);

     Route::get('/delete/{id}',[
        'as'=>'settings.delete',
        'uses'=>'AdminSettingController@delete',
        

                         ]);
    
});
//Tin
Route::prefix('tin')->group(function () {
    Route::get('/',[
        'as'=>'tin.index',
        'uses'=>'AdminTinController@index',
        
        ]);
    Route::get('/create',[
        'as'=>'tin.create',
        'uses'=>'AdminTinController@create',
        ]);
    Route::post('/store',[
        'as'=>'tin.store',
        'uses'=>'AdminTinController@store'
        ]);
    Route::get('/edit/{id}',[
        'as'=>'tin.edit',
        'uses'=>'AdminTinController@edit',
        ]);
    Route::post('/update/{id}',[
        'as'=>'tin.update',
        'uses'=>'AdminTinController@update'
        ]);

     Route::get('/delete/{id}',[
        'as'=>'tin.delete',
        'uses'=>'AdminTinController@delete',
        ]);
    
});
Route::prefix('UserContact')->group(function(){
    Route::get('/', [
        'as'=>'contact.index',
        'uses'=>'Contact@index'
    ]);
    Route::post('/post-contact', [
        'as'=>'contact.post',
        'uses'=>'Contact@post'
    ]);
});
Route::prefix('Bài viết')->group(function(){
    Route::get('/Bai viet/{id}', [
        'as'=>'post.detail',
        'uses'=>'PostingController@index'
    ]);
    Route::get('/Đăng bài', [
        'as'=>'post.create',
        'uses'=>'PostingController@create'
    ]);
    Route::post('/Đăng bài', [
        'as'=>'post.store',
        'uses'=>'PostingController@store'
    ]);
Route::prefix('UserBlog')->group(function(){
    Route::get('/', [
        'as'=>'blog.index',
        'uses'=>'Blog@index'
    ]);
    // Route::post('/post-contact', [
    //     'as'=>'contact.post',
    //     'uses'=>'Contact@post'
    // ]);
});
//Role
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
});