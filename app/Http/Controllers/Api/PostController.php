<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;
use App\Post;
// use App\Http\Resources\PostResource;

class PostController extends Controller
{
    public function index()
    {
        return Post::all();
    }
    public function show($id)
    {
        return Post::find($id);
    }

}
