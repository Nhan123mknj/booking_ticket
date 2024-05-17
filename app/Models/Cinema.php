<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cinema extends Model
{
    use HasFactory;
    protected $table = "cinemas";
    public function showtimes()
    {
        return $this->hasMany(Showtime::class, 'cinema_id');
    }

    public function seats()
    {
        return $this->hasMany(Seat::class);
    }
}
