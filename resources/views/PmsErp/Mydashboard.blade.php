@extends('PmsErp.layouts.PmsErp')
@section('title','My Dashboard')
@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">My Dashboard</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">My Dashboard</li>
        </ol>
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
        <h3>500</h3>

        <p>All Projects </p>
      </div>
      <div class="icon" style="color:white">
        <i class="fa fa-book"></i>
      </div>
      <a href="#" class="small-box-footer">Detail <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
    <!-- ./col -->
<div class="col-lg-3 col-12">
    <!-- small box -->
    <div class="small-box bg-warning">
      <div class="inner">
        <h3>44</h3>

        <p>On Going Projects</p>
      </div>
      <div class="icon" style="color:white">
        <i class="fa fa-cog fa-spin fa-3x fa-fw"></i>
      </div>
      <a href="#" class="small-box-footer"> Detail <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-12">
    <!-- small box -->
    <div class="small-box bg-success">
      <div class="inner">
        <h3>150</h3>

        <p>Completed Projects</p>
      </div>
      <div class="icon" style="color:white">
        <i class="fa fa-check-circle"></i>
      </div>
      <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>

    <!-- ./col -->
    <div class="col-lg-3 col-12">
    <!-- small box -->
    <div class="small-box bg-danger">
      <div class="inner">
        <h3>150</h3>

        <p>Stuck Projects</p>
      </div>
      <div class="icon" style="color:white">
        <i class="fa fa-stop-circle"></i>
      </div>
      <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>

  @endif


  <!-- ./col -->
</div>

</section>
@endsection

