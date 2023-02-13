@extends('layout')

@section('title','User Posts')

@section('content')  

<div class="form-group">
    <a href="{{route('post.create')}}" class="btn btn-primary">Create Post</a>
</div>

<?php if(Session::has('success')): ?> 
<div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <?php  echo session('success'); ?>
</div>
<?php  elseif(Session::has('error')): ?>
<div class="alert alert-danger alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <i class="fas fa-warning"></i>  <?php  echo session('error'); ?>
</div>
<?php endif; ?>

  <div class="row my-2">
    @foreach ($posts as $post)
    <div class="col-md-6">
      <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
          {{-- <strong class="d-inline-block mb-2 text-success">Design</strong> --}}
          <h3 class="mb-0">{{$post->title}}</h3>
          <div class="mb-1 text-muted">{{ $post->published_at}}
            @if ($post->published_at > date("Y-m-d H:i:s"))
              <span class="badge bg-success">Scheduled</span>
            @endif
          </div>
          <p class="mb-auto">{{$post->short_description}}</p>
          <a href="{{route('post.view', ['id'=>$post->id])}}" class="stretched-link">Continue reading</a>
        </div>
        <div class="col-auto d-none d-lg-block">
          <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>

        </div>
      </div>
    </div>
    @endforeach
  </div>



  @endsection