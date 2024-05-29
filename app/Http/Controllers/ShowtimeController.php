<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Showtime;
use App\Models\Movie;
use App\Models\Cinema;
class ShowtimeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function showShowtimes($movieId)
    {
        $movie = Movie::findOrFail($movieId);
        $showtimes = Showtime::where('movie_id', $movieId)
                             ->with('theater')
                             ->paginate(10); // Adjust the number of showtimes per page as needed
        // dd($showtimes);
        return view('admin.showtime.showtime', [
            'movie' => $movie,
            'showtimes' => $showtimes
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($movieId)
    {
        $movie = Movie::findOrFail($movieId);
        $cinema= Cinema::all();
        // dd($cinema);
        return view('admin.showtime.create', [
            'movie' => $movie,
            'cinema' => $cinema
         ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,$movieId)
    {
        $movie = Movie::findOrFail($movieId);


        $validatedData = $request->validate([
            'cinema' => 'required|exists:cinemas,id',
            'Date_show' => 'required',
            'Time_show' => 'required'
        ]);


        $overlap = Showtime::where('cinema_id', $validatedData['cinema'])
            ->where('Date_show', $validatedData['Date_show'])
            ->where('Time_show', $validatedData['Time_show'])
            ->exists();

        if ($overlap) {
            return redirect()->back()->withErrors(['error' => 'Lịch chiếu này đã tồn tại tại rạp này, ngày này và thời gian này.']);
        }

        $showtime = new Showtime();
        $showtime->movie_id = $movie->id;
        $showtime->cinema_id = $request->cinema;
        $showtime->Date_show = $request->Date_show;
        $showtime->Time_show = $request->Time_show;
        // dd($request->all());
        $showtime->save();
        return redirect()->route('showtime-admin',['movieId'=>$movie->id])->with('status', 'Thêm lịch thành công.');
    }

    /**
     * Display the specified resource.
     */
    public function showtimeByMovie($slug)
{

    $movie = Movie::where('slug', $slug)
            ->with('genres')
            ->with(['showtimes' => function ($query) {
                $query->with('theater');
            }])
            ->first();

    return view('page.booking', [
        'movie' => $movie,
        'showtimes' => $movie->showtimes,
    ]);
}



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $showtime = Showtime::findOrFail($id);
        $cinema= Cinema::all();
        // dd($showtime);
        return view('admin.showtime.update', [
            'showtime' => $showtime,
            'cinema' => $cinema
         ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function updated(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'cinema' => 'required|exists:cinemas,id',
            'Date_show' => 'required',
            'Time_show' => 'required'
        ]);


        $showtime = Showtime::findOrFail($id);


        $showtime->cinema_id = $validatedData['cinema'];
        $showtime->Date_show = $validatedData['Date_show'];
        $showtime->Time_show = $validatedData['Time_show'];


        $showtime->save();

       
        return redirect()->route('showtime-admin', ['movieId' => $showtime->movie_id])
                         ->with('status', 'Cập nhật lịch chiếu thành công.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $showtime=Showtime::findOrFail($id);
        $showtime->delete();

        return redirect()->back()->with('status', 'Xóa lịch chiếu thành công.');
    }
}
