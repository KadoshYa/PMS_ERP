@extends('pmsErp.layouts.PmsErp')
@section('title','All Reports')
@section('content')

    <section class="content">

        <div class="row">

            <div class="col-md-12" style=" top: 20px; padding-right:20px; padding-left:20px; ">
                <div class="card" >
                        <!-- Card-header -->
                        <div class="card-header">
                            <label class="card-title"> All Reports</label>
                        </div>
                            <!-- /.card-header -->

                            <!-- Card-Body -->
                    <div class="card-body">

                            <!-- Table-Start -->
                            <div class="table-responsive" >
                                <table id="example1" class="table table-hover table-bordered table-striped ">

                                    <thead>

                                        <th >
                                            Report Name
                                        </th>

                                        <th >
                                            Created On
                                        </th>

                                        <th >

                                            Created By

                                        </th>
                                        @if (Auth::user()->admin==2)
                                            <th >

                                                Department

                                            </th>  
                                        @endif                                      

                                        <th class="text-center">
                                            Download
                                        </th>

                                        <th>
                                            Status
                                        </th>

                                        <th>
                                            Verify Report
                                        </th>


                                    </thead>

                                    <tbody>

                                        @if ($reports ->count() >0)

                                            @foreach ($reports as $report)

                                                <tr> 
                                                    <td>
                                                         {{ $report->report }} 
                                                    </td>

                                                    <td>
                                                         {{ $report->created_at->toFormattedDateString() }}
                                                    </td>

                                                    <td>
                                                         {{App\User::find($report->created_by)->name}}
                                                    </td>
                                                @if (Auth::user()->id==2)
                                                    <td>
                                                    {{App\User::find($report->created_by)->department}}                                                 
                                                    </td>
                                                @endif
                                                    <td class="text-center">
                                                    <a href="{{asset($report->file)}}"><div class="btn btn-info"> <i class="fa fa-download"></i>Download Report</div></a>

                                                    </td>

                                                    <td>
                                                    @if(str_is("$report->recieved","1"))

                                                        Accepted/Verified 

                                                    @elseif(str_is("$report->recieved","0")) 

                                                        Submitted 

                                                    @endif
                                                    </td>

                                                    <td>
                                                        <a href="{{ route ('report.verify', ['id' => $report->id ]) }}"><span class="fa fa-check-circle" style="color:green" title="Mark As Complete"></a> 
                                                    </td>
                                                </tr>
                                        
                                            @endforeach
                                    
                                        @else 
                                                                    
                                                <tr>
                                                    <th colspan="5" class="text-center">No Reports Yet</th>
                                                </tr>
                                                
                                        @endif

                                    </tbody>

                                </table>

                              
                            <!-- Table-End -->
                            </div>

                    </div>
                            <!--Card-Body- End -->
                </div>
            </div>
        
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

