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
      <th scope="col">Picture</th>
      <th scope="col">Enter Your Comment</th>
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
      <td><img src="{{URL::to('/')}}/images/{{$post['image']}}" class="img-thumbnail" width="75" >
         </td>
      <td>
        <form method="post" enctype="multipart/form-data" action="/posts/{{$post['id']}}">
          @csrf
          @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
          @endif
          <div class="form-group">
            <label for="body">Comment</label>
            <input name="body" type="text" class="form-control">
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </td>
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
{{ $posts->links() }}
@endsection