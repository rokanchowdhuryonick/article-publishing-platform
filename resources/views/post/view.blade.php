@extends('layout')

@section('title','Home')

@section('content')  
  <div class="p-4 p-md-5 mb-4 text-white rounded bg-dark">
    <div class="col-md-12 px-0">
      <h1 class="display-5 fst-italic">{{$post->title}}</h1>
      <p class="blog-post-meta">{{$post->published_at}} by <a href="#">{{$post->user->name}}</a></p>
      <p class="lead my-3">{{$post->description}}</p>
      
      
    </div>
  </div>



  @endsection