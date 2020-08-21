@extends('PmsErp.layouts.PmsErp')
@section('title','Admin Dashboard')
@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Admin Dashboard</h1>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>

<section class="content">
  {{-- ROW 1 --}}
  <div class="row">
  <div class="col-lg-3 col-12">

  @if(Auth::user()->admin)

    <!-- small box -->
    <div class="small-box bg-info">
      <div class="inner">
        <h3>{{$projects ->count()}} </h3>

        <p>All Projects </p>
      </div>
      <div class="icon" style="color:white">
        <i class="nav-icon fas fa-list-alt"></i>
      </div>
        <a href="{{ route('project.all') }}" class="small-box-footer">Show List  <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
    <!-- ./col -->

<div class="col-lg-3 col-12">
    <!-- small box -->
    <div class="small-box bg-warning">
      <div class="inner">
        <h3>{{$ongoingProjects}}</h3>
         <p>On Going Projects</p>
      </div>
      <div class="icon" style="color:white">
        <i class="fa fa-cog fa-spin fa-3x fa-fw"></i>
      </div>
      <a href="{{ route('project.ongoingList') }}" class="small-box-footer"> Show List  <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-12">
    <!-- small box -->
    <div class="small-box bg-success">
      <div class="inner">
        <h3>{{$completeProjects}}</h3>

        <p>Completed Projects</p>
      </div>
      <div class="icon" style="color:white">
        <i class="fa fa-check-circle"></i>
      </div>
      <a href="{{ route('project.completeList') }}" class="small-box-footer">Show List <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>

    <!-- ./col -->
    <div class="col-lg-3 col-12">
    <!-- small box -->
    <div class="small-box bg-danger">
      <div class="inner">
        <h3>{{$stuckProjects}}</h3>

        <p>Stuck Projects</p>
      </div>
      <div class="icon" style="color:white">
        <i class="fa fa-stop-circle"></i>
      </div>
      <a href="{{ route('project.stuckList') }}" class="small-box-footer">Show List  <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>

  @endif


  <!-- ./col -->
</div>

</section>
@endsection

