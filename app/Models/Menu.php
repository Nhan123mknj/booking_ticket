<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $table = "menu";
    public $timestamps = false;
    public function submenus()
    {
        return $this->hasMany(Menu::class, 'ParentId', 'id')->orderBy('MenuOrder');
    }
}