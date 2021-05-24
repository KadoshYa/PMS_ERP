@extends('PmsErp.layouts.PmsErp')
@section('title','On Going Projects')
@section('content')

    <section class="content">

            <!--Start of Table-->
        <div class="col-md-12" style=" top: 20px; padding-right:20px; padding-left:20px; ">
            <div class="card">
                <div class="card-header">
                  <label class="card-title">On Going Projects</label>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-hover  table-bordered table-striped" >

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

                                    Mark As Complete

                                </th>

                            </thead>

                            <tbody>

                                    @if ($projects ->count() >0)

                                        @foreach ($projects as $project)

                                            <tr> 
                                                <td>
                                                <a href="{{ route ('project.showDetail', ['id' => $project->id ]) }}"> {{ $project->name }} </a>
                                                </td>
                                                <td>
                                                {{ $project->created_at->toFormattedDateString() }}
                                                </td>

                                                <td>
                                                    {{ Carbon\Carbon::parse($project->dueDate)->toFormattedDateString() }}
                                                </td>                    

                                                <td class="text-center">
                                                    <a href="{{ route ('project.complete', ['id' => $project->id ]) }}"><span class="fa fa-check-circle" style="color:green" title="Mark As Complete"></a> 
                                                </td>

                                            </tr>
                                
                                        @endforeach
                            
                                    @else 
                                                            
                                    <tr>
                                            <th colspan="5" class="text-center">No On Going Projects</th>
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

@section('jsblock')


<script>
  $(function () {
    $("#example1").DataTable({});
  });
</script>    

@endsection
