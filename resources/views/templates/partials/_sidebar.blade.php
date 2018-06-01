            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a href="{{ url('/') }}"><i class="fa fa-home"></i> Dashboard</a></li>
                  <li><a><i class="fa fa-edit"></i> Forms <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
{{--                  <li><a href="{{ url('form/upload-file') }}">File Form</a></li> --}}
                      <li><a href="{{ url('form/mentor') }}">Mentor Form</a></li>
                      <li><a href="{{ url('form/user') }}">User Form</a></li>
                      <li><a href="{{ url('form/class') }}">Class Form</a></li>
                    </ul>
                  </li>


                  <li><a><i class="fa fa-table"></i> Tables <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ url('mentor') }}">Mentor Table</a></li>
                      <li><a href="{{ url('user') }}">User Table</a></li>
                      <li><a href="{{ url('class') }}">Class Table</a></li>
                    </ul>
                  </li>
                  <li><a href="{{ url('/logout') }}"><i class="fa fa-sign-out"></i>Logout</a>
                  </li>

                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

