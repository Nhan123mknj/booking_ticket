<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genres extends Model
{
    use HasFactory;
    protected $table = "genres";
    public $timestamps = false;
    protected $fillable = ['name'];

    public function movies() {
        return $this->belongsToMany(Movie::class, 'movie_genre'); // Chỉ rõ tên bảng trung gian
    }
}
