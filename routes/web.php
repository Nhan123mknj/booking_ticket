<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SeatController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ShowtimeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CinemaController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\CKEditorController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SlideController;
use App\Http\Controllers\StatisticsController;

// Page routes
    Route::controller(PageController::class)->group(function () {

        Route::get('/booking-ticket/{bookingId}/thanh-toan-hoan-tat', 'confirmBooking')->name('book.success');
        Route::get('/', 'home')->name('trang-chu');
    });

    Route::get('/error-404', 'App\Http\Controllers\PageController@error')->name('error-404');
    Route::controller(UserController::class)->group(function () {
        Route::get('/login', 'login')->name('dang-nhap');
        Route::post('/login', 'postlogin')->name('post-login');
        Route::get('/logout', 'logout')->name('logout');
        Route::get('/register', 'register')->name('dang-ky');
        Route::post('/register', 'postregister')->name('post-register');
    });

    Route::controller(ContactController::class)->group(function () {
            Route::get('/lien-he', 'contact')->name('lien-he');
            Route::post('/lien-he', 'sendcontact')->name('lien-he1');
    });

        // Movie routes
    Route::controller(MovieController::class)->group(function () {
            Route::get('/movie', 'movie')->name('phim');
            Route::get('/movies/genre/{id}', 'moviesByGenre')->name('moviesByGenre');
            Route::get('/search/movie', 'search')->name('searchMovie');
            Route::get('/movie/{slug}', 'detailmovie')->name('detailMovie');
            Route::get('/booking/{slug}', 'bookingMovie')->name('bookMovie');
    });
    //Blog routes
    Route::controller(BlogController::class)->group(function () {
        Route::get('/blog', 'blog')->name('blog');
        Route::get('/blog/{slug}', 'detail_blog')->name('detailblog');
        Route::post('/blog/{blogId}/comments', 'postComment')->name('comment_post');
    });
    //Seat routes
    Route::controller(SeatController::class)->group(function () {
        Route::get('/seat-booking/{showtimeId}/seat', 'index')->name('seats.index');
        Route::post('/seat-booking/{showtime}/seats', 'selectSeats')->name('seats.select');
    });

    // Booking routes
    Route::controller(BookingController::class)->group(function () {
        Route::get('/booking-ticket/{showtime}/confirm', 'confirm')->name('book.confirm');
        Route::post('/booking-ticket/{showtime}/booking', 'Datve')->name('book.Datve');
        Route::get('/booking-ticket/{showtimeId}/success', 'bookAndShowSuccess')->name('book.success');
        Route::get('/send-mail','sendEmail')->name('mail.booking');
    });


