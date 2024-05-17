<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Seat;
use App\Models\Cinema;
use App\Models\Movie;
use App\Models\Showtime;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function confirm($showtimeId)
    {
        $selectedSeats = session('selectedSeats', []);

        $seats = Seat::whereIn('id', $selectedSeats)->get();

        $showtime = Showtime::with(['theater', 'movie'])->findOrFail($showtimeId);
        $Price = $seats->sum('price');
        $totalPrice=$Price+100;

        return view('page.confirm', compact('showtime', 'seats','totalPrice','Price'));
    }



    public function Datve(Request $request, $showtimeId)
    {
        $showtime = Showtime::findOrFail($showtimeId);
        $selectedSeats = session('selectedSeats', []);
        $userId = Auth::id();

        foreach ($selectedSeats as $seatId) {
            Booking::create([
                'showtime_id' => $showtimeId,
                'seat_id' => $seatId,
                'user_id' => $userId,
            ]);

            Seat::where('id', $seatId)->update(['status' => 0]);
        }

        // $request->session()->forget('selectedSeats');

        return redirect()->route('book.success', $showtimeId)->with('success', 'Seats successfully booked!');
    }
}
