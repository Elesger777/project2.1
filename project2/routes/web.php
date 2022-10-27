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
|Route::get('/', function () {
    return view('welcome');
});
*/

Route::group(['middleware'=>'notLogin'], function(){

    Route::get('/login', function () {
        return view('login');
    })->name('login');
    
    Route::get('/qeydiyyat', function () {
        return view('qeydiyyat');
    })->name('qeydiyyat');
    
    
    Route::post('/daxilet', 'App\Http\Controllers\userController@daxilet')->name('daxilet');
    Route::post('/logindaxilet', 'App\Http\Controllers\userController@logindaxilet')->name('logindaxilet');    

});



Route::group(['middleware'=>'isLogin'], function(){
    
Route::post('/gonder', 'App\Http\Controllers\seyfecontroller@gonder')->name('gonder');
Route::get('/', 'App\Http\Controllers\seyfecontroller@siyahi')->name('seyfe1');

Route::get('/sil/{id}', 'App\Http\Controllers\seyfecontroller@sil')->name('sil');
Route::get('/delete/{id}', 'App\Http\Controllers\seyfecontroller@delete')->name('delete');

Route::get('/edit/{id}', 'App\Http\Controllers\seyfecontroller@edit')->name('edit');
Route::post('/update', 'App\Http\Controllers\seyfecontroller@update')->name('update');

Route::get('/logout', 'App\Http\Controllers\userController@logout')->name('logout');
    
});

