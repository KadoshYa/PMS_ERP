@extends('PmsErp.layouts.PmsErp')
@section('title','Dashboard')
@section('content')

<section class="content">

    <div class="row">

        <!--Start of Table-->
        <div class="col-md-12" style=" top: 20px; padding-right:20px; padding-left:20px; ">
        
            <div class="card">
                <div class="card-header">
                <label class="card-title">My Tasks</label>
                </div>
                <!-- /.card-header -->
                <div class="card-body">

                <div class="table-responsive">
                <table id="example1" class="table table-hover  table-bordered table-striped" >
                    <thead>

                            <th>

                                Task Name

                            </th>
                            
                            @if(Auth::user()->admin)

                                <th>

                                    Created On

                                </th>

                                @else
                                <th>

                                    Due Date
                                </th>

                            @endif

                            <th>

                                Status

                            </th>


                            <th >

                                Actions

                            </th>



                    </thead>

                    <tbody>
                            @if($tasks ->count() >0)

                                @foreach ($tasks as $task)

                            <tr> 
                                    <td>
                                        <a href="{{ route ('task.showDetail', ['id' => $task->id ]) }}"> {{ $task->task_name }} </a>
                                    </td>

                                    @if(Auth::user()->admin)

                                        <td>
                                            {{ $task->created_at->toFormattedDateString() }}
                                        </td>
                                    @else

                                        <?php
                                              $task = App\Task::find($task->id);
                                              $date = $task->due_date;
                                              $createDate = new DateTime($date);
                                              $stripDate = $createDate->format('m-d-Y');

                                        ?>

                                        <td>

                                        {{ $stripDate}}
                                        </td>
                                    @endif

                                    <td>
                                        @if(str_is("$task->status","ongoing"))

                                                On Going <span class="fa fa-cog" title="On Going"> 

                                                @elseif(str_is("$task->status","stuck"))

                                                    Stuck <span class="fa fa-stop-circle" style="color:red" title="Stuck">

                                                @elseif(str_is("$task->status","complete"))

                                                    Completed <span class="fa fa-check-circle" style="color:blue"  title="Complete">

                                                @elseif(str_is("$task->status","verified"))

                                                    Verified <span class="fa fa-check-circle" style="color:green"  title="Complete">
                                                @else

                                                    Unknown
                                                
                                        @endif
                                    </td>

                                    <td>
                                            <a href="{{ route ('task.edit', ['id' => $task->id ]) }}"><span class="fa fa-edit" title="Edit Task"></a>
                                        @if(Auth::user()->admin)
                                            <a href="{{ route ('task.trash', ['id' => $task->id ]) }}"><span class="fa fa-trash" style="color:red" title="Trash Task"></a>
                                        @endif
                                            <a href="{{ route ('task.complete', ['id' => $task->id ]) }}"><span class="fa fa-check-circle" style="color:blue" title="Mark As Complete"></a> 
                                        @if(Auth::user()->admin)
                                            <a href="{{ route ('task.verify', ['id' => $task->id ]) }}"><span class="fa fa-check-circle" style="color:green" title="Verify"></a> 
                                        @endif
                                    </td>

                            </tr>

                                @endforeach


                        
                                @else 
                                        
                                <tr>
                                        <th colspan="5" class="text-center">No Tasks Yet</th>
                                </tr>
                                            
                            @endif
                    
                    </tbody>
                    
                     
                </table>
                
                </div>

                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
                            
                    
        </div> 
        <!--  End of Table   -->
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