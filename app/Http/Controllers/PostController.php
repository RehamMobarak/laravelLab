<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts=Post::paginate(2);
        
        return view('posts.index', ['posts' => $posts]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(StorePostRequest $request)
    {
        // $post = new Post;
        // $post->title = $request->title;
        // $post->content = $request->content;
        // $post->save();
        // $request->user()->id;
        $image=$request->file('image');
        $fileExtension = $image->getClientOriginalExtension();
        $fileName =$image->getClientOriginalName().".".$fileExtension;

        $image->move(public_path('images'), $fileName);

 

        Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' =>$request->user()->id,
            'image'=>$fileName,
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

    public function update(UpdatePostRequest $request, $id)
    {
        $image=$request->file('image');
        $fileExtension = $image->getClientOriginalExtension();
        $fileName =$image->getClientOriginalName().".".$fileExtension;

        $image->move(public_path('images'), $fileName);

        $post = Post::find($id);
        $post->title = $request->title;
        $post->content = $request->content;
        $post->image = $fileName;

        $post->update(['title'=>$request->title,
            'content'=>$request->content, 'image'=>$fileName]);
        return redirect()->route('posts.index');
    }
}
