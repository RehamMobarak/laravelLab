<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;
use App\Post;
use App\Http\Resources\PostResource;
use App\Http\Requests\StorePostRequest;


class PostController extends Controller
{
    public function index()
    {
        // return PostResource::collection(Post::all());
        $posts = Post::with('user')->get();
        return PostResource::collection($posts);

    }
    public function show($id)
    {
        $post= Post::find($id);
        return new PostResource($post);
    }
    public function store(StorePostRequest $request)
    {
        //  Allow for post update *or* create a new post
        $post        = $request->isMethod('put') ? Post::findOrFail($request->id) : new Post;
        $post->id    = $request->input('id');
        $post->title = $request->input('title');
        $post->content  = $request->input('content');
        $post->user_id=$request->user()->id;
        if ($post->save()) {
            return new PostResource($post);
        }

    }

       
}
