@extends('pmsErp.layouts.PmsErp')
@section('title','Project Details')
@section('content')

<section class="content">

    <div style="padding-right:5%; padding-left:5%">
        <div class="card mx-auto"   style="
            padding-left: 5%;
            padding-right: 5%;
            padding-top: 40px;
            top: 20px;
            ">   
                @if(count($errors) > 0)
                    <ul class="list-group">
                    
                        @foreach($errors->all() as $error)

                            <li class="list-group-itme text-danger">
                            
                                {{$error}}
                            </li>
                        @endforeach

                    </ul>

                @endif

                    <div class="card-header">
                        <label class="card-title"> {{ $project->name }}: Details</label>
                    </div>

                    <div class="card-body" >
                        <form>
                        <fieldset disabled>
                                <div class="form-group">
                                    <label for="disabledTextInput">Project Name</label>
                                         <input type="text" id="disabledTextInput" class="form-control" placeholder="{{$project->name}}">
                                </div>

                                <div class="form-group">
                                    <label for="content">Project Description</label>
                                    <textarea name="description" id="description" cols="5" rows="5" class="form-control">{{$project->description}}</textarea>                
                                </div>

                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <input type="text" id="disabledTextInput" class="form-control" placeholder="{{$project->status}}">
                                </div>

                                <div class="form-group">
                                    <label for="attachment">Attachment</label>
                                    <a href="{{$project->attachment}}"><div>{{$project->attachment}}</div></a>
                                </div>

                                <div class="form-group">
                                    <label for="content">Due Date</label>
                                    <div>
                                        <input type="text" placeholder="{{($date)}}" > </input>                
                                    </div>
                                </div>
                             
                        </fieldset>                               
                                <div class="form-group">
                                    <div class="text-center">
                                        <a class="btn btn-success btn-sm" href="/edit_project/{{$project->id}}">Update Project Details</a>
                                    </div>
                                </div>
                        
                        </form>
                    </div>
        </div>
    </div>  


        <!--Start of Table-->
        <div class="col-md-12" style=" top: 20px; padding-right:5%; padding-left:5%; ">
         
            <div class="card">
                <div class="card-header">
                  <label class="card-title">Tasks in Project: {{$project->name}}</label>
                </div>
                <!-- /.card-header -->
                <div class="card-body">

                  <div class="table-responsive">

                    <table id="example1" class="table table-hover  table-bordered table-striped" >
                        <thead>
                            <th >
                                   Task Name

                            </th>
                             <th >
                                    Created On
                            </th>
                          
                              <th >
                                    Status
                            </th>
                            <th>
                                    Assigned To
                            </th>
                            <th>
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

                                      <td>
                                          {{ $task->created_at->toFormattedDateString() }}
                                      </td>

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

                                      <?php

                                        $task_id = $task->id;

                                        $users = App\Task::find($task_id)->users;

                                      ?>                                                   
                                       <select name="addToProject" id="addToProject" class="form-control" style="width:50%">
                                            @foreach ($users as $user)
                                                 <option >{{$user->name}}</option>
                                            @endforeach
                                      </select>
                                      
                                      </td>

                                      <td>
                                          <a href="{{ route ('task.edit', ['id' => $task->id ]) }}"><span class="fa fa-edit" title="Edit Task"></a>
                                          <a href="{{ route ('task.trash', ['id' => $task->id ]) }}"><span class="fa fa-trash" style="color:red" title="Trash Task"></a>
                                          <a href="{{ route ('task.complete', ['id' => $task->id ]) }}"><span class="fa fa-check-circle" style="color:blue" title="Mark As Complete"></a> 
                                          <a href="{{ route ('task.verify', ['id' => $task->id ]) }}"><span class="fa fa-check-circle" style="color:green" title="Verify"></a> 

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



</section>    

@endsection

