<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use PHPUnit\Metadata\Uses;
use Illuminate\Support\Facades\File;
use Hash;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::paginate(5);
        return view('admin.user.user', [
            'user'=>$user
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $create = User::get();
        return view('admin.user.create', [
            'creates'=>$create,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->merge(['password'=>Hash::make($request->password)]);
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        if($request->hasFile('images')){
            $file =$request->file('images');
            $extension = $file->getClientOriginalExtension();
            $fileName=time().'.'.$extension;
            $file->move('source/website/images',$fileName);
            $user->images =$fileName;
        }
        $user->save();
        return redirect()->route('user-admin')->with('status', 'Them thanh cong');
    }

    public function toggleLock($id)
    {
        $user=User::find($id);
        if($user->is_locked){
            $user->is_locked =0;
        }else{
            $user->is_locked =1;
        }
        $user->save();
        return back();
    }

    public function enable_user($id)
    {
        $user=User::find($id);
        if($user->is_actived){
            $user->is_actived =0;
        }else{
            $user->is_actived =1;
        }
        $user->update();
        return back();
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
        $user = User::find($id);
        return view('admin.user.update',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $user = User::where('id', $id)->first();
        $user->name = $request->input('name');
        $user->password = $request->input('password');
        $user->role = $request->input('role');
        $user->phone = $request->input('phone');
        if($request->hasFile('images')){
            $file =$request->file('images');
            $extension = $file->getClientOriginalExtension();
            $fileName=time().'.'.$extension;
            $file->move('source/website/images',$fileName);
            $user->images =$fileName;
        }
        $user->update();
        // dd($request->all());
        return redirect()->route('user-admin')->with('status', 'Them thanh cong');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user=User::find($id);
        $user->delete();
        return redirect()->back()->with('success', 'Xoa thanh cong');
    }
}
