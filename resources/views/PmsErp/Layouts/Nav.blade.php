

       @guest
                          
    
               @else
                    <!-- Main Sidebar Container -->
                    <aside class="main-sidebar sidebar-dark-primary elevation-4">
                      <!-- Brand Logo -->
                      <a href="" target="_blank" class="brand-link">
                        <img src="{{asset('PmsErp/img/logo.png')}}" alt="Logo" class="brand-image img-circle elevation-3"
                             style="opacity: .8">
                        <span class="brand-text font-weight-light">PMS ERP</span>
                      </a>
                   
                      <!-- Sidebar -->
                      <div class="sidebar">
                        <!-- Sidebar user panel (optional) -->
                        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                          <div class="image">
                      @if( Auth::user()->profileimage!='')
                            <img  src="{{url('userProfile/',Auth::user()->profileimage)}}" class="img-circle elevation-2" alt="User Image">
                           @else
                            <img src="{{asset('PmsErp/img/user2.png')}}" class="img-circle elevation-2" alt="User Image">
                       @endif
                          
                          </div>
                           <div class="info">
                             <a class="d-block">    <?php echo Auth::user()->name;  ?></a>
                           </div>
                        </div>
                   
                        <!-- Sidebar Menu -->
                        <nav class="mt-2">
                          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            <!-- Add icons to the links using the .nav-icon class
                                 with font-awesome or any other icon font library -->
                                 @if(Auth::user()->admin)
                                  <li class="nav-item has-treeview">
                                    <a href="{{ route('dashboard') }}" class="nav-link">
                                      <i class="nav-icon fas fa-tachometer-alt"></i>
                                        <p>
                                           My Dashboard
                                       </p>
                                     </a>
                                 </li>
                            @endif
                            </li>
                   
                   
                            @if(Auth::user()->admin)
                            <li class="nav-item has-treeview">
                              <a href="#" class="nav-link">
                                  <i class="nav-icon fas fa-list-alt"></i>
                                     <p>
                                        Projects
                                      <i class="fas fa-angle-left right"></i>
                                    </p>
                               </a>
                              <ul class="nav nav-treeview">
                                 <li class="nav-item">
                                   <a href="{{route('project.create')}}"class="nav-link">
                                     <p>Add New Project</p>
                                   </a>
                                 </li>
                                 <li class="nav-item">
                                    <a href="{{ route('project.calender') }}" class="nav-link">
                                        <p>Calender View</p>
                                      </a>
                                </li>
                   
                                 <li class="nav-item">
                                    <a href="{{ route('project.all') }}" class="nav-link">
                                        <p>All Projects</p>
                                      </a>
                                </li>
                              </ul>
                            </li>
                            @endif
                              
                            <li class="nav-item has-treeview">
                               <a href="#" class="nav-link">
                                   <i class="nav-icon fas fa-book"></i>
                                       <p>
                                         Tasks
                                       <i class="right fas fa-angle-left"></i>
                                   </p>
                               </a>
                              <ul class="nav nav-treeview">
                              @if(Auth::user()->admin)
                                 <li class="nav-item">
                                     <a href="{{ route('task.create') }}"class="nav-link">
                                          <p>Add New Task</p>
                                      </a>
                                  </li>
                                  <li class="nav-item">
                                     <a href="{{ route('task.all') }}"class="nav-link">
                                          <p>All Tasks</p>
                                      </a>
                                  </li>
                              @endif

                              <li class="nav-item">
                                  <a href="{{ route('task.mytasks') }}"class="nav-link">
                                    <p>My Tasks</p>
                                  </a>
                               </li>

                                  <li class="nav-item">
                                    <a href="{{ route('task.calender') }}" class="nav-link">
                                        <p>Calender View</p>
                                      </a>
                                </li>                      
                             </ul>
                            </li>

                            <li class="nav-item has-treeview">
                              <a href="#" class="nav-link">
                                  <i class="nav-icon fas fa-list-alt"></i>
                                     <p>
                                        Reports
                                      <i class="fas fa-angle-left right"></i>
                                    </p>
                               </a>
                              <ul class="nav nav-treeview">
                                 <li class="nav-item">
                                   <a href=""class="nav-link">
                                     <p>Generate New Report</p>
                                   </a>
                                 </li>
                   
                                 @if(Auth::user()->admin)
                                 <li class="nav-item">
                                    <a href="" class="nav-link">
                                        <p>All Reports</p>
                                      </a>
                                </li>

                                @else

                                <li class="nav-item">
                                    <a href="" class="nav-link">
                                        <p>Submitted Reports</p>
                                      </a>
                                </li>

                                @endif

                              </ul>
                            </li>

                          @if(Auth::user()->admin)
                            <li class="nav-item has-treeview">
                              <a href="#" class="nav-link">
                                  <i class="nav-icon fas fa-trash"></i>
                                     <p>
                                        Trashes
                                      <i class="fas fa-angle-left right"></i>
                                    </p>
                               </a>
                              <ul class="nav nav-treeview">
                                 <li class="nav-item">
                                   <a href="{{ route('project.showTrash') }}"class="nav-link">
                                     <p>Project Trashes</p>
                                   </a>
                                 </li>
                   
                                 <li class="nav-item">
                                    <a href="{{ route('task.showTrash') }}" class="nav-link">
                                        <p>Task Trashes</p>
                                      </a>
                                </li>
                              </ul>
                            </li>
                               
                            <li class="nav-item has-treeview">
                              <a href="{{ route('users') }}"  class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                Users
                                </p>
                              </a>
                            </li> 
                                 @endif
                            <li class="nav-item has-treeview">
                               <a href="{{ route('user.profile') }}"  class="nav-link">
                                   <i class="nav-icon fas fa-user"></i>
                                       <p>
                                           Profile
                                       </p>
                               </a>
                            </li>
                       
                            <li class="nav-item has-treeview">
                             <a  class="nav-link" href="{{ route('logout') }}"
                             onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
                              {{-- {{ __('Logout') }} --}}
                                 <i class="nav-icon fas fa-power-off"></i>
                              <p>
                             Logout
                              </p>
                          </a>
                   
                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                              @csrf
                          </form>
                   
                            </li>
                           
                          </ul>
                        </nav>
                        <!-- /.sidebar-menu -->
                      </div>
                      <!-- /.sidebar -->
                    </aside>      
         @endguest