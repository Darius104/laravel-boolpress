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

Auth::routes();

Route::middleware('auth') // i controller che fanno parte di 'auth' saranno private
    ->namespace('Admin') // cercare i namespace dentro la cartella admin
    ->name('admin.')  // tutte le rotte protette nell'area admin devono iniziare le rotte con admin.
    ->prefix('admin')   // tutte le rotte devono iniziare con /admin ecc...
    ->group(function(){
        // tutte le rotte private
        Route::get('/', 'HomeController@index')->name('home');
        Route::resource('posts', 'PostController');
    });

Route::get('{any?}', function(){
    return view('guests.home');
})->where('any','.*');