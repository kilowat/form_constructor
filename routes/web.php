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

Route::group(['prefix' => 'input-group'], function(){

    Route::get('/',[
        'uses' => 'GroupInputController@index',
        'as' => 'inputGroup.index'
    ]);

    Route::get('show/{id}', [
        'uses' => 'GroupInputController@shoe',
        'as' => 'inputGroup.show'
    ]);

    Route::get('edit/{id}', [
        'uses' => 'GroupInputController@edit',
        'as' => 'inputGroup.edit'
    ]);

    Route::post('update', [
        'uses' => 'GroupInputController@update',
        'as' => 'inputGroup.update'
    ]);

    Route::post('store',[
        'uses' => 'GroupInputController@store',
        'as' => 'inputGroup.store'
    ]);
});

Route::group(['prefix' => 'inputs'], function(){

    Route::get('/', [
        'uses' => 'InputController@index',
        'as' => 'input.index'
    ]);

    Route::post('store',[
        'uses' => 'InputController@store',
        'as' => 'input.store'
    ]);

    Route::get('edit/{id}',[
        'uses' => 'InputController@edit',
        'as' => 'input.edit'
    ]);

    Route::post('update', [
        'uses' => 'InputController@update',
        'as' => 'input.update'
    ]);
});



Route::group(['prefix' => 'form'], function(){

    Route::post('store',[
        'uses' => 'FormController@store',
        'as' => 'form.store'
    ]);

    Route::get('show/{id}', [
        'uses' => 'FormController@show',
        'as' => 'form.show',
    ]);

    Route::get('edit/{id}', [
        'uses' => 'FormController@edit',
        'as' => 'form.edit',
    ]);

    Route::post('update', [
        'uses' => 'FormController@update',
        'as' => 'form.update',
    ]);
});

Route::group(['prefix' => 'options'], function(){

    Route::get('/',[
        'uses' => 'OptionController@index',
        'as' => 'option.index',
    ]);

    Route::post('store', [
        'uses' => 'OptionController@store',
        'as' => 'option.store',
    ]);

    Route::get('edit/{id}', [
        'uses' => 'OptionController@edit',
        'as' => 'option.edit',
    ]);

    Route::post('update', [
        'uses' => 'OptionController@update',
        'as' => 'option.update'
    ]);

});

Route::get('/', [
    'uses' => 'FormController@index',
    'as' => 'form.index',
]);

//Route::get('/', 'FormController@index');
