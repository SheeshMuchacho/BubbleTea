<div class="container-scroller">

    <!-- partial:partials/_sidebar.html -->
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
      <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
        <a class="sidebar-brand brand-logo" href=""><h1 style="color: white">Admin</h1></a>
        <a class="sidebar-brand brand-logo-mini" href=""><h1 style="color: white">-A-</h1></a>
      </div>


      <ul class="nav">

          <!-- navigation -->
        <li class="nav-item nav-category">
          <span class="nav-link">Navigation</span>
        </li>

        <li class="nav-item menu-items">
          <a class="nav-link" href="{{url('admindash')}}">
            <span class="menu-icon">
              <i class="mdi mdi-speedometer"></i>
            </span>
            <span class="menu-title">Dashboard</span>
          </a>
        </li>

         <!-- management -->
         <li class="nav-item nav-category">
          <span class="nav-link">Management</span>
        </li>


          <!-- Admins -->
          <li class="nav-item menu-items">
              <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic2" aria-expanded="false" aria-controls="ui-basic2">
                  <span class="menu-icon">
                      <i class="mdi mdi-account-multiple"></i>
                  </span>
                  <span class="menu-title">Admins</span>
                  <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="ui-basic2">
                  <ul class="nav flex-column sub-menu">
                      <li class="nav-item"> <a class="nav-link" href="{{url('adminshow')}}">View Admins</a></li>
                      <li class="nav-item"> <a class="nav-link" href="{{url('admins')}}">Create Admins</a></li>
                  </ul>
              </div>
          </li>


          <!-- Users -->
          <li class="nav-item menu-items">
              <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic1" aria-expanded="false" aria-controls="ui-basic1">
                  <span class="menu-icon">
                      <i class="mdi mdi-account-multiple"></i>
                  </span>
                  <span class="menu-title">Users</span>
                  <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="ui-basic1">
                  <ul class="nav flex-column sub-menu">
                      <li class="nav-item"> <a class="nav-link" href="{{url('usershow')}}">View Users</a></li>
                      <li class="nav-item"> <a class="nav-link" href="{{url('users')}}">Create Users</a></li>
                  </ul>
              </div>
          </li>


          <!-- Products -->
          <li class="nav-item menu-items">
              <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
            <span class="menu-icon">
              <i class="mdi mdi-package-variant"></i>
            </span>
                  <span class="menu-title">Products</span>
                  <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="ui-basic">
                  <ul class="nav flex-column sub-menu">
                      <li class="nav-item"> <a class="nav-link" href="{{url('showproduct')}}">View Products</a></li>
                      <li class="nav-item"> <a class="nav-link" href="{{url('product')}}">Add Products</a></li>
                  </ul>
              </div>
          </li>


          <!-- Orders -->
          <li class="nav-item menu-items">
              <a class="nav-link" href="{{url('showorder')}}">
            <span class="menu-icon">
              <i class="mdi mdi-cart"></i>
            </span>
                  <span class="menu-title">Orders</span>
              </a>
          </li>


{{--          <!-- Template -->--}}
{{--          <li class="nav-item menu-items">--}}
{{--              <a class="nav-link" href="admin/pages/forms/basic_elements.html">--}}
{{--            <span class="menu-icon">--}}
{{--              <i class="mdi mdi-page-first"></i>--}}
{{--            </span>--}}
{{--                  <span class="menu-title">Corona</span>--}}
{{--              </a>--}}
{{--          </li>--}}

      </ul>
    </nav>
