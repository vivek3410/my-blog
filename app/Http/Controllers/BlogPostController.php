<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogPost;

class BlogPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = BlogPost::all();
        return view('blog.index',['posts'=>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $newPost = BlogPost::create([
            'title'=>$request->title,
            'body' => $request->body,
            'user_id' => 1,
        ]);
        
        return redirect('blog/'.$newPost->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(BlogPost $blogPost)
    {
        return view('blog.show',[
            'post'=>$blogPost,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BlogPost $blogPost)
    {
        return view('blog.edit',[
            'post'=> $blogPost,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BlogPost $blogPost)
    {
        $blogPost->update([
            'title'=>$request->title,
            'body'=>$request->body,
        ]);
        return redirect('blog/'.$blogPost->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BlogPost $blogPost)
    {   
        $blogPost->delete();

        return redirect('/blog');
    }
}