
@extends('PmsErp.layouts.PmsErp')
@section('title','List Users')
@section('content')

<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Users</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Users</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
<section class="content">
<div class="row">
<div class="col-md-3"></div>
<div class="col-md-6">

    <!-- Profile Image -->
    <div class="card card-primary card-outline">
      <div class="card-body box-profile">
        <div class="text-center">
          @if($user->profileimage!='')

              <img class="profile-user-img img-fluid img-circle"
              src="{{url('PmsErp/userProfile/',$user->profileimage)}}"
              alt="User profile picture">
          @else
          <img class="profile-user-img img-fluid img-circle"
               src="{{asset('PmsErp/img/user2.png')}}"
               alt="User profile picture">
               @endif
        </div>

        <h3 class="profile-username text-center">{{$user->name}}</h3>

        <p class="text-muted text-center">{{$user->title}}</p>

       <hr>
      
 <form action="{{ route('user.profile.update') }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
        <div class="form-group input-group mb-3" >
              
            <div class="input-group-prepend">
                <span class="input-group-text"> User Name</span>
            </div>
            <input type="text" name="name" value="{{ $user->name }}" class="form-control">               
        </div>

        <div class="form-group input-group mb-3" >
              
            <div class="input-group-prepend">
                <span class="input-group-text"> User Email</span>
            </div>
            <input type="email" name="email" value="{{ $user->email }}" class="form-control">             
        </div>
        <div class="form-group input-group mb-3" >
              
            <div class="input-group-prepend">
                <span class="input-group-text"> Password</span>
            </div>
            <input type="password" name="password" class="form-control">            
        </div>
        <div class="form-group input-group mb-3" >
              
            <div class="input-group-prepend">
                <span class="input-group-text"> Confirm Password</span>
            </div>
            <input type="password" name="confirmpassword" class="form-control">          
        </div>
        <div class="form-group input-group mb-3" >
              
          <div class="input-group-prepend">
              <span class="input-group-text"> Phone Number</span>
          </div>
          <input type="text" name="phone" value="{{ $user->phonenumber }}"  class="form-control">          
      </div>
        <div class="form-group{{$errors->has('profileimage')?' has-error':''}} input-group mb-3">
          <div class="input-group-prepend">
              <span class="input-group-text"> Profile Image :</span>
          </div>
          <input type="file" class="form-control" name="profileimage" id="profileimage"/>
          <span class="text-danger">{{$errors->first('profileimage')}}</span>
          @if($user->profileimage!='')
          &nbsp;&nbsp;
          <a href="javascript:" rel="{{$user->id}}" rel1="delete-profile" class="btn btn-danger btn-sm deleteRecord"><i class="fa fa-trash"></i> Old Image</a>
          &nbsp;&nbsp;<img src="{{url('Erp/books/profile/',$user->profileimage)}}" width="35" alt="">
      @endif
          <span class="text-danger">{{$errors->first('profileimage')}}</span>             
      </div>
      <div class="form-group input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> Facebook URL :</span>
                    </div>
                    <input type="url" class="form-control" value="{{ $user->facebook }}"  name="facebook" id="facebook">             
      </div>
      <div class="form-group input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text"> Linkedin URL  :</span>
        </div>
        <input type="url" class="form-control" value="{{ $user->linkedin }}" name="linkedin" id="linkedin">             
</div>
        <hr>  
        <div class="form-group text-center" >
           
            <button type="submit" class="btn btn-primary">Update Profile   </button>       
        </div>

  </form>
       
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->

  </div>
  <!-- /.col -->
<div class="col-md-3"></div>
</div>
</section>
@section('jsblock')
<script>
    $(".deleteRecord").click(function () {
     var id=$(this).attr('rel');
         var deleteFunction=$(this).attr('rel1');
        Swal.fire({
     title: 'Are you sure?',
     text: "You won't be able to revert this!",
     icon: 'warning',
     showCancelButton: true,
     confirmButtonColor: '#3085d6',
     cancelButtonColor: '#d33',
     confirmButtonText: 'Yes, delete it!'
   }).then(result => {
     if (result.value) {
       window.location.href="/"+deleteFunction+"/"+id;
     }
   });
 });
  </script>
  @endsection
@endsection
