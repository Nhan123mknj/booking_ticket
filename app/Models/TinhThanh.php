<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TinhThanh extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "tinh_thanh";
    protected $fillable = ['ten_tinh'];
}
