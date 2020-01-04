<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
class PostController extends Controller
{
    
    function index () 
    {
        return view('posts.index',[
            'posts' => Post::all()
        ]);
    }
    function create()
    {
        return view('posts.create');
    }

    function store()
    {
        $post = new Post;
        $post->title = request()->title;
        $post->content = request()->content;
        $post->save();      
        return redirect()->route('posts.index');
    }

    function show($id)
    {
        $post = Post::find($id);
        return view('posts.show',['post'=>$post]);
      
    }

    function destroy($id){
        $post = Post::find($id);
        $post->delete();
        return redirect()->route('posts.index');
    }

    function edit($id){
       $post = Post::find($id);
       return view('posts.edit',['post'=>$post]);
    }

    function update($id){
        $post = Post::find($id);
        $post->title = request()->title;
        $post->content = request()->content;
        $post->update(['title'=>request()->title,
        'content'=>request()->content]);
        return redirect()->route('posts.index');

    }
}
