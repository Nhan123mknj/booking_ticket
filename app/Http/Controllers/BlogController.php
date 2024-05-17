<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Comment;


class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function blog()
    {
        $blog = Blog::with('comments')->where('is_active', 1)->orderBy('post_order', 'desc')->get();
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
        $comment = Blog::with('comments')->where('link', $slug)->first();
        // dd($comment);
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
        $comment->phone = $request->input('phone');
        $comment->detail = $request->input('detail');
        $comment->email = $request->input('email');
        $comment->blog_id = $blogId;
        $comment->is_active = 1;

        $comment->save();

        return redirect()->back()->with('success', 'Comment added successfully!');
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
        //
    }
}
