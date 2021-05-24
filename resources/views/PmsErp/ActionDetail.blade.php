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
                        <label class="card-title">Log Action Details</label>
                    </div>

                    <div class="card-body" >
                        <form>
                        <fieldset disabled>
                                <div class="form-group">
                                    <label for="disabledTextInput">Action </label>
                                         <input type="text" id="disabledTextInput" class="form-control" placeholder="{{$activity->description}}">
                                </div>

                                <div class="form-group">
                                    <label for="content">Action  Details</label>
                                    <?php

                                        $activity_arr=json_decode($activity, true);
                                        
                                    ?>
                                         <textarea name="description" id="description" cols="5" rows="5" class="form-control">Changed name from: {{$activity['properties']['old']['name']}}  To:{{$activity['properties']['attributes']['name']}} </textarea>                
                                </div>

                                <div class="form-group">
                                    <label for="status">Action Taken Place On</label>
                                    <input type="text" id="disabledTextInput" class="form-control" placeholder="{{ $activity->created_at->toFormattedDateString() }}  at  {{$activity->created_at->format('H:i:s') }}">
                                </div>

                                <div class="form-group">
                                    <label for="radioDisabled">Done By:</label>
                                       <?php 
                                            $user_id = $activity->causer_id; 

                                            $this_user='';

                                            foreach ($users as $user)
                                            {
                                                if(str_is("$user->id","$user_id")){
                                                    $this_user = $user->name;
                                                }
                                            }
                                        ?>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" name="radioDisabled" id="customRadioDisabled2" class="custom-control-input" disabled>
                                            <label  class="custom-control-label">  {{$this_user}}</label>
                                        </div>
                              </div>

                        </fieldset>                               

                        
                        </form>
                    </div>
        </div>
    </div>
</section>


@endsection

