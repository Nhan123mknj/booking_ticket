<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "comments";
    protected $primaryKey = 'comment_id';
    protected $fillable = ['comment_id','name', 'email', 'detail', 'created_date','is_active'];
    public function blog()
    {
        return $this->belongsTo(Blog::class, 'blog_id', 'id');
    }
}
