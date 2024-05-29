<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slide;
use Illuminate\Support\Facades\File;
class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $slides =Slide::paginate(10);
        return view('admin.slide.slide',compact('slides'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.slide.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $slide = new Slide();
        $slide->Order_slide = $request->input('Order_slide');
        $slide->IsActive = $request->IsActive;
        if($request->hasFile('Image_Slide')){
            $file =$request->file('Image_Slide');
            $extension = $file->getClientOriginalExtension();
            $fileName=time().'.'.$extension;
            $file->move('source/website/images/slide',$fileName);
            $slide->Image_Slide =$fileName;
        }

        // dd( $slide->created_date);
        $slide->save();
        return redirect()->route('slide-admin')->with('status', 'Them thanh cong');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $slide=Slide::find($id);
        $imgslide='source/website/images/slide/'.$slide->Image_Slide;
        if(File::exists($imgslide)){
            File::delete($imgslide);
        }
        // dd( $imgslide);
        $slide->delete();
        return redirect()->back()->with('success', 'Xoa thanh cong');
    }

}
