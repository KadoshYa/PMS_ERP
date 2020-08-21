@extends('pmsErp.layouts.PmsErp')
@section('title','Projects')
@section('content')

    <section class="content">

        <div class="row">

            <div class="col-md-12" style=" top: 20px; padding-right:20px; padding-left:20px; ">
                <div class="card" >
                        <!-- Card-header -->
                        <div class="card-header">
                            <label class="card-title"> All Projects</label>
                        </div>
                            <!-- /.card-header -->

                            <!-- Card-Body -->
                    <div class="card-body">

                            <!-- Table-Start -->
                            <div class="table-responsive" >
                                <table id="example1" class="table table-hover table-bordered table-striped ">

                                    <thead>

                                        <th >
                                            Project Name
                                        </th>

                                        <th >
                                            Created On
                                        </th>

                                        <th >

                                            Status

                                        </th>

                                        <th >
                                            Actions
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
                                                        @if(str_is("$project->status","ongoing"))

                                                            On Going <span class="fa fa-cog" title="On Going"> 

                                                        @elseif(str_is("$project->status","stuck"))

                                                            Stuck <span class="fa fa-stop-circle" style="color:red" title="Stuck">

                                                    @elseif(str_is("$project->status","complete"))

                                                            Completed <span class="fa fa-check-circle" style="color:blue"  title="Complete">
                                                            
                                                        @endif
                                                    </td>

                                                    <td>
                                                    <a href="{{ route ('project.edit', ['id' => $project->id ]) }}"><span class="fa fa-edit" title="Edit Project"></a>
                                                    <a href="{{ route ('project.trash', ['id' => $project->id ]) }}"><span class="fa fa-trash" style="color:red" title="Trash Project"></a>
                                                    <a href="{{ route ('project.complete', ['id' => $project->id ]) }}"><span class="fa fa-check-circle" style="color:blue" title="Mark As Complete"></a> 
                                                    </td>

                                                </tr>
                                        
                                            @endforeach
                                    
                                        @else 
                                                                    
                                                <tr>
                                                    <th colspan="5" class="text-center">No Projects Yet</th>
                                                </tr>
                                                
                                        @endif

                                    </tbody>

                                </table>
                            <!-- Table-End -->
                            </div>

                    </div>
                            <!--Card-Body- End -->
                </div>
            </div>
        
        </div>

    </section>

 
@endsection

