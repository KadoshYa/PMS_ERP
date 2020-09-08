

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
          <a  class="nav-link" href="#" target="_blank">
        </a>
      </li>
      
    </ul>

  

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">     
          <!-- <li class="nav-item dropdown no-arrow mx-1 show">
          <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
            <i class="fas fa-bell fa-fw"></i>
              @if(auth()->user()->unreadnotifications->count())
              <span class="badge badge-danger badge-counter">{{auth()->user()->unreadnotifications->count()}}</span>
              @endif
            </a>
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <ul class="dropdown-menu ">
                <li><a class="dropdown-header" href="{{route('markRead')}}">Mark all as Read</a></li>
                  @foreach(auth()->user()->notifications as $notification)
                    <li><a href="#">{{$notification->data['data']}}</a></li>
                  @endforeach
                </ul> 
             </div>         
          </li> -->

                    <!-- ,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,, -->
          <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                <span class="badge badge-danger badge-counter">{{auth()->user()->unreadnotifications->count()}}</span>
              </a>
              <!-- Dropdown - Alerts -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-item text-center">
                 <strong><a href="{{route('markRead')}}">Mark all as Read</a></strong><br> 
                </h6><hr>
                @foreach(auth()->user()->notifications as $notification)
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-primary">
                      <i class="fa fa-bullhorn text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">{{$notification->created_at->toFormattedDateString()}}</div>
                    <span class="font-weight-bold">{{$notification->data['data']}}</span>
                  </div>
                </a>
                @endforeach
                
            </li>



          <!-- ,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,, -->
          <li class="nav-item d-none d-sm-inline-block">
              <a  class="nav-link" href="{{ route('logout') }}
                " onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                  {{-- {{ __('Logout') }} --}}
                  &nbsp; <i class="fa fa-lock"></i>&nbsp;Logout
              </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>

          </li>
     
    </ul>
  </nav>
  <!-- /.navbar -->
