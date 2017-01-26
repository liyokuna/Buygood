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
Route::group([
'namespace'=>'users',
'middleware'=>'auth'
],
function() {
Route::get('/buygood', function () {
    return view('users.welcome.index');
});
Route::resource('users/identite', 'identiteController',['expect'=>['update','index', 'destroy','edit']]);
Route::resource('users/userslist', 'ListUsersController',['expect'=>['update', 'edit']]);
Route::resource('users/mdp', 'MdpController',['expect'=>['update','edit']]);
Route::resource('users/produits', 'ItemsController');
});
