<?php

// File: app/Http/Controllers/GenreController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;
use App\Models\Genres;
use GuzzleHttp\Client;
use Illuminate\Contracts\View\View;

class GenreController extends Controller
{
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
