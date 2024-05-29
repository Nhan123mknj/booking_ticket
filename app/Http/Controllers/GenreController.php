<?php

// File: app/Http/Controllers/GenreController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;
use App\Models\Genres;
use GuzzleHttp\Client;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Carbon;

class GenreController extends Controller
{
    public function index()
    {
        $genres=Genres::paginate(10);
        return view('admin.genres.genres', [
            'danhmuc'=>$genres
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $genres=Genres::get();
        return view('admin.genres.create', [
            'danhmuc'=>$genres
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $genres = new Genres();
        $genres->name = $request->input('name');
        $genres->description = $request->description;
        $genres->created_at=Carbon::now();;
        $genres->save();

        return redirect()->route('genres-admin')->with('status', 'Them thanh cong');
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
    public function edit(string $slug)
    {
        $genre = Genres::where('slug', $slug)->first();
        // dd($genres);
        return view('admin.genres.update',compact('genre'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $slug)
    {
        $genres = Genres::where('slug', $slug)->first();
        $genres->name = $request->input('name');
        $genres->description = $request->description;
        $genres->updated_at=Carbon::now();;

        $genres->update();

    return redirect()->route('genres-admin')->with('status', 'Update thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $danhmuc=Genres::find($id);
        $danhmuc->delete();
        return redirect()->back()->with('success', 'Xoa thanh cong');
    }



    public function fetchGenres()
    {
        $client = new Client();
        $response = $client->request('GET', 'https://api.themoviedb.org/3/genre/movie/list', [
            'query' => [
                'api_key' => '222607975221da78368a51fde11198c5',
                'language' => 'vi-VN'
            ]
        ]);

        $data = json_decode($response->getBody()->getContents(), true);

        foreach ($data['genres'] as $genre) {
            Genres::updateOrCreate(

                [
                    'name' => $genre['name'],

                ]
            );
        }

        return response()->json(['message' => 'Genres fetched and stored successfully!']);
    }
    public function getCate() {
        $genre=Genres::with('movies')->get();
        return view('page.movie',[
            "genres"=>$genre
        ]);
    }

}
