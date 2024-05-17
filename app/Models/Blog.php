<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Blog extends Model
{
    use HasFactory;
    use Sluggable;
    protected $fillable = ['title', 'abstract', 'depict','images', 'link', 'author', 'created_at', 'is_active', 'post_order', 'contents', 'updated_at', 'is_recent'];

    protected $table = "blogs";

    public function comments()
    {
        return $this->hasMany(Comment::class, 'blog_id', 'id');
    }
    public function Sluggable() : array {
        return [
            'link'=>
            [
                'source'=>'title'
            ]
        ];
    }
}
