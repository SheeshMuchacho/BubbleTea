<div class="container-scroller">
        
    <!-- partial:partials/_sidebar.html -->
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
      <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
        <a class="sidebar-brand brand-logo" href=""><h1 style="color: white">AdminDashboard</h1></a>
        <a class="sidebar-brand brand-logo-mini" href=""><h1 style="color: white">-A-</h1></a>
      </div>


      <ul class="nav">
          <!-- navigation -->
        <li class="nav-item nav-category">
          <span class="nav-link">Navigation</span>
        </li>

        <li class="nav-item menu-items">
          <a class="nav-link" href="<?php echo e(url('admindash')); ?>">
            <span class="menu-icon">
              <i class="mdi mdi-speedometer"></i>
            </span>
            <span class="menu-title">Dashboard</span>
          </a>
        </li>

        <li class="nav-item menu-items">
          <a class="nav-link" href="http://www.bootstrapdash.com/demo/corona-free/jquery/documentation/documentation.html">
            <span class="menu-icon">
              <i class="mdi mdi-file-document"></i>
            </span>
            <span class="menu-title">Documentation</span>
          </a>
        </li>

         <!-- management -->
         <li class="nav-item nav-category">
          <span class="nav-link">Management</span>
        </li>

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
              <li class="nav-item"> <a class="nav-link" href="<?php echo e(url('product')); ?>">Add Product</a></li>
              <li class="nav-item"> <a class="nav-link" href="<?php echo e(url('showproduct')); ?>">View Products</a></li>
            </ul>
          </div>
        </li>

          <li class="nav-item menu-items">
              <a class="nav-link" href="admin/pages/forms/basic_elements.html">
            <span class="menu-icon">
              <i class="mdi mdi-account-multiple"></i>
            </span>
                  <span class="menu-title">Users</span>
              </a>
          </li>

      </ul>
      
    </nav>
<?php /**PATH C:\xampp\htdocs\cb009892\resources\views/admin/sidebar.blade.php ENDPATH**/ ?>