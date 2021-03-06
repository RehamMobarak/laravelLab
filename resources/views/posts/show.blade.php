@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-6 m-3">
    <div class="card">
      <div class="card-header">
        Post info
      </div>
      <div class="card-body">
        <p>
          <span class="font-weight-bold">Title:</span>
          <span class="card-text"> {{$post['title']}} </span>
        </p>
        <p>
          <span class="font-weight-bold">Content:</span>
          <span class="card-text"> {{$post['content']}}</span>
        </p>
        <p>
          <span class="font-weight-bold">Slug:</span>
          <span class="card-text"> {{$post['slug']}}</span>
        </p>
        <p>
          <span class="font-weight-bold">image:</span>
          <span class="card-text"> <img src="{{URL::to('/')}}/images/{{$post['image']}}" class="img-thumbnail" width="75" ></span>
        </p>
        <p>
          <span class="font-weight-bold">Comments:</span>
          <ul>
            @foreach($post->comments as $comment)
            <li>{{{$comment->user->name}}} : {{ $comment->body }}</li>
            @endforeach
          </ul>
        </p>

      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-6 m-3">
    <div class="card">
      <div class="card-header">
        Creator info
      </div>
      <div class="card-body">
        <p>
          <span class="font-weight-bold">Name:</span>
          <span class="card-text"> {{$post->user->name}} </span>
        </p>
        <p>
          <span class="font-weight-bold">Email:</span>
          <span class="card-text"> {{$post->user->email}}</span>
        </p>
        <p>
          <span class="font-weight-bold"> User Created at:</span>
          <span class="card-text">{{$post->user->created_at}}</span>
        </p>
      </div>
    </div>
  </div>
</div>
@endsection