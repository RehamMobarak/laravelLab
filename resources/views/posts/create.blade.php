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

    <form method="POST" action="/posts" class=" col-6 m-5" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label>Title</label>
          <input name="title" type="text" class="form-control">
        </div>
        <div class="form-group">
          <label>Content</label>
          <input name="content" type="text" class="form-control" >
        </div>
        <div class="form-group row">
            <label for="photo" class="col-md-4 col-form-label text-md-right">{{ __('Your Image') }}</label>

            <div class="col-md-6">
                <input type="file" class="form-control @error('photo') is-invalid @enderror" name="image" required >
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
@endsection