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

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::post('/addtask', 'HomeController@addTodo');
Route::get('/add', 'HomeController@addPage');
Route::get('/delete/{id}', 'HomeController@delete');
Route::post('/edittask/{id}', 'HomeController@edit');
Route::get('/edit/{id}', 'HomeController@editPage');
