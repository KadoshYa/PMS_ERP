@extends('Erp.layouts.erp')

@section('content')

@include('admin.includes.errors')
<div class="row">
<div class="col-lg-3"></div>

<div class="col-lg-6">
 <div class="panel panel-default" style="border-radius:10px;margin-top:50px;border:2px solid #004a99;">
 
 <div class="panel-heading" style="padding-top:20px;">
 
  <h3 style="font-weight:bolder" class="text-center">Create New User<h3>
  <hr>
 
 </div>
 
 <div class="panel-body" class="text-center" style="padding-left:10%;padding-right:10%">
 
 <form action="{{ route('user.store') }}" method="post" >
 
 {{ csrf_field() }}
 
 <div class="form-group" >
 
 <label for="name" style="font-weight:bolder"><h5 >User</h5></label>

 <input type="text" name="name" class="form-control">

 </div>

 <div class="form-group">
 
 <label for="name"><h5>Email</h5></label>

 <input type="email" name="email" class="form-control">

 </div>


 <div class="form-group">

 <div class="text-center">
 
 <button class="btn btn-primary" type="submit">
 
 Add User 

 </button>

 </div>
 
 </div>

 </form>



 </div>
 
 </div>
 </div>

<div class="col-lg-3"></div>
</div>
@stop