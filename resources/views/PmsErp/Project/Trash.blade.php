@extends('pmsErp.layouts.PmsErp')
@section('title','Trashed Projects')
@section('content')

<section class="content">

    <div class="card" style=" top: 20px; ">
    
                
        <table class="table table-hover">

        <thead>

            <th>

                Project Name

            </th>

            <th>

                Deleted On

            </th>

            <th>

                Actions

            </th>

        </thead>

        <tbody>

        @if ($projects ->count() >0)

            @foreach ($projects as $project)

                <tr> 
                    <td>
                         {{ $project->name }}
                    </td>
                    <td>
                       {{ $project->deleted_at->toFormattedDateString() }}
                    </td>

                    <td>
                       <a href="{{ route ('project.restore', ['id' => $project->id ]) }}"><span class="fa fa-recycle" title="Restore project"></a>...    
                       <a href="{{ route ('project.destroy', ['id' => $project->id ]) }}"><span class="fa fa-window-close" style="color:red"  title="Delete project"> </a>
                    </td>

                </tr>
            
            @endforeach
        
            @else 
                                        
                   <tr>
                        <th colspan="5" class="text-center">No Trashed Tasks</th>
                    </tr>
                     
            @endif

        </tbody>

        </table>
    </div>


</section>
@endsection

