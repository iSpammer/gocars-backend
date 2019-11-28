<?php
use App\Car;
use App\User;

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

Route::post('/register', 'UserController@register');
Route::post('/login', 'UserController@login');
Route::get('/user', 'UserController@getCurrentUser');
Route::post('/update', 'UserController@update');
Route::post('/logout', 'UserController@logout');




Route::get('/temps', 'TempController@index');
Route::post('/temps', 'TempController@store');
