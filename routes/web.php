<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController  as AdminUserController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SeatController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\GenresController;
use App\Http\Controllers\Admin\MovieController;
use App\Http\Controllers\CKEditorController;


Route::get('/login', [UserController::class, 'login'])->name('dang-nhap');
Route::post('/login', [UserController::class, 'postlogin'])->name('post-login');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
Route::get('/register', [UserController::class, 'register'])->name('dang-ky');
Route::post('/register', [UserController::class, 'postregister'])->name('post-register');



    Route::get('',[
        'as'=>'trang-chu',
        'uses'=>'App\Http\Controllers\PageController@home'
    ]);

    Route::get('/lien-he',[
        'as'=>'lien-he',
        'uses'=>'App\Http\Controllers\ContactController@contact'
    ]);
    Route::post('/lien-he',[
        'as'=>'lien-he1',
        'uses'=>'App\Http\Controllers\ContactController@sendcontact'
    ]);

    Route::get('/movie',[
        'as'=>'phim',
        'uses'=>'App\Http\Controllers\MovieController@movie'
    ]);
    Route::get('/movies/genre/{id}', [
        'as' => 'moviesByGenre',
        'uses' => 'App\Http\Controllers\MovieController@moviesByGenre'
    ]);
    Route::get('/movie/{slug}', [
        'as' => 'detailMovie',
        'uses' => 'App\Http\Controllers\MovieController@detailmovie'
    ]);
//
    Route::get('/booking/{slug}', [
        'as' => 'bookMovie',
        'uses' => 'App\Http\Controllers\MovieController@bookingMovie'
    ]);
//
    Route::get('/blog', [
        'as' => 'blog',
        'uses' => 'App\Http\Controllers\BlogController@blog'
    ]);
    Route::get('/blog/{slug}', [
        'as' => 'detailblog',
        'uses' => 'App\Http\Controllers\BlogController@detail_blog'
    ]);

    Route::post('blog/{blogId}/comments', [
        'as' => 'comment_post',
        'uses' => 'App\Http\Controllers\BlogController@postComment'
    ]);


    Route::prefix('admin')->middleware('admin')->group(function(){

        Route::get('/',[
            'as'=>'admin',
            'uses'=>'App\Http\Controllers\Admin\AdminController@getHome'
        ]);


        //quan ly nguoi dung
        Route::get('/user', [AdminUserController::class, 'index'])->name('user-admin');
        Route::get('/add-user', [AdminUserController::class, 'create'])->name('add-user-admin');
        Route::post('/add-user', [AdminUserController::class, 'store'])->name('add-user-admin1');
        Route::get('/edit/user{id}', [AdminUserController::class, 'edit'])->name('edit-user-admin');
        Route::post('/update/user{id}', [AdminUserController::class, 'update'])->name('update-user-admin');
        Route::get('/deleted/{id}', [AdminUserController::class, 'destroy'])->name('delete-user-admin');
        Route::get('user/lock/{id}', [AdminUserController::class, 'toggleLock'])->name('toggle.lock');
        Route::get('user/actived/{id}', [AdminUserController::class, 'enable_user'])->name('enable.user');

        //quan ly phim
        Route::get('/movie', [MovieController::class, 'index'])->name('movie-admin');
        Route::get('/add-movie', [MovieController::class, 'create'])->name('add-movie-admin');
        Route::post('/add-movie', [MovieController::class, 'store'])->name('add-movie-admin1');
        Route::get('/edit/{id}', [MovieController::class, 'edit'])->name('edit-movie-admin');
        Route::post('/update/{id}', [MovieController::class, 'update'])->name('update-movie-admin');
        Route::get('/delete-movie/{id}', [MovieController::class, 'destroy'])->name('delete-movie-admin');
        //contact
        Route::get('/blog', [BlogController::class, 'index'])->name('blog-admin');
        Route::get('/add-blog', [BlogController::class, 'create'])->name('add-blog-admin');
        Route::post('/add-blog', [BlogController::class, 'store'])->name('add-blog-admin1');
        Route::get('/blog/active/{id}', [BlogController::class, 'active_toggle'])->name('toggle.active');
        Route::get('/delete-blog/{id}', [BlogController::class, 'destroy'])->name('delete-blog-admin');
        Route::get('/edit-blog-a/{id}', [BlogController::class, 'edit'])->name('edit-blog-admin');
        Route::post('/update/blog/{id}', [BlogController::class, 'update'])->name('update-blog-admin');
        Route::post('/upload', [BlogController::class, 'upload'])->name('ckeditor.upload');
        //the-loai
        Route::get('/genres', [GenresController::class, 'index'])->name('genres-admin');
        Route::get('/add-genres', [GenresController::class, 'create'])->name('add-genres-admin');
        Route::post('/add-genres', [GenresController::class, 'store'])->name('add-genres-admin1');
        Route::get('/edit/genres{id}', [GenresController::class, 'edit'])->name('edit-genres-admin');
        Route::post('/update/genres{id}', [GenresController::class, 'update'])->name('update-genres-admin');
        Route::get('/delete/{id}', [GenresController::class, 'destroy'])->name('delete-genres-admin');
        Route::get('user/active/{id}', [GenresController::class, 'enable_genres'])->name('enable-genres');

        Route::post('ckeditor/upload', [CKEditorController::class, 'store'])->name('ckeditor.upload');

    });


Route::get('/fetch-movies',[
    'as'=>'a',
    'uses'=>'App\Http\Controllers\MovieController@fetchMovies'
]);
Route::get('/movies/{id}', 'App\Http\Controllers\MovieController@show');

Route::get('/error-404', 'App\Http\Controllers\PageController@error')->name('error-404');

Route::get('/laylichchieutheophim/{id}', 'App\Http\Controllers\ShowtimeController@showtimeByMovie')->name('showtimeByMovie');

Route::get('/seat-booking/{showtimeId}/seat', [SeatController::class, 'index'])->name('seats.index');
Route::post('/seat-booking/{showtime}/seats', [SeatController::class, 'selectSeats'])->name('seats.select');
Route::get('/booking-ticket/{showtime}/confirm', [BookingController::class, 'confirm'])->name('book.confirm');
Route::post('/booking-ticket/{showtime}/booking', [BookingController::class, 'Datve'])->name('book.Datve');
Route::get('/booking-ticket/{bookingId}/thanh-toan-hoan-tat', [PageController::class, 'confirmBooking'])->name('book.success');



