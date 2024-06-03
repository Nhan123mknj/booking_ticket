<?php

namespace App\Http\Controllers;

use App\Models\Genres;
use App\Models\Movie;
use App\Models\Slide;
use FFI\CData;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

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
    public function bookingMovie($slug){
        $booking=$this->bookMovie($slug);
        $cate=$this->getCate();
        return view('page.booking', [
            "genres"=>$cate,
            'bookings'=>$booking,
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

public function moviesByGenre($id) {
    $genre = Genres::with('movies')->withCount('movies')->where('id',$id)->first();
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

public function bookmovie($slug){
    return Movie::where('slug',$slug)->with('genres')->first();
}
public function seat($slug){
    return Movie::where('slug',$slug)->with('genres')->first();
}
private function getUpcoming(){
    return Movie::where('status','upcoming')->with('genres')->get();
}



//trang admin-movie
public function index()
{
    $movies = Movie::with('genres')->paginate(5);
    return view('admin.movie.movie', [
        'movies'=>$movies
    ]);
}

/**
 * Show the form for creating a new resource.
 */
public function create()
{
    $create = Genres::with('movies')->get();
    $movies = Movie::get();
    return view('admin.movie.create', [
        'creates'=>$create,
        'status'=>$movies
    ]);
}

/**
 * Store a newly created resource in storage.
 */
public function store(Request $request)
{


    $movie = new Movie();
    $movie->title = $request->input('title');
    $movie->duration = $request->input('time');
    $movie->release_date = $request->input('release_date');
    $movie->director = $request->input('director');
    $movie->description = $request->description;
    $movie->Star = $request->input('Star');
    $movie->trailer_url = $request->input('trailer_url');
    $movie->status = $request->status;
    if($request->hasFile('banner_url')){
        $file =$request->file('banner_url');
        $extension = $file->getClientOriginalExtension();
        $fileName=time().'.'.$extension;
        $file->move('source/website/images',$fileName);
        $movie->banner_url =$fileName;
    }if($request->hasFile('banner_doc')){
        $file =$request->file('banner_doc');
        $extension = $file->getClientOriginalExtension();
        $fileName=time().'.'.$extension;
        $file->move('source/website/images',$fileName);
        $movie->banner_doc =$fileName;
    }

    $movie->save();
    if ($request->has('genres')) {
    $movie->genres()->attach($request->genres);
    }
    return redirect()->route('movie-admin')->with('status', 'Them thanh cong');
}

/**
 * Display the specified resource.
 */
public function show(string $id)
{
    //
}

/**
 * Show the form for editing the specified resource.
 */
public function edit(string $id)
{
    $movie = Movie::find($id);
    return view('admin.movie.update',compact('movie'));
}

/**
 * Update the specified resource in storage.
 */
public function update(Request $request, $id)
{
    $movie = Movie::where('id', $id)->first();
    $movie->title = $request->title;

    $movie->duration = $request->time;
    $movie->release_date = $request->release_date;
    $movie->director = $request->director;
    $movie->description = $request->input('description');
    $movie->status = $request->status;
    $movie->trailer_url = $request->input('trailer_url');
if ($request->hasFile('banner_url')) {
    $anhcu='source/website/images'.$movie->banner_url;
    if(File::exists($anhcu)){
        File::delete($anhcu);
    }
    $file = $request->file('banner_url');
    $fileName = time() . '.' . $file->getClientOriginalExtension();
    $file->move('source/website/images', $fileName);
    $movie->banner_url = $fileName;
}

if ($request->hasFile('banner_doc')) {
    $file = $request->file('banner_doc');
    $fileName = time() . '.' . $file->getClientOriginalExtension();
    $file->move('source/website/images', $fileName);
    $movie->banner_doc = $fileName;
}
$movie->update();
if ($request->has('genres')) {
    $movie->genres()->sync($request->genres);
}

return redirect()->route('movie-admin')->with('status', 'Update thành công');
}

/**
 * Remove the specified resource from storage.
 */
public function destroy(string $id)
{
    $movie=Movie::find($id);
    $movie->delete();
    return redirect()->back()->with('success', 'Xoa thanh cong');
}

public function search(Request $request)
{
    $keyword = $request->input('keyword_submit');
    $movie_search=Movie::with('genres')->where('Is_Active',1)->where('title','like','%'.$keyword.'%')->get();
    // dd($movie_search);
    $cate=$this->getCate();
    return view('page.search_movie', [
        'movies'=>$movie_search,
        "genres"=>$cate
    ]);
}
}



