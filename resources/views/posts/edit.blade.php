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
    <form method="POST" enctype="multipart/form-data" action="/post/{{$post['id']}}">
        @csrf
        <div class="form-group">
          <label>Title</label>
          <input name="title" type="text" class="form-control" value="{{$post->title}}" >
        </div>
        <div class="form-group">
          <label>Content</label>
          <input name="content" type="text" class="form-control" value="{{$post->content}}" >
        </div>
        <div class="form-group row">
            <label for="photo" class="col-md-4 col-form-label text-md-right">{{ __('Your Image') }}</label>
            <img src="{{URL::to('/')}}/images/{{$post->image}}" class="img-thumbnail" width="75" >

            <div class="col-md-6">
                <input type="file" class="form-control @error('photo') is-invalid @enderror" name="image" required >
            </div>
        </div>
        </div>
     
        <button type="submit" class="btn btn-primary">Submit</button>
        @method('patch')
      </form>
@endsection