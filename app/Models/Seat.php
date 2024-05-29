<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    use HasFactory;
    protected $table = "seats";
    public $timestamps = false;
    protected $fillable = ['name', 'cinema_id', 'number', 'status', 'price'];
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
    public function cinema()
    {
        return $this->belongsTo(Cinema::class);
    }
}
