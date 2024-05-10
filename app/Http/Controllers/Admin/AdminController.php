<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    function getIndex(){
        return view('admin.admin_login');
    }
    function getHome(){
        return view('admin.dash');
    }
}
