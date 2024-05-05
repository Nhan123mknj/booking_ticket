<?php

use Illuminate\Support\Facades\Route;






    Route::get('',[
        'as'=>'trang-chu',
        'uses'=>'App\Http\Controllers\PageController@home'
    ]);
    Route::get('/lien-he',[
        'as'=>'lien-he',
        'uses'=>'App\Http\Controllers\ContactController@contact'
    ]);
    Route::get('/movie',[
        'as'=>'phim',
        'uses'=>'App\Http\Controllers\MovieController@movie'
    ]);
    Route::get('/movie/{slug}', [
        'as' => 'moviesByGenre', // Make sure this matches the reference in your view
        'uses' => 'App\Http\Controllers\MovieController@moviesByGenre'
    ]);



Route::group(['prefix' => 'admin'], function () {
    Route::get('',[
        'as'=>'',
        'uses'=>'App\Http\Controllers\AdminController@getIndex'
    ]);
    Route::get('/index',[
        'as'=>'admin',
        'uses'=>'App\Http\Controllers\AdminController@getHome'
    ]);
});
Route::get('/fetch-movies',[
    'as'=>'a',
    'uses'=>'App\Http\Controllers\MovieController@fetchMovies'
]);
Route::get('/movies/{id}', 'App\Http\Controllers\MovieController@show');
