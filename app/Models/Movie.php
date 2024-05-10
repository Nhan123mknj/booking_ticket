<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
class Movie extends Model
{
    use HasFactory;

    use Sluggable;
    protected $table = "movies";
    protected $fillable = ['title', 'duration', 'director', 'description', 'release_date', 'trailer_url','banner_url', 'status_id'];

    public function showtimes()
    {
        return $this->hasMany(Showtime::class);
    }

    public function genres() {
        return $this->belongsToMany(Genres::class, 'movie_genre');
    }

    public function Sluggable() : array {
        return [
            'slug'=>
            [
                'source'=>'title'
            ]
        ];
    }
}
