<?php

namespace App\Http\Controllers;

use App\Models\Cinema;
use App\Models\Seat;
use App\Models\TinhThanh;
use Illuminate\Http\Request;


class CinemaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cinemas = Cinema::with('tinhThanh')->paginate(10);
        return view('admin.cinemas.cinema', [
            "cinema"=>$cinemas,

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cinema = Cinema::with('tinhThanh')->get();
        $tinhthanh = TinhThanh::get();
        return view('admin.cinemas.create', [
            'cinema'=>$cinema,
            'tinhthanh'=>$tinhthanh
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $cinemaId = $request->cinema;

        $existingCinema = Cinema::where('id', $cinemaId)->first();

        if ($existingCinema) {
            return redirect()->back()->with('error', 'Rạp đã tồn tại.');
        } else {
            $cinema = new Cinema();
            $cinema->name = $request->name;
            $cinema->ma_tinh_thanh = $request->tinhthanh;
            $cinema->location = $request->location;
            $cinema->save();

            $cinemaId = $cinema->id;


            for ($i = 1; $i <= 69; $i++) {
                $seat = new Seat();
                $seat->number = $i;
                $seat->status = 0;
                $seat->price = 100000;
                $seat->cinema_id = $cinemaId;
                $seat->save();
            }

            return redirect()->route('cinema-admin')->with('status', 'Thêm rạp thành công.');
        }
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
        $cinema = Cinema::with('tinhThanh')->where('id',$id)->first();
        $tinhthanh = TinhThanh::get();
        // dd($cinema->name);
        return view('admin.cinemas.update', [
            'cinema'=>$cinema,
            'tinhthanh'=>$tinhthanh
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $cinemaId = $request->cinema;

        $existingcinema = Cinema::where('id', $cinemaId)
                            ->first();

        if ($existingcinema) {
            return redirect()->back()->with('error', 'Rạp đã tồn tại.');
        } else {

            $cinema = Cinema::find($id);
            $cinema->name = $request->name;
            $cinema->ma_tinh_thanh = $request->tinhthanh;
            $cinema->location = $request->location;
            $cinema->update();

            return redirect()->route('cinema-admin')->with('status', 'Thêm ghế thành công.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cinema=Cinema::find($id);
        $cinema->delete();
        return redirect()->back()->with('success', 'Xoa thanh cong');
    }
}
