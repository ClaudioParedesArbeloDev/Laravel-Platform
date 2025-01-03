<?php

namespace App\Http\Controllers;

use App\Models\Blog;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs= Blog::orderBy('created_at', 'desc')
            ->paginate(10);
        return view ('blog.blogs', compact('blogs'));
    }

    public function create()
    {
        return view ('blog.create');
    }

    public function store(Request $request)
    
    {
        $blog = new Blog();

        $blog->title=$request->title;
        $blog->category=$request->category;
        $blog->author=$request->author;
        $blog->anticipated=$request->anticipated;
        $blog->body=$request->body;
        $blog->image=$request->image;

        $blog->save();

        return redirect('/blogs');
    }

    public function show($id)
    
    {
        $blog = Blog::find($id);

        return view('blog.blog', compact('blog'));
    }

    public function edit($id)
    
    {
        $blog = Blog::find($id);

        return view('blog.editblog', compact('blog'));
    }

    public function update(Request $request, $id)
    {
        $blog = Blog::find($id);

        $blog->title=$request->title;
        $blog->category=$request->category;
        $blog->author=$request->author;
        $blog->body=$request->body;

        $blog->save();

        return redirect('/blogs/$id');
    }

    public function destroy($id)
    {
        $blog = Blog::find($id);

        $blog->delete();

        return redirect('/blogs');
    }
}
