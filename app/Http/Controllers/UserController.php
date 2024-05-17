<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function login()
    {
        return view('page.login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function register()
    {

        return view('page.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function postregister(Request $request)
    {
        $request->merge(['password'=>Hash::make($request->password)]);
        User::create($request->all());
        return redirect()->route('dang-nhap');
    }

    public function postlogin(Request $request)
    {

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {

            if (Auth::user()->is_locked == 1) {
                return back()->withErrors([
                    'email' => 'Tài khoản của bạn đã bị khóa.'
                ])->onlyInput('email');
            } elseif (Auth::user()->is_actived == 0) {
                return back()->withErrors([
                    'email' => 'Tài khoản của bạn chưa được kích hoạt.'
                ])->onlyInput('email');
            } else {
                $request->session()->regenerate();
                return redirect()->route('trang-chu');
            }
        } else {
            return back()->withErrors([
                'email' => 'Email hoặc mật khẩu không chính xác.'
            ])->onlyInput('email');
        }

    }
    public function logout(Request $request)
    {

        Auth::logout();
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->back();

    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}