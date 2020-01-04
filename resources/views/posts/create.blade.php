@extends('layouts.app')

@section('content')
    <h1>Create Post</h1>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <form method="POST" action="/posts" class=" col-6 m-5">
        @csrf
        <div class="form-group">
          <label>Title</label>
          <input name="title" type="text" class="form-control">
        </div>
        <div class="form-group">
          <label>Content</label>
          <input name="content" type="text" class="form-control" >
        </div>
     
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
@endsection