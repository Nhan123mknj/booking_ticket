<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Genres;
use App\Models\Movie;
use App\Models\Status;
use Illuminate\Support\Facades\File;

class MovieController extends Controller
{

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
}
