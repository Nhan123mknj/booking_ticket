<?php

namespace App\Http\Controllers;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class StatisticsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.dash');
    }

    public function bookingsByDateRange(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $bookingsByDateRange = Booking::selectRaw('DATE(booking_time) as date, COUNT(*) as count')
            ->whereBetween('booking_time', [$startDate, $endDate])
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->get();

        return response()->json($bookingsByDateRange);
    }
}
