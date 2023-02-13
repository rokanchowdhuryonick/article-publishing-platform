@extends('layout')

@section('title','Upgrade/Downgrade Plan')

@section('content')  
  <div class="p-2">
    <h3>Upgrade/Downgrade</h3>
    <hr>
    Your current Plan is: <b>{{Auth::user()->subscription->plan->name}}</b>
    <br/> <br/>

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

<br/>

    <form action="{{route('subscription.change')}}" method="post">
        @csrf
        <div class="row">
            @foreach ($plans as $plan)
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h6>{{$plan->name}}</h6>
                        <input type="radio" name="subscription_plan_id" value="{{$plan->id}}" {{(Auth::user()->subscription->plan->id==$plan->id)?'checked':''}}>
                    </div>
                    <div class="card-body">
                        
                        <b>{{strtoupper($plan->currency)}} {{$plan->price}}/{{$plan->interval}}</b>
                    </div>
                </div>
            </div>
            
            @endforeach
        </div>
        <br/>
        <input type="submit" value="Upgrade/Downgrade" class="btn btn-info">
    </form>
    
    
  </div>



  @endsection