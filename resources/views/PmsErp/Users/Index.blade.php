@extends('pmsErp.layouts.PmsErp')
@section('title','List of Users')
@section('content')

  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Users</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Users</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>

    <section class="content">

        <div class="row">
        
        
            <!--Start of Table-->
              
              <div class="col-md-12">

                  <div class="card">
                      <div class="card-header">
                        <h3 class="card-title">All  Users</h3>
                      </div>
                      <!-- /.card-header -->

                      <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped table-responsive display compact" cellspacing="0" width="100%">
                          
                            <thead>
                                <th style="width:20%">
                                    Name
                                </th>
                                <th style="width:20%">
                                    Email
                                </th>
                                <th style="width:20%">
                                  Phone Number
                                  </th>
                                <th style="width:20%">
                                    Profile 
                                </th>
                                <th style="width:20%">
                                    Permissions
                                </th>
                                <th style="width:20%">
                                    Delete
                                </th>
                            </thead>

                            <tbody>

                                @if($users->count() > 0)

                                    @foreach($users as $user)
                                  
                                      <tr>
                                      
                                          <td>
                                            {{ $user->name }}                   
                                          </td>
                                          
                                          <td>
                                          
                                            {{ $user->email }}
                                          
                                          </td>

                                          <td >

                                            {{ $user->phone }}

                                          </td>
                                          
                                          <td >
                                                @if($user->profileimage!='')

                                                    <img src="{{url('Erp/books/profile',$user->profileimage)}}" alt="" width="50">
                                              
                                                @else
                                            
                                                    <img src="{{asset('PmsErp/img/user2.png')}}" alt="User" width="50">
                                            
                                                @endif
                                          </td>
                                        
                                          <td>
                                        
                                                @if($user->admin)
                                        
                                                  <a href="{{ route('user.not.admin',['id' => $user->id]) }}" class="btn btn-sm btn-danger">Remove permissions</a>
                                        
                                        
                                                @else
                                        
                                                  <a href="{{ route('user.admin',['id' => $user->id]) }}" class="btn btn-sm btn-success">Make admin</a>
                                        
                                                @endif
                                        
                                          </td>
                                        
                                          <td>
                                      
                                              @if(Auth::id() !== $user->id)

                                                <a href="javascript:" rel="{{$user->id}}" rel1="delete-user" class="btn btn-danger btn-sm deleteRecord"><i class="fa fa-trash"></i></a>
                                      
                                              @endif
                                      
                                        </td>
                                      
                                      
                                      </tr>
                                      
                                    @endforeach
                                  
                                @else
                                
                                      <tr>

                                          <th colspan="5" class="text-center">No users</th>
                                      
                                      </tr>
                                
                                
                                @endif
                                
                            </tbody>
                          
                        </table>
                      </div> <!-- /.card-body -->

                  </div>   <!-- /.card -->                           
                                          
              </div>  
              
            <!-- End of Table-->

        </div>


    </section> 

@section('jsblock')
    <script>
                $(".deleteRecord").click(function () {
                    var id=$(this).attr('rel');
                        var deleteFunction=$(this).attr('rel1');
                          Swal.fire({
                              title: 'Are you sure?',
                              text: "You won't be able to revert this!",
                              icon: 'warning',
                              showCancelButton: true,
                              confirmButtonColor: '#3085d6',
                              cancelButtonColor: '#d33',
                              confirmButtonText: 'Yes, delete it!'
                        }).then(result =>
                        {
                      if (result.value) {
                        window.location.href="/"+deleteFunction+"/"+id;
                        }
                          });
                  });
      </script>
  @endsection
@endsection