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
Route::auth();
Route::get('auth/logout', 'Auth\LoginController@logout');

Route::get('/home', function () {
    return view('welcome');
});
Route::get('/', function () {
    return redirect('/home');
});

Route::post('/emails', 'ContactControl_ler@sendEmail');
Route::get('/emails', function () {
    return view('emails.request');
});

Route::group([
'namespace'=>'users',
'middleware'=>'auth'
],
function() {
Route::get('/buygood', function () {
    return view('users.welcome.index');
});
Route::resource('users/identite', 'identiteController',['expect'=>['update','index', 'destroy','edit','show']]);
Route::resource('users/userslist', 'ListUsersController',['expect'=>['update', 'edit']]);
Route::resource('users/mdp', 'MdpController',['expect'=>['update','edit']]);
Route::resource('users/produits', 'ItemsController',['expect'=>['update','index', 'destroy','edit','show','store']]);
Route::resource('users/photos', 'PhotosController',['expect'=>['update','index', 'destroy','edit','show','store']]);
Route::resource('users/commandes','CommandesController',['expect'=>['index', 'edit','show','store']]);
Route::resource('users/archive', 'CommandesoldController',['expect'=>['index']]);
Route::resource('shop', 'CartController', ['only' => ['index', 'store', 'update', 'destroy']]);
Route::post('/emails', 'ContactController@sendEmail');
Route::get('/emails', function () {
    return view('emails.request');
});
});
