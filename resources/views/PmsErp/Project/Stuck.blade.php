@extends('pmsErp.layouts.PmsErp')
@section('title','Stuck Projects')
@section('content')

    <section class="content">

                <!--Start of Table-->
      <div class="col-md-12" style=" top: 20px; padding-right:20px; padding-left:20px; ">
        
          <div class="card">
              <div class="card-header">
                  <h3 class="card-title">Stuck Projects</h3>
              </div>
                        <!-- /.card-header -->
                <div class="card-body">
                  <div class="table-responsive">


                    <table id="example1" class="table table-hover table-striped" >

                        <thead>

                            <th>

                                Project Name

                            </th>

                            <th>

                                Created On

                            </th>

                            <th>

                                Due Date

                            </th>

                            <th>

                                Reason

                            </th>

                        </thead>

                        <tbody>

                          @if ($projects ->count() >0)

                              @foreach ($projects as $project)

                                  <tr> 
                                      <td>
                                        <a href="{{ route ('project.tasks', ['id' => $project->id ]) }}"> {{ $project->name }} </a>
                                      </td>
                                      <td>
                                        {{ $project->created_at->toFormattedDateString() }}
                                      </td>

                                      <td>
                                        {{ Carbon\Carbon::parse($project->dueDate)->toFormattedDateString() }}
                                      </td>

                                      <td>
                                        some reason
                                      </td>

                                  </tr>
                            
                              @endforeach
                        
                            @else 
                                                        
                                  <tr>
                                        <th colspan="5" class="text-center">No stuck Projects</th>
                                    </tr>
                                    
                          @endif

                        </tbody>

                    </table>
                  </div>
              </div>
          </div>
      </div>


    </section>

@endsection

