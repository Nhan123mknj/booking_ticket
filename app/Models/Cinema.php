<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cinema extends Model
{
    use HasFactory;
    protected $table = "cinemas";

    protected static function booted()
    {
        parent::boot();
        static::deleting(function ($cinema) {
            $cinema->seats()->delete();
        });

        // static::created(function ($cinema) {

        //     for ($i = 1; $i <= 69; $i++) {
        //         $cinema->seats()->create([
        //             'number' => $i,
        //             'status' => 0,
        //             'price' => 100000,
        //         ]);
        //     }
        // });
    }

    public function showtimes()
    {
        return $this->hasMany(Showtime::class, 'cinema_id');
    }

    public function seats()
    {
        return $this->hasMany(Seat::class);
    }
    public function tinhThanh()
    {
        return $this->belongsTo(TinhThanh::class, 'ma_tinh_thanh','id');
    }
}
