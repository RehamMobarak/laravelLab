<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

use App\Http\Requests\StorePostRequest;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index', [
            'posts' => Post::all()
        ]);
    }
    public function create()
    {
        return view('posts.create');
    }

    public function store(StorePostRequest $request)
    {
        $post = new Post;
        // $post->title = $request->title;
        // $post->content = $request->content;
        // $post->save();
        Post::create([
            'title' => $request->title,
            'content' => $request->content
        ]);

        return redirect()->route('posts.index');
    }

    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show', ['post'=>$post]);
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->route('posts.index');
    }

    public function edit($id)
    {
        $post = Post::find($id);
        return view('posts.edit', ['post'=>$post]);
    }

    public function update($id)
    {
        $post = Post::find($id);
        $post->title = request()->title;
        $post->content = request()->content;
        $post->update(['title'=>request()->title,
        'content'=>request()->content]);
        return redirect()->route('posts.index');
    }
}
