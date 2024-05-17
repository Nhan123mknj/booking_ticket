<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Blog;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blog=Blog::paginate(5);
        return view('admin.blog.blog', [
            'blog'=>$blog
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $blog = new Blog();
        $blog->title = $request->input('title');
        $blog->abstract = $request->input('abstract');
        $blog->author = $request->input('author');
        $blog->post_order = $request->input('post_order');
        $blog->contents = $request->contents;;
        $blog->is_recent = $request->is_recent;
        $blog->created_at=Carbon::now();;
        if($request->hasFile('images')){
            $file =$request->file('images');
            $extension = $file->getClientOriginalExtension();
            $fileName=time().'.'.$extension;
            $file->move('source/website/images/blog',$fileName);
            $blog->images =$fileName;
        }
        // dd( $blog->created_date);
        $blog->save();
        return redirect()->route('blog-admin')->with('status', 'Them thanh cong');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $blog = Blog::find($id);
        return view('admin.blog.update',compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $blog = Blog::find($id);
        $blog->title = $request->input('title');
        $blog->abstract = $request->input('abstract');
        $blog->author = $request->input('author');
        $blog->post_order = $request->input('post_order');
        $blog->contents = $request->contents;;
        $blog->is_recent = $request->is_recent;
        $blog->created_at=Carbon::now();;
        if($request->hasFile('images')){
            $anhcu='source/website/images/blog'.$blog->banner_url;
            if(File::exists($anhcu)){
                File::delete($anhcu);
            }
            $file =$request->file('images');
            $extension = $file->getClientOriginalExtension();
            $fileName=time().'.'.$extension;
            $file->move('source/website/images/blog',$fileName);
            $blog->images =$fileName;
        }
        $blog->update();

    return redirect()->route('blog-admin')->with('status', 'Update thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $blog=Blog::find($id);
        $blog->delete();
        return redirect()->back()->with('success', 'Xoa thanh cong');
    }
    public function active_toggle( $id)
    {
        $blog=Blog::find($id);
        if($blog->is_active){
            $blog->is_active =0;
        }else{
            $blog->is_active =1;
        }
        $blog->update();
        return back();
    }
    public function upload(Request $request)
    {
        if($request->hasFile('upload')){
            $originName =$request->file('upload')->getClientOriginalName();
            $fileName=pathinfo( $originName,PATHINFO_FILENAME);
            $extension=$request->file('upload')->getClientOriginalExtension();
            $fileName=$fileName.'_'.time().'.'.$extension;

            $request->file('upload')->move(public_path('media'),$fileName);

            $url=asset('media/'.$fileName);

            return response()->json(['fileName'=>$fileName,'uploaded'=>1,'url'=>$url]);
        }
    }
}
