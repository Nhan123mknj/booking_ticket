<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $table = "bookings";
    public $timestamps = false;
    protected $fillable = [

        'showtime_id',
        'seat_id',
        'status',
        'booking_time',
        'qr_code_path',
        'email',
        'user_name'

    ];


    public function showtime()
    {
        return $this->belongsTo(Showtime::class);
    }

    public function seat()
    {
        return $this->belongsTo(Seat::class);
    }
}
