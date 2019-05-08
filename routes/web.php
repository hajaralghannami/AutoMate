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


Route::get('/', 'PagesController@indexpage');
Route::get('/vpc', 'PagesController@vpc');
Route::get('/ec2', 'PagesController@ec2');
Route::get('/about', 'PagesController@about');
Route::get('/contact', 'PagesController@contact');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('templates', 'TemplatesController');


/*
Route::get('/', function () {
    return view('home');
});
*/




