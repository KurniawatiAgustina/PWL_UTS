<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{ asset('assets/index3.html') }}" class="brand-link">
      <img src="{{ asset('assets/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <style>
        .main-sidebar { background-color: rgb(57, 111, 165) !important}
    </style>
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
              <img src="{{ asset('assets/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
              <a href="#" class="d-block">Username</a>
          </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
          <div class="input-group" data-widget="sidebar-search">
              <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                  <button class="btn btn-sidebar">
                      <i class="fas fa-search fa-fw"></i>
                  </button>
              </div>
          </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <!-- Add icons to the links using the .nav-icon class
                   with font-awesome or any other icon font library -->
              <li class="nav-item">
                  <a href="{{ url('/dashboard') }}" class="nav-link">
                      <i class="nav-icon fas fa-tachometer-alt"></i>
                      <p>
                          Dashboard
                      </p>
                  </a>
              </li>
              <li class="nav-item">
                  <a href="{{ url('/pegawai') }}" class="nav-link">
                      <i class="nav-icon fas fa-book"></i>
                      <p>Data Pegawai</p>
                  </a>
              </li>
              <li class="nav-item">
                  <a href="{{ url('/film') }}" class="nav-link">
                      <i class="nav-icon fas fa-file"></i>
                      <p>Data Film</p>
                  </a>
              </li>

              <li class="nav-item">
                <a href="{{ url('/logout') }}" class="nav-link">
                    <i class="nav-icon fas fa-file"></i>
                    <p>logout</p>
                </a>
            </li>
          </ul>
      </nav>
      <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
