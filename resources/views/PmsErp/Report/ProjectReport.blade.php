@extends('pmsErp.layouts.PmsErp')
@section('title','Create Report')
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
                        <label class="card-title"> Create a new report </label>
                    </div>                    
                    <?php

                        $user_id = Auth::user()->id;

                    ?>  
                    <div class="card-body" >
                        <form action="{{ route('report.projectstore',['id'=> $user_id,'pid'=>$project->id]) }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field()}}

                                <div class="form-group">
                                    <label for="disabledTextInput">Project Name:</label> {{$project->name}}                                    
                                </div>

                                <div class="form-group">
                                    <label for="report_name">Report Name</label>
                                    <input type="text" name="report_name" id="taskName" class="form-control" >
                                </div>                           

                                <div class="form-group">
                                    <label for="content">Report File</label>
                                    <input type="file" name="report_file" id="content" class="form-control"></input>                
                                </div>

                                <div>
                                
                                        <label for="send_to">Send To: (Select One)</label> <br>

                                        @if(Auth::user()->admin==1 OR Auth::user()->admin==2)
                                            @foreach ($supers as $super)
                                                <input type="checkbox" id="inlineCheckbox1" name="send_to" value="{{$super->id}}"> {{$super->name}} <br>
                                            @endforeach

                                            @foreach ($admins as $admin)
                                                <input type="checkbox" id="inlineCheckbox1" name="send_to_1" value="{{$admin->id}}"> {{$admin->name}} <br>
                                            @endforeach
                                        @endif

                                        @if(Auth::user()->admin==0)
                                            @foreach ($admins as $admin)
                                                <input type="checkbox" id="inlineCheckbox1" name="send_to_1" value="{{$admin->id}}"> {{$admin->name}} <br>
                                            @endforeach
                                        @endif
                                      </select>

                    
                                <div class="form-group">
                                    <div class="text-center">
                                        <button class="btn btn-success " type="Submit">Send Report</button>
                                    </div>
                                </div>
                        
                        </form>
                    </div>
        </div>
    </div>

</section>
@endsection

