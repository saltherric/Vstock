  <?php
    $settings = array(
      'category', 'user', 'role', 'company'
    );
  ?>
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('/')}}" class="brand-link">
      <img src="{{asset('/theme/img/logo.jpg')}}" alt="sunrise_logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">{{config('app.name')}}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- SidebarSearch Form -->
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{route('home.index')}}" class="nav-link {{$active=='home'?'active':''}}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-star"></i>
              <p>
                Products
              </p>
            </a>
          </li>
          <li class="nav-item {{in_array($active, $settings)?'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                Settings
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item}}" >
                <a href="{{route('company.index')}}" class="nav-link {{$active=='company'?'active':''}}" >
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Company info</p>
                </a>
              </li>
              <li class="nav-item}}" >
                <a href="{{route('category.index')}}" class="nav-link {{$active=='category'?'active':''}}" >
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Categories</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('user.index')}}" class="nav-link {{$active=='user'?'active':''}}">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Users</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('role.index')}}" class="nav-link {{$active=='role'?'active':''}}" >
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Roles</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>