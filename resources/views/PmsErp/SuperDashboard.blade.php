@extends('PmsErp.layouts.PmsErp')
@section('title','Super Admin Dashboard')
@section('content')
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Super Admin Dashboard</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <section class="content">
      <!-- <div class="row">
          @if(Auth::user()->admin==2)
          <div class="col-lg-3 col-12">
                      <div class="small-box bg-info">
                        <div class="inner">
                          <h3>{{$departments->find(1)->name}}</h3>
                          <p>Department</p>
                        </div>
                        <a href="/Admin_Dashboard" >
                            <div class="icon" style="color:white">
                              <i class="nav-icon fas fa-laptop"></i>
                            </div>
                          </a>
                      </div>
                </div>

                <div class="col-lg-3 col-12">
                  <div class="small-box bg-warning">
                      <div class="inner">
                        <h3>HR</h3>
                        <p>(Human Resources)</p>
                      </div>
                      <a href="/Admin_Dashboard" >
                      <div class="icon" style="color:white">
                        <i class="fas fa-user-friends"></i>
                      </div>
                    </a>
                  </div>
              </div>
                <div class="col-lg-3 col-12">
                  <div class="small-box bg-success">
                    <div class="inner">
                      <h3>{{$departments->find(3)->name}}</h3>

                      <p>Department</p>
                    </div>
                    <a href="/Admin_Dashboard" >
                    <div class="icon" style="color:white">
                      <i class="fa fa-dollar-sign"></i>
                    </div>
                   </a>
                  </div>
                </div>

                <div class="col-lg-3 col-12">
                    <div class="small-box" style="background-color:purple">
                      <div class="inner">
                        <h3>{{$departments->find(4)->name}}</h3>
                        <p>Department</p>
                      </div>
                      <a href="/Admin_Dashboard">
                      <div class="icon" style="color:white">
                        <i class="fa fa-bullhorn"></i>
                      </div>
                     </a>
                    </div>
                </div>
                <div class="col-lg-3 col-12">
                    <div class="small-box bg-danger">
                      <div class="inner">
                        <h3>CS</h3>
                        <p>Customer Service</p>
                        <a href="/Admin_Dashboard">
                        <div class="icon" style="color:white">
                        <i class="fa fa-headset"></i>
                      </div>
                     </a>
                      </div>
                      </a>
                    </div>
                </div>

            @endif

      </div> -->

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
         </div>

    </section>
@endsection

@section('jsblock')
<script src="{{ asset('PmsErp/asset/js/Chart.min.js') }}"></script>
<script src="{{ asset('PmsErp/asset/js/all-projects-chart.js') }}"></script>
<script src="{{ asset('PmsErp/asset/js/all-tasks-chart.js') }}"></script>
@endsection

