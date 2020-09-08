@extends('PmsErp.layouts.PmsErp')
@section('title','My Dashboard')
@section('content')

    <div class="section">
        <div class="col-md-12" style=" top: 20px; padding-right:20px; padding-left:20px; ">
            <div class="card">
                <div class="card-header">
                    <label class="card-title">System Log</label>
                </div>
                <div class="card-body">
                    <div class="table-responsive">                   
                        <table id="example1" class="table table-hover  table-bordered table-striped" >

                                <thead>

                                    <th>

                                        User Name

                                    </th>

                                    <th>

                                        Action

                                    </th>

                                    <th>

                                        Day

                                    </th>
                                    
                                    <th>

                                        Time

                                    </th>

                                </thead>

                                <tbody>

                                    @if ($activities ->count() >0)

                                        @foreach ($activities as $activity)

                                            <tr> 
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
                                                <td>
                                                   {{$this_user}}
                                                <td>
                                                   {{ $activity->description}}
                                                </td>
                                                <td  >
                                                     {{ $activity->created_at->toFormattedDateString() }}
                                                </td>                                   
                                                <td  >
                                                     {{$activity->created_at->format('H:i:s') }}
                                                </td>

                                            </tr>
                                        
                                        @endforeach
                                    
                                        @else 
                                                                    
                                                <tr>
                                                    <th colspan="5" class="text-center">No Log Recorded</th>
                                                </tr>
                                                
                                    @endif

                                </tbody>

                        </table>
                   </div>
                </div>
            </div>
       </div>
    </div>

@endsection