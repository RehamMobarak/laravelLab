@extends('layouts.app')

@section('content')
<button type="button" class="btn">
  <a href="{{route('posts.create')}}" class="list-group-item list-group-item-action ">
    Create Post</a></button>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Slug</th>
      <th scope="col">Content</th>
      <th scope="col">Created By</th>
      <th scope="col">Created at</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach($posts as $index => $post)
    <tr>
      <th scope="row">{{$post['id']}}</th>
      <td>{{$post['title']}}</td>
      <td>{{$post['slug']}}</td>
      <td>{{$post['content']}}</td>
      <td>{{$post->user->name}}</td>
      <td>{{$post['created_at']}}</td>
      <td><a href="{{route('posts.show',['post' => $post['id'] ])}}" class="btn btn-info">View</a>
        <form action="{{route('posts.destroy',['post' => $post['id'] ])}}" method="post">
          <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
          @method("delete")
          @csrf
        </form>
        <a href="{{route('posts.edit',['post' => $post['id'] ])}}" class="btn btn-secondary">Edit</a>
      </td>
    </tr>
    @endforeach

  </tbody>
</table>
@endsection