<?php

namespace App\Http\Controllers;

use App\Models\Genres;
use App\Models\Movie;
use FFI\CData;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function movie() {

        $movie=$this->Showmovie();
        $cate=$this->getCate();
        return view('page.movie', [
            'movies'=>$movie,
            "genres"=>$cate
        ]);
    }
    public function detailmovie($slug) {

        $detail=$this->movieDetail($slug);
        $upmovie=$this->getUpcoming();
        return view('page.detailmovie', [
            'upmovies'=>$upmovie,
            "details"=>$detail
        ]);
    }
    public function fetchMovies()
{
    $apiKey = '222607975221da78368a51fde11198c5';
    $client = new Client();
    $response = $client->request('GET', "https://api.themoviedb.org/3/movie/upcoming", [
        'query' => [
            'api_key' => $apiKey,
            'language' => 'vi-VN'
        ]
    ]);

    $movies = json_decode($response->getBody()->getContents(), true)['results'];

    foreach ($movies as $movieDetails) {
        // Xử lý từng phim tại đây
        $this->saveMovieDetails($movieDetails);
    }

    return response()->json(['message' => 'Movies fetched and saved successfully!']);
}

private function saveMovieDetails($movieDetails)
{
    $client = new Client();
    $response = $client->request('GET', "https://api.themoviedb.org/3/movie/{$movieDetails['id']}", [
        'query' => [
            'api_key' => '222607975221da78368a51fde11198c5',
            'append_to_response' => 'credits,videos',
            'language' => 'vi-VN'
        ]
    ]);

    $details = json_decode($response->getBody()->getContents(), true);

    // Xử lý và lấy thông tin đạo diễn
    $directors = array_filter($details['credits']['crew'], function ($crew) {
        return $crew['job'] === 'Director';
    });

    // Xử lý và lấy URL của trailer
    $trailer = array_filter($details['videos']['results'], function ($video) {
        return $video['type'] === 'Trailer';
    });

    // Lưu hoặc cập nhật phim trong cơ sở dữ liệu
    $movie = Movie::updateOrCreate(
        ['id' => $movieDetails['id']], // Key để tìm kiếm
        [
            'title' => $movieDetails['title'],
            'duration' => $details['runtime'],
            'director' => implode(', ', array_column($directors, 'name')),
            'description' => $movieDetails['overview'],
            'release_date' => $movieDetails['release_date'],
            'trailer_url' => count($trailer) > 0 ? "https://www.youtube.com/watch?v=" . $trailer[0]['key'] : null,
            'banner_url' => $movieDetails['poster_path']
        ]
    );
}

private function Showmovie()  {

    return Movie::with('genres')->where('Is_Active',1)->paginate(6);
}
public function getCate() {

    return Genres::with('movies')->get();
}

public function moviesByGenre($slug) {
    $genre = Genres::with('movies')->withCount('movies')->where('id',$slug)->first();
    $movies = Movie::with('genres')
    ->where('Is_Active', 1)
    ->whereHas('genres', function ($query) use ($genre) {
        $query->where('id', $genre->id);
    })->get();


    return view('page.genre_movies', [
        'genre' => $genre,
        'movies' => $movies,
    ]);
}

public function movieDetail($slug){
    return Movie::where('slug',$slug)->with('genres')->first();
}
private function getUpcoming(){
    return Movie::where('status','upcoming')->with('genres')->get();
}
}



