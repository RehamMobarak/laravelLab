@extends('layouts.app')

@section('content')
<button type="button" class="btn btn-success">
<a href="/posts/create">
Create Post</a></button>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Content</th>
            <th scope="col">Created at</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
        @foreach($posts as $index => $value)  
        <tr>
        <th scope="row">{{$value['id']}}</th>
            <td>{{$value['title']}}</td>
            <td>{{$value['content']}}</td>
            <td>{{$value['created_at']}}</td>
            <td><a href="{{route('posts.show',['post' => $value['id'] ])}}">View  </a>
            <form action="{{route('posts.destroy',['post' => $value['id'] ])}}" method="post">
              <button type="submit">delete </button>
            @method("delete")
            @csrf
            </form>
            <a href="{{route('posts.edit',['post' => $value['id'] ])}}">edit</a>
            </td>
          </tr>
          @endforeach

        </tbody>
      </table>
@endsection