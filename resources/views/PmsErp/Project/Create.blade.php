@extends('pmsErp.layouts.PmsErp')
@section('title','Create New Project')
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
                    <label class="card-title"> Create a new project </label>
                </div>

                <div class="card-body" >
                    <form action="{{ route('project.store') }} " method="post" enctype="multipart/form-data">
                        {{ csrf_field()}}

                            <div class="form-group">
                                <label for="title">Name of Project</label>
                                <input type="text" name="project_name" id="form-control" class="form-control" >
                            </div>
                        
                            <div class="form-group">
                                <label for="content">Description</label>
                                <textarea name="description" id="description" cols="5" rows="5" class="form-control"></textarea>                
                            </div>

                            <div class="form-group">
                                <label for="content">Attachment</label>
                                <input type="file" name="attachment" id="content" class="form-control"></textarea>                
                            </div>

                            <div class="form-group">
                                <label for="content">Due Date</label>
                                <input type="date" name="dueDate" id="dueDate" class="form-control"></textarea>                
                            </div>
                            
                            <div class="form-group">
                                <div class="text-center">
                                    <button class="btn btn-success btn-sm" type="Submit">Create Project</button>
                                </div>
                            </div>
                    
                    </form>
                </div>
        </div>
    </div>  


</section>
@endsection

