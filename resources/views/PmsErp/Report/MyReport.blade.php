@extends('PmsErp.layouts.PmsErp')
@section('title','My Reports')
@section('content')

<section class="content">

    <div class="row">

        <!--Start of Table-->
        <div class="col-md-12" style=" top: 20px; padding-right:20px; padding-left:20px; ">
        
            <div class="card">
                <div class="card-header">
                    <label class="card-title">My Reports</label>
                </div>
                <!-- /.card-header -->
                <div class="card-body">

                    <div class="table-responsive">
                        <table id="example1" class="table table-hover  table-bordered table-striped" >
                            <thead>

                                    <th>

                                        Report Name

                                    </th>
                                    
                                    <th>
                                        Submitted On
                                    </th>

                                    <th>
                                        Status
                                    </th>

                                    <th> 
                                        Download Report
                                    </th>

                            </thead>

                            <tbody>
                                    @if($reports ->count() >0)

                                        @foreach ($reports as $report)

                                    <tr> 
                                            <td>
                                            {{ $report->report }}
                                            </td>

                                            <td>
                                                {{ $report->created_at->toFormattedDateString() }}
                                            </td>

                                            <td>
                                                @if(str_is("$report->recieved","1"))

                                                    Accepted/Verified 

                                                @elseif(str_is("$report->recieved","0")) 

                                                    Submitted 

                                                @endif
                                            </td>

                                            <td class="text-center">
                                                <a href="{{asset($report->file)}}"><div class="btn btn-info"> <i class="fa fa-download"></i>Download Report</div></a>
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