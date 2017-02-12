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

Route::get('/input-group',[
    'uses' => 'GroupInputController@index',
    'as' => 'inputGroup.index'
]);

Route::post('/input-group/store',[
    'uses' => 'GroupInputController@store',
    'as' => 'inputGroup.store'
]);

Route::post('/form/store',[
    'uses' => 'FormController@store',
    'as' => 'form.store'
]);
Route::get('/form/show/{id}', [
    'uses' => 'FormController@show',
    'as' => 'form.show',
]);

Route::get('/', 'FormController@index');
