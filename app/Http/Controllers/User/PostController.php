<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::orderBy('updated_at', 'DESC')->paginate(2);

        return view('blog.index',compact('posts'));
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
        $request->validate([
            'title'=> 'required',
            'content'=>'required',
            'image'=> 'required | mimes:jpg,png,jpeg | max:5048',

        ]);

        $newImageName = uniqid() . '-'. $request->title . '.' ;
        $request->image->extension();
        $request->image->move(public_path('images'), $newImageName);

        Post::create([
            'title'=> $request->input('title'),
            'content'=> $request->input('content'),
            'image' => $newImageName,
            'user_id' => auth()->user()->id
        ]);

        return redirect('/blog')
                ->with('message', 'Your blog post have been created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $post = Post::where('slug', $slug)
            ->with('user:id,name', 'comments.replies', 'user:id,name',
                'comments.user:id,name','comments.replies.user:id,name')
            ->first();

           

        return view('blog.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
        $post = Post::where('slug', $slug)->first();

        return view('blog.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $slug)
    {
        $request->validate([
            'title'=> 'required',
            'content'=>'required',
            // 'image'=> 'required | mimes:jpg,png,jpeg | max:5048',

        ]);

        Post::where('slug', $slug)
            ->update([
            'title'=> $request->input('title'),
            // 'slug' => generateSlug(),
            'content'=> $request->input('content'),
            // 'image' => $newImageName,
            'user_id' => auth()->user()->id
        ]);

        return redirect('/blog')
        ->with('message', 'Your blog post has ben updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug)
    {
        $post = Post::where('slug', $slug)->first();

        $post->delete();

        return redirect('/blog')
                ->with('message', 'Your blog post have been deleted!');
    }
}
