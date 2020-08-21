@extends('pmsErp.layouts.PmsErp')
@section('title','Create New Task')
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
                        <label class="card-title"> Create a new task </label>
                    </div>

                    <div class="card-body" >
                        <form action="{{ route('task.store') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field()}}

                                <div class="form-group">
                                    <label for="title">Task Name</label>
                                    <input type="text" name="task_name" id="taskName" class="form-control" >
                                </div>

                                <div class="form-group">
                                    <label for="employee_id">Assign to:</label>
                                        <div class="form-group">
                                            @foreach ($users as $user)
                                                <input type="checkbox" id="inlineCheckbox1" name="employee_id[]" value="{{$user->id}}"> {{$user->name}} <br>
                                            @endforeach
                                        </div>

                                    
                                </div>
                            
                                <div class="form-group">
                                    <label for="task_detail">Task Detail</label>
                                    <textarea name="task_detail" id="detail" cols="5" rows="5" class="form-control"></textarea>                
                                </div>

                                <div class="form-group">
                                        <div class="row">
                                        <legend class="col-form-label col-sm-2 pt-0">Priority</legend>
                                        <div class="col-sm-10">
                                            <div class="form-check">
                                            <input class="form-check-input" type="radio" name="priority" id="priorityHigh" value="High" >
                                            <label class="form-check-label" for="priorityHigh">
                                                High
                                            </label>
                                            </div>
                                            <div class="form-check">
                                            <input class="form-check-input" type="radio" name="priority" id="priorityMedium" value="Medium" checked>
                                            <label class="form-check-label" for="priorityMedium">
                                                Medium
                                            </label>
                                            </div>
                                            <div class="form-check disabled">
                                            <input class="form-check-input" type="radio" name="priority" id="priorityNormal" value="Normal" >
                                            <label class="form-check-label" for="priorityNormal">
                                                Normal
                                            </label>
                                            </div>
                                        </div>
                                        </div>
                                </div>


                                <div class="form-group">
                                    <label for="content">Attachment</label>
                                    <input type="file" name="attachment" id="content" class="form-control"></textarea>                
                                </div>

                                <div class="form-group">
                                    <label for="addToProject">Add To Project (Optional)</label>

                                    <select name="addToProject" id="addToProject" class="form-control">
                                            @foreach ($projects as $project)
                                                <option value="" Selected>Chose Project</option>
                                                <option value="{{$project->id}}">{{$project->name}}</option>
                                            @endforeach
                                    </select>

                                </div>

                                <div class="form-group">
                                    <label for="dueDate">Due Date</label>
                                    <input type="date" name="dueDate" id="dueDate" class="form-control"></input>                
                                </div>
                    
                                <div class="form-group">
                                    <div class="text-center">
                                        <button class="btn btn-success " type="Submit">Create Task</button>
                                    </div>
                                </div>
                        
                        </form>
                    </div>
        </div>
   </div>


</section>


@endsection

