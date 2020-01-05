@extends('layouts.app')

@section('content')
<!-- <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Content</th>
            <th scope="col">Created at</th>
          </tr>
        </thead>
        <tbody>
         
        <tr>
        <th scope="row">{{$post['id']}}</th>
            <td>{{$post['title']}}</td>
            <td>{{$post['content']}}</td>
            <td>{{$post['created_at']}}</td>
            </td>
          </tr>
        </tbody>
      </table> -->



<div class="row">
  <div class="col-sm-6 m-3">
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
      </div>
    </div>
  </div>
  @endsection