//route quan ly
Route::prefix('admin')->middleware('admin')->group(function(){

         Route::get('/', [AdminController::class, 'getHome'])->name('admin');

        //quan ly nguoi dung
        Route::controller(UserController::class)->group(function () {
            Route::get('/user', 'index')->name('user-admin');
            Route::get('/add-user', 'create')->name('add-user-admin');
            Route::post('/add-user', 'store')->name('add-user-admin1');
            Route::get('/edit/user{id}', 'edit')->name('edit-user-admin');
            Route::post('/update/user/{id}', 'update')->name('update-user-admin');
            Route::get('/deleted/user/{id}', 'destroy')->name('delete-user-admin');
            Route::get('user/lock/{id}', 'toggleLock')->name('toggle.lock');
            Route::get('user/actived/{id}', 'enable_user')->name('enable.user');
        });

        //quan ly phim
        Route::controller(MovieController::class)->group(function () {
            Route::get('/movie', 'index')->name('movie-admin');
            Route::get('/add-movies', 'create')->name('add-movie-admin');
            Route::post('/add-movies', 'store')->name('add-movie-admin1');
            Route::get('/edit/{id}', 'edit')->name('edit-movie-admin');
            Route::post('/update/{id}', 'update')->name('update-movie-admin');
            Route::get('/delete-movie/{id}', 'destroy')->name('delete-movie-admin');
            Route::post('/search/movie_search', 'search_admin_movie')->name('searchMovie1');
        });

        // quan ly blog
        Route::controller(BlogController::class)->group(function () {
            Route::get('/blog', 'index')->name('blog-admin');
            Route::get('/blog/detail/{id}','show')->name('show-detail-blog');
            Route::get('/add-blog', 'create')->name('add-blog-admin');
            Route::post('/add-blog', 'store')->name('add-blog-admin1');
            Route::get('/blog/active/{id}', 'active_toggle')->name('toggle.active');
            Route::get('/delete-blog/{id}', 'destroy')->name('delete-blog-admin');
            Route::get('/edit-blog-a/{link}', 'edit')->name('edit-blog-admin');
            Route::post('/update/blog/{link}', 'update')->name('update-blog-admin');
            Route::post('/upload', 'upload')->name('ckeditor.upload');
            Route::post('/search/blog_search', 'search_admin_blog')->name('search-blog');
            Route::get('/comments/{id}', 'commentsByBlog')->name('comment.blog');
            Route::get('/comment/active/{id}', 'active_toggle_comment')->name('toggle_comment.active');
            Route::get('/delete-comment/{id}', 'destroy_comment')->name('delete-comment-admin');
        });

        // quan ly the loai
        Route::controller(GenreController::class)->group(function () {
            Route::get('/genres', 'index')->name('genres-admin');
            Route::get('/add-genres', 'create')->name('add-genres-admin');
            Route::post('/add-genres', 'store')->name('add-genres-admin1');
            Route::get('/edit/genres/{slug}', 'edit')->name('edit-genres-admin');
            Route::post('/update/genres/{slug}', 'update')->name('update-genres-admin1');
            Route::get('/delete-genres/{id}', [GenreController::class, 'destroy'])->name('delete-genres');
            Route::get('user/active/{id}', 'enable_genres')->name('enable-genres');
        });

        //quan ly ghe
        Route::controller(SeatController::class)->group(function () {
            Route::get('/seats', 'index_admin')->name('seat-admin');
            Route::get('/seats/{id}', 'SeatByCinema')->name('seat-cinema');
            Route::get('/add-seat', [SeatController::class, 'create'])->name('add-seat');
            Route::post('/add-seats', 'store')->name('add-post-admin1');
            Route::get('/edit/seats/{id}', 'edit')->name('edit-seats-admin');
            Route::post('/update/seats/{id}', 'update')->name('update-seats-admin');
            Route::get('/delete/{id}', 'destroy')->name('delete-seat-admin');
        });

        Route::controller(ShowtimeController::class)->group(function () {
            Route::get('/showtime/{movieId}', 'showShowtimes')->name('showtime-admin');
            Route::get('/add-showtime/{movieId}', 'create')->name('add-showtime-admin1');
            Route::post('/add-showtime/{movieId}', 'store')->name('add-showtime-admin');
            Route::get('/edit/showtime1/{id}', 'edit')->name('edit-showtime-admin1');
            Route::post('/update/showtime1/{id}', 'updated')->name('update-showtime-admin1');
            Route::get('/deleted/showtime/{id}', 'destroy')->name('delete-showtime-admin');

        });

        Route::controller(ContactController::class)->group(function () {
            Route::get('/contact', 'index')->name('contact-admin');
            Route::get('/show/{id}', 'show')->name('show-contact-admin');
            Route::post('/status/{id}', 'status')->name('status-contact-admin');
            Route::get('/deleted/{id}', 'destroy')->name('delete-contact-admin');

        });

        Route::controller(CinemaController::class)->group(function () {
            Route::get('/cinema', 'index')->name('cinema-admin');
            Route::get('/show-cinema/{id}', 'show')->name('show-cinema-admin');
            Route::get('/add-cinema', 'create')->name('add-cinema-admin');
            Route::post('/add-cinemas', 'store')->name('add-cinema-admin1');
            Route::get('/edit/cinema/{id}', 'edit')->name('edit-cinema-admin');
            Route::post('/update/cinema/{id}', 'update')->name('update-cinema-admin');
            Route::get('/deleted/cinema/{id}', 'destroy')->name('delete-cinema-admin');

        });

        Route::controller(BookingController::class)->group(function () {
            Route::get('/booking', 'index')->name('booking-admin');
            Route::get('/show-booking/{id}', 'show')->name('show-booking-admin');
            Route::get('/add-booking', 'create')->name('add-booking-admin');
            Route::post('/add-cinema', 'store')->name('add-cinema-admin');
            Route::get('/edit/booking/{id}', 'edit')->name('edit-booking-admin');
            Route::post('/update/cinema/{id}', 'update')->name('update-cinema-admin');
            Route::get('/deleted/booking/{id}', 'destroy')->name('delete-booking-admin');

        });

        Route::controller(SlideController::class)->group(function () {
            Route::get('/slide', 'index')->name('slide-admin');
            Route::get('/show-slide/{id}', 'show')->name('show-slide-admin');
            Route::get('/add-slide', 'create')->name('add-slide-admin');
            Route::post('/add-slide', 'store')->name('add-slide-admin');
            Route::get('/edit/booking/{id}', 'edit')->name('edit-slide-admin');
            Route::post('/update/slide/{id}', 'update')->name('update-slide-admin');
            Route::get('/deleted/slide/{id}', 'destroy')->name('delete-slide-admin');

        });
        Route::get('/statistics', [StatisticsController::class, 'index']);
        Route::post('/statistics/bookings-by-date-range', [StatisticsController::class, 'bookingsByDateRange']);
        Route::post('ckeditor/upload', [CKEditorController::class, 'store'])->name('ckeditor.upload');

});


Route::get('/fetch-movies',[
    'as'=>'a',
    'uses'=>'App\Http\Controllers\MovieController@fetchMovies'
]);

Route::post('/send-verification-email', [BookingController::class, 'sendVerificationEmail']);
Route::get('/verify-email/{token}', [BookingController::class, 'verifyEmail'])->name('verifyEmail');
Route::post('/vnpay_payment/{showtimeId}', [BookingController::class, 'vnpay_payment'])->name('vnpay');


Route::get('/laylichchieutheophim/{id}', 'App\Http\Controllers\ShowtimeController@showtimeByMovie')->name('showtimeByMovie');


Route::get('    ', 'App\Http\Controllers\ApiController@importTinhThanhFromApi');
