<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Genres;
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
    public function getCate() {
        $genre=Genres::with('movies')->withCount('movies')->limit(5)->get();
        return view('master',[
            "genres"=>$genre
        ]);
    }
    public function getCatemovie($id){
        $danhmuc = Movie::with('genres')->find($id)->get();
        return view('page.movie',compact('danhmuc'));
    }
}
