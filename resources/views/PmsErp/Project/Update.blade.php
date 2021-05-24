@extends('PmsErp.layouts.PmsErp')
@section('title','Update Project')
@section('content')

<section class="content" style="padding:35px">
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
                        <label class="card-title"> Update Project : {{ $project->name }} </label>
                    </div>

                    <div class="card-body" >
                        <form action="{{ route('project.update',['id' => $project->id] )}} " method="post" enctype="multipart/form-data">
                            {{ csrf_field()}}

                                <div class="form-group">
                                    <label for="name"> Update Name</label>
                                    <input type="text" name="name" id="form-control" value="{{$project->name}}" class="form-control" >
                                </div>
                            
                                <div class="form-group">
                                    <label for="content">Update Description</label>
                                    <textarea name="description" id="description" cols="5" rows="5" class="form-control">{{$project->description}}</textarea>                
                                </div>

                                <div class="form-group">
                                    <label for="status">Update Status</label>
                                        <select name="status" id="status" class="form-control">
                                            <option value="ongoing">On Going</option>
                                            <option value="stuck">Stuck</option>
                                            <option value="complete">Completed</option>
                                        </select>
                                </div>

                                <div class="form-group">
                                    <label for="attachment">Change Attachment</label>
                                    <input type="file" name="attachment" id="content" class="form-control" value="{{$project->attachment}}" ></input>                
                                </div>

                                <div class="form-group">
                                    <label for="content">Due Date</label>
                                    <div> {{($date)}}</div><input type="date" name="dueDate" id="dueDate" class="form-control" value="{{$project->dueDate}}"></input>                
                                </div>
                                
                                <div class="form-group">
                                    <div class="text-center">
                                        <button class="btn btn-success btn-sm" type="Submit">Update Project</button>
                                    </div>
                                </div>
                        
                        </form>
                    </div>
        </div>
    </div>  
</section>
@endsection

