<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Seat;
use App\Models\Cinema;
use App\Models\Movie;
use App\Models\Showtime;
use App\Models\Booking;
class SeatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($showtimeId)
    {
        $showtime = Showtime::with(['theater.seats', 'movie'])->findOrFail($showtimeId);

        return view('page.seat_booking', compact('showtime'));

    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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


    /**
     * Update the specified resource in storage.
     */
    public function selectSeats(Request $request, $showtimeId)
    {
        $showtime = Showtime::findOrFail($showtimeId);
        $selectedSeats = $request->input('seat', []);

        $request->session()->put('selectedSeats', $selectedSeats);

        return redirect()->route('book.confirm', $showtimeId);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
