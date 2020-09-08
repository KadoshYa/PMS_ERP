
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
        <div class="row">
            @if(Auth::user()->admin)

            <div class="col-lg-3 col-12">
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

        </div>

        <div class="container">
                  <div class="card shadow mb-4">
                      <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">All Projects</h6>
                      </div>
                        <!-- Area Chart Example-->
                        <div class="card mb-3">
                        <div class="card-body">
                            <canvas id="myAreaChart" width="100%" height="40"></canvas>
                        </div>
                    </div>
                </div>

              <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">All Tasks</h6>
                    </div>
                    <div class="container">
                    <!-- Area Chart Example-->
                    <div class="card mb-3">
                    <div class="card-body"> 
                        <canvas id="myAreaChart_Tasks" width="100%" height="40"></canvas>
                    </div>
                  </div>
              </div>

            <div>
                <div class="card mx-auto"   style="
                  padding-left: 5%;
                  padding-right: 5%;
                  padding-top: 40px;
                  top: 20px;
                  "> 
                  </div>
            </div>
        </div>
    </section>
@endsection

@section('jsblock')
<script src="{{ asset('PmsErp/asset/js/Chart.min.js') }}"></script>
<script src="{{ asset('PmsErp/asset/js/all-projects-chart.js') }}"></script>
<script src="{{ asset('PmsErp/asset/js/all-tasks-chart.js') }}"></script>
@endsection

