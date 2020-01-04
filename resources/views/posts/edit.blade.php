@extends('layouts.app')

@section('content')
    <h1>Create Post</h1>
    <form method="POST" action="/post/{{$post['id']}}">
        @csrf
        <div class="form-group">
          <label>Title</label>
          <input name="title" type="text" class="form-control" value="{{$post->title}}" >
        </div>
        <div class="form-group">
          <label>Content</label>
          <input name="content" type="text" class="form-control" value="{{$post->content}}" >
        </div>
     
        <button type="submit" class="btn btn-primary">Submit</button>
        @method('patch')
      </form>
@endsection