<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;
    protected $table = "movies";
    protected $fillable = ['title', 'duration', 'director', 'description', 'release_date', 'trailer_url','banner_url', 'status'];

    public function showtimes()
    {
        return $this->hasMany(Showtime::class);
    }

    public function genres() {
        return $this->belongsToMany(Genres::class, 'movie_genre'); // Chỉ rõ tên bảng trung gian
    }
}
