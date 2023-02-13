@extends('layout')

@section('title','Create Post')

@section('content')  

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
      
  <div class="p-4 p-md-5 mb-4 text-white rounded bg-dark">
    <div class="col-md-12 px-0">
        <form action="{{route('post.create')}}" method="post">
            @csrf

            <div class="form-group">
                <label for="title" class="text-bold">Title</label>
                <input type="text" name="title" id="title" class="form-control" value="{{old('title')}}" placeholder="Write article title here.....">
                @error('title')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control" rows="12" placeholder="Write anything here....">{{old('description')}}</textarea>
                @error('description')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            @if (Auth::user()->is_premium_user)
                
            <div class="form-group">
                <label for="published_at_date" class="text-bold">Published At</label>
                <div class="row">
                    <div class="col-md-2">
                        <input type="date" class="form-control" name="published_at_date" id="published_at_date">
                        @error('published_at_date')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-2">
                        <input type="time" class="form-control" name="published_at_time"  id="published_at_time">
                        @error('published_at_time')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            
            </div>
            @endif

            <hr/>
            
            <div class="form-group py-2 d-flex justify-content-center">
                <input class="btn btn-primary" type="submit" value="Create Post" />
            </div>
        </form>
      
    </div>
  </div>



  @endsection