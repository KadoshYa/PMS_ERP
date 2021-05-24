@extends('PmsErp.layouts.PmsErp')
@section('title','Update Task')
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

            @if(Auth::user()->admin)
        
                <div class="card-header">
                    <label class="card-title"> Update Task : {{$task->task_name}} </label>
                </div>
            @endif

            
                <div class="card-body" >
                    <form action="{{ route('task.update',['id' => $task->id]) }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field()}}
                            @if(Auth::user()->admin)
                                            <div class="form-group">
                                                <label for="task_name">New Name</label>
                                                <input type="text" name="task_name" id="name" class="form-control" value="{{$task->task_name}}">
                                            </div>

                                            <div class="form-group">
                                                <label for="employee_id">Assign to:</label>
                                                    <div class="form-group">
                                                        @foreach ($users as $user)
                                                            <input type="checkbox" id="employee_id" name="employee_id[]" value="{{$user->id}}"> {{$user->name}} <br>
                                                        @endforeach
                                                    </div>                        
                                            </div>
                                        
                                            <div class="form-group">
                                                <label for="content">Update Task Detail</label>
                                                <textarea name="task_detail" id="detail" cols="5" rows="5" class="form-control">{{$task->task_detail}}</textarea>                
                                            </div>

                                            <div class="form-group">
                                                    <div class="row">
                                                    <legend class="col-form-label col-sm-2 pt-0">Change Priority</legend>
                                                    <div class="col-sm-10">
                                                        <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="priority" id="priorityHigh" value="high" >
                                                        <label class="form-check-label" for="priorityHigh">
                                                            High
                                                        </label>
                                                        </div>
                                                        <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="priority" id="priorityMedium" value="medium" checked>
                                                        <label class="form-check-label" for="priorityMedium">
                                                            Medium
                                                        </label>
                                                        </div>
                                                        <div class="form-check disabled">
                                                        <input class="form-check-input" type="radio" name="priority" id="priorityNormal" value="normal" >
                                                        <label class="form-check-label" for="priorityNormal">
                                                            Normal
                                                        </label>
                                                        </div>
                                                    </div>
                                                    </div>
                                            </div>


                                            <div class="form-group">
                                                <label for="attachment">Change Attachment</label>
                                                <input type="file" name="attachment" id="content" class="form-control"></input>                
                                            </div>
                            @endif

                            <div class="form-group">
                                <label for="status">Update Status</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="recieved">Recieved</option>
                                        <option value="ongoing">On Going</option>
                                        <option value="stuck">Stuck</option>
                                        <option value="complete">Completed</option>
                                    </select>
                            </div>
                            @if(Auth::user()->admin)

                                            <div class="form-group">
                                                <label for="dueDate">Due Date</label>
                                                <div> {{($date)}}</div><input type="date" name="dueDate" id="dueDate" class="form-control" value="{{$task->dueDate}}"></input>                
                                            </div>
                            @endif
                        
                            <div class="form-group">
                                <div class="text-center">
                                    <button class="btn btn-success " type="Submit">Update Task</button>
                                </div>
                            </div>
                    
                    </form>
                </div>
       </div>
   </div>

</section>


@endsection

