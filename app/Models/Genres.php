<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Genres extends Model
{
    use HasFactory;

    use Sluggable;
    protected $table = "genres";
    public $timestamps = false;
    protected $fillable = ['name','description','slug'];

    public function movies() {
        return $this->belongsToMany(Movie::class, 'movie_genre'); // Chỉ rõ tên bảng trung gian
    }
    public function Sluggable() : array {
        return [
            'slug'=>
            [
                'source'=>'name'
            ]
        ];
    }
}
