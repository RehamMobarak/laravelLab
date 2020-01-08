<?php

namespace App\Http\Controllers;
use App\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
class CommentController extends Controller
{
    public function store($postNo)
    {
        $comment = new Comment;
        $comment->body = request()->body;
        $comment->user_id = Auth::id();
        $comment->commentable_type= 'App\Post';
        $comment->commentable_id=$postNo;
        $comment->save();
       
        return redirect('posts');
    }
}

        // user_id, currently signed user.
    //    commentable_id:postNO,
    //    type is app\post