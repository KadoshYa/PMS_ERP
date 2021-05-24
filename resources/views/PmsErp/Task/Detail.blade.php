@extends('PmsErp.layouts.PmsErp')
@section('title','Task Details')
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
                        <label class="card-title"> {{ $task->task_name }}: Details</label>
                    </div>

                    <div class="card-body" >
                        <form>
                        <fieldset disabled>
                                <div class="form-group">
                                    <label for="disabledTextInput">Task Name</label>
                                         <input type="text" id="disabledTextInput" class="form-control" placeholder="{{$task->task_name}}">
                                </div>

                                <div class="form-group">
                                    <label for="content">Task Description</label>
                                    <textarea name="description" id="description" cols="5" rows="5" class="form-control">{{$task->task_detail}}</textarea>                
                                </div>

                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <input type="text" id="disabledTextInput" class="form-control" placeholder="{{$task->status}}">
                                </div>

                                <div class="form-group">
                                    <label for="priority">priority</label>
                                    <input type="text" id="disabledTextInput" class="form-control" placeholder="{{$task->priority}}">
                                </div>

                                <div class="form-group">
                                    <label for="status">Assigned To:</label>
                                    <?php

                                    $task_id = $task->id;

                                    $users = App\Task::find($task_id)->users;

                                    ?>                                                   
                                    @foreach ($users as $user)
                                        <br>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" name="radioDisabled" id="customRadioDisabled2" class="custom-control-input" disabled>
                                            <label  class="custom-control-label">  {{$user->name}}</label>
                                        </div>
                                    @endforeach
                              </div>

                                <div class="form-group">
                                    <label for="attachment">Attachment</label> <br>
                                    
                                    <a href="{{asset($task->attachment)}}"><div class="btn btn-primary"> <i class="fa fa-file"></i> Downlaod Attachment</div></a>
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
                                        <a class="btn btn-success btn-sm" href="/edit_task/{{$task->id}}">Update Task Details</a>
                                    </div>
                                </div>
                        
                        </form>
                    </div>
        </div>
    </div>
</section>


@endsection

