<!DOCTYPE html>
<html lang="en">

@include('templates.partials._head')

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>E-Task!</span></a>
            </div>

            <div class="clearfix"></div>

            @include('templates.partials._menu-profile')
            <br />

            @include('templates.partials._sidebar')
            
            @include('templates.partials._menu-footer')
          </div>
        </div>
        @include('templates.partials._top-nav')

        <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
          <!-- /top tiles -->
          @yield('content')

        </div>
        <!-- /page content -->

        <!-- footer content -->
        <!-- /footer content -->
      </div>
    </div>

@include('templates.partials._script')

  </body>
</html>
