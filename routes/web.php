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


Route::group(['namespace' => 'User'], function(){
    // Base route
    Route::get('/', 'BaseController@index');
    Route::get('/tag/post/{tag}', 'BaseController@tag')->name('tag');
    Route::get('/category/{category}/{slug}', 'BaseController@category')->name('category');
    Route::get('/post/{id}/{post}', 'PostController@index')->name('post');
    // Users resource route
    Route::resource('auth/user','UserController');
});
// Social resource route

Route::resource('/social','SocialLinkController');
Route::post('/social/update/{id}','SocialLinkController@update')->name('link.update');

Route::group(['namespace' => 'Admin'], function(){
    // post resource route
    Route::resource('admin/post','PostController');
    // Tag resource route
    Route::resource('admin/tag','TagController');
    // Category resource route
    Route::resource('admin/category','CategoryController');
    Route::resource('admin/role','RoleController');
    Route::resource('admin/permission','PermissionController');

    Route::get('appearance/setting','AppearanceController@index')->name('banner.manage');
    Route::get('appearance/setting/create','AppearanceController@bannerCreate')->name('banner.create');
    Route::post('appearance/setting/create','AppearanceController@bannerStore')->name('banner.store');
    Route::get('appearance/setting/edit/{id}','AppearanceController@bannerEdit')->name('banner.edit');
    Route::post('appearance/setting/update/{id}','AppearanceController@bannerUpdate')->name('banner.update');
    Route::post('appearance/setting/delete/{id}','AppearanceController@bannerDelete')->name('banner.delete');
});


//================== Users Routes start =======================
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('auth/active', 'Auth\ActivationController@activation')->name('auth.active');
Route::get('/user/change/password', 'HomeController@showChangePassForm')->name('user.password.request');;
Route::post('/user/change/password', 'HomeController@UserChangePassword')->name('change.password.request');;
Route::post('/user/logout', 'Auth\LoginController@userLogout')->name('user.logout');;
//================== Users Routes End =======================

//================== Admin Routes start =======================
Route::prefix('admin')->group(function (){
    // Authentication Routes...
    Route::get('login', 'Admin\LoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'Admin\LoginController@login')->name('admin.login');
    Route::get('/dashboard', 'AdminController@index')->name('admin.dashboard');
    Route::post('logout', 'Admin\LoginController@logout')->name('admin.logout');

    // Password Reset Routes...
    Route::get('password/reset', 'Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('password/email', 'Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('password/reset/{token}', 'Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
    Route::post('password/reset', 'Admin\ResetPasswordController@reset');
    Route::get('password/changes', 'AdminController@showChangepassForm')->name('admin.password.changes');
    Route::post('password/update', 'AdminController@AdminChangePassword')->name('admin.password.changes.submit');

});
//================== Admin Routes End =======================



