<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Showtime;
use App\Models\Seat;
use App\Models\Booking;
class PageController extends Controller
{
    public function home() {
        $indexData = $this->getIndexData();
        $bannerMovies = $this->getBannerMovies();
        $slides=$this->getSlide();
        $movieUpcoming=$this->getUpcoming();

        $movienow=$this->getNowPlaying();
        return view('page.home', [
            'indexData' => $indexData,
            'bannerMovies' => $bannerMovies,
            'slides'=>$slides,
            'upComing'=>$movieUpcoming,
            'nowPlaying'=>$movienow
        ]);
    }

    private function getIndexData() {
        return [
            'title' => 'Welcome to Our Movie Site',
            'content' => 'Enjoy our curated list of movies and shows.'
        ];
    }



    private function getBannerMovies() {
        return Movie::where('is_active', 1)
                    ->where('is_indexbanner', 1)
                    ->with('genres')
                    ->first();
    }
    private function getSlide(){
        return Movie::where('is_slide',1)->with('genres')->get();
    }
    private function getUpcoming(){
        return Movie::where('status','upcoming')->with('genres')->get();
    }
    private function getNowPlaying(){
        return Movie::where('status','nowshowing')->with('genres')->get();
    }

    public function error() {
        return view('error-404');
    }
    public function confirmBooking( $bookingId)
    {
        $booking = Booking::with('seat', 'showtime', 'user')->findOrFail($bookingId);
        $totalPrice = $booking->seat->price;

        return view('page.success', compact('booking', 'totalPrice'));
    }

}
