@extends('pmsErp.layouts.PmsErp')
@section('title','Trashed Tasks')
@section('content')

    <section class="content">
       <div class="col-md-12" style=" top: 20px; padding-right:20px; padding-left:20px; ">
            <div class="card">
                <div class="card-header">
                    <label class="card-title">Trashed Tasks</label>
                </div>
                <div class="card-body">
                  <div class="table-responsive">                   
                        <table id="example1" class="table table-hover  table-bordered table-striped" >

                                <thead>

                                        <th>

                                            Task Name

                                        </th>

                                        <th>

                                           Created On

                                        </th>

                                        <th>

                                            Status

                                        </th>

                                        <th >

                                            Actions

                                        </th>

                                </thead>

                                <tbody>

                                    @if ($tasks ->count() >0)

                                        @foreach ($tasks as $task)

                                            <tr> 
                                                <td>
                                                    {{ $task->task_name }} 
                                                </td>
                                                <td>
                                                {{ $task->deleted_at->toFormattedDateString() }}
                                                </td>

                                                <td>
                                                    {{$task->status}}
                                                </td>

                                                <td  class="text-center">
                                                <a href="{{ route ('task.restore', ['id' => $task->id ]) }}"><span class="fa fa-recycle" title="Restore Task"></a> ...
                                                <a href="{{ route ('task.destroy', ['id' => $task->id ]) }}"><span class="fa fa-window-close" style="color:red" title="Delete Task"></a>
                                                </td>

                                            </tr>
                                        
                                        @endforeach
                                    
                                        @else 
                                                                    
                                                <tr>
                                                    <th colspan="5" class="text-center">No Trashed Tasks</th>
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