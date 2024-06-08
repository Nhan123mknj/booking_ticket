<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;


class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function blog()
    {
        $blog = Blog::with('comments')->where('is_active', 1)->orderBy('post_order', 'desc')->paginate(3);
        $recent = Blog::where('is_active',1)->where('is_recent',1)->get();
        return view('page.blog', [
            'blogs'=>$blog,
            'recents'=>$recent
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function detail_blog($slug)
    {

        $detail=Blog::where('link',$slug)->first();
        $recent = Blog::where('is_active',1)->where('is_recent',1)->get();
        $comment = Blog::with(['comments' => function ($query) {
            $query->where('is_active', 1);
        }])->where('link', $slug)->first();
        // dd($comment->comments->count());
        return view('page.detail_blog', [
            'detail'=>$detail,
            'recents'=>$recent,
            'comments' => $comment
        ]);
    }




    /**
     * Display the specified resource.
     */
    public function postComment(Request $request, $blogId) {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);

        $comment = new Comment();
        $comment->name = $request->input('name');
        // $comment->phone = $request->input('phone');
        $comment->detail = $request->input('detail');
        $comment->email = $request->input('email');
        $comment->blog_id = $blogId;
        $comment->is_active = 1;

        $comment->save();

        return redirect()->back()->with('success', 'Bình luận thành công');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function index()
    {
        $blog=Blog::with('comments')->paginate(5);
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
        $blog=Blog::with('comments')->where('id',$id)->first();
        return view('admin.blog.detail',compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($link)
    {
        $blog = Blog::where('link', $link)->first();
        return view('admin.blog.update',compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $link)
    {
        $blog = Blog::where('link', $link)->first();
        $blog->title = $request->input('title');
        $blog->abstract = $request->input('abstract');
        $blog->author = $request->input('author');
        $blog->post_order = $request->input('post_order');
        $blog->contents = $request->contents;;
        $blog->is_recent = $request->is_recent;
        $blog->updated_at=Carbon::now();;
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
        $imgblog='source/website/images/slide/'.$blog->images;
        if(File::exists($imgblog)){
            File::delete($imgblog);
        }
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
    public function search_admin_blog(Request $request)
{
    $keyword = $request->input('keyword_submit');
    $blog_search = Blog::with('comments')->where('is_active', 1)->orderBy('post_order', 'desc')->where('title','like','%'.$keyword.'%')->paginate(5);
    // dd($movie_search);

    return view('admin.blog.blog_search', [
        'blog'=>$blog_search,

    ]);
}
    public function commentsByBlog($id){

        $comments = Comment::with('blog')
                       ->where('blog_id', $id)
                       ->paginate(10);
                    //    dd($comments);
        return view('admin.blog.comment', [
            'comments'=>$comments,

        ]);
    }
    public function active_toggle_comment( $id)
    {
        $comment=Comment::where('comment_id',$id)->first();
        if($comment->is_active){
            $comment->is_active = 0;
        }else{
            $comment->is_active = 1;
        }
        $comment->update();
        return back();
    }

    public function destroy_comment(string $id)
    {
        $comment=Comment::where('comment_id',$id)->first();

        $comment->delete();
        return redirect()->back()->with('success', 'Xóa thành công');
    }
}
