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

    public function index_admin()
    {
        $seats = Seat::paginate(20);
        $cinemas = Cinema::all();
        return view('admin.seats.seat', compact('seats','cinemas'));
    }

    public function SeatByCinema($id)
    {
        $cinema = Cinema::find($id);
        $cinemas = Cinema::all();
        $seats = $cinema->seats()->paginate(20);


        return view('admin.seats.seat_by_cine', compact('seats', 'cinema','cinemas'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cinemas = Cinema::all();

        return view('admin.seats.create',compact('cinemas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Lấy dữ liệu từ request
    $cinemaId = $request->cinema;
    $seatNumber = $request->input('name');

    $existingSeat = Seat::where('cinema_id', $cinemaId)
                        ->where('number', $seatNumber)
                        ->first();

    if ($existingSeat) {
        return redirect()->back()->with('error', 'Tên ghế đã tồn tại trong rạp này.');
    } else {

        $seat = new Seat();
        $seat->number = $seatNumber;
        $seat->status = $request->status;
        $seat->cinema_id = $cinemaId;
        $seat->save();

        return redirect()->route('seat-admin')->with('status', 'Thêm ghế thành công.');
    }
}

    public function edit(string $id)
    {
        $seat = Seat::find($id);
        return view('admin.seats.update',compact('seat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $cinemaId = $request->cinema;
        $seatNumber = $request->input('name');

        $existingSeat = Seat::where('cinema_id', $cinemaId)
                            ->where('number', $seatNumber)
                            ->first();

        if ($existingSeat) {
            return redirect()->back()->with('error', 'Tên ghế đã tồn tại trong rạp này.');
        } else {

            $seat = Seat::find($id);
            $seat->number = $seatNumber;
            $seat->status = $request->status;
            $seat->cinema_id = $cinemaId;
            $seat->update();

            return redirect()->route('seat-admin')->with('status', 'Thêm ghế thành công.');
        }
    }


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
        $seat=Seat::find($id);
        $seat->delete();
        return redirect()->back()->with('success', 'Xoa thanh cong');
    }
}
