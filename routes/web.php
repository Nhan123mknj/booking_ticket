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
    Route::get('/detail/{slug}', [
        'as' => 'detailMovie', // Make sure this matches the reference in your view
        'uses' => 'App\Http\Controllers\MovieController@detailmovie'
    ]);


Route::group(['prefix' => 'admin'], function () {
    Route::get('',[
        'as'=>'',
        'uses'=>'App\Http\Controllers\Admin\AdminController@getIndex'
    ]);
    Route::get('/index',[
        'as'=>'admin',
        'uses'=>'App\Http\Controllers\Admin\AdminController@getHome'
    ]);

    //quan ly phim
    Route::get('/movie',[
        'as'=>'movie-admin',
        'uses'=>'App\Http\Controllers\Admin\MovieController@index'
    ]);
    Route::get('/add-movie',[
        'as'=>'add-movie-admin',
        'uses'=>'App\Http\Controllers\Admin\MovieController@create'
    ]);
    Route::post('/add-movie',[
        'as'=>'add-movie-admin1',
        'uses'=>'App\Http\Controllers\Admin\MovieController@store'
    ]);
    Route::get('/edit/{id}',[
        'as'=>'edit-movie-admin',
        'uses'=>'App\Http\Controllers\Admin\MovieController@edit'
    ]);
    Route::post('/update/{id}',[
        'as'=>'update-movie-admin',
        'uses'=>'App\Http\Controllers\Admin\MovieController@update'
    ]);
    Route::get('/delete-movie/{id}',[
        'as'=>'delete-movie-admin',
        'uses'=>'App\Http\Controllers\Admin\MovieController@destroy'
    ]);
    //quan ly the loai

});
Route::get('/fetch-movies',[
    'as'=>'a',
    'uses'=>'App\Http\Controllers\MovieController@fetchMovies'
]);
Route::get('/movies/{id}', 'App\Http\Controllers\MovieController@show');
