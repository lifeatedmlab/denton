
<nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header d-flex align-items-center">
        <a class="navbar-brand" href="../../pages/dashboards/dashboard.html">
          <img src="../../assets/img/brand/blue.png" class="navbar-brand-img" alt="...">
        </a>
        <div class="ml-auto">
          <!-- Sidenav toggler -->
          <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
            <div class="sidenav-toggler-inner">
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
            </div>
          </div>
        </div>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link {{ Request::is('dashboard') ? 'active':'' }}" href="{{ route('dashboard') }}">
                <i class="ni ni-shop text-primary"></i>
                <span class="nav-link-text">Dashboard</span>
              </a>              
            </li>
            <li class="nav-item">
              <a class="nav-link {{ Request::is('member') ? 'active':'' }}" href="{{ route('member.index') }}">              
                <i class="fa fa-users text-danger"></i>
                <span class="nav-link-text">Members</span>
              </a>              
            </li>    
            <li class="nav-item">
              <a class="nav-link {{ Request::is('portfolio') ? 'active':'' }}" href="{{ route('portfolio.index') }}">              
                <i class="ni ni-folder-17 text-info"></i>
                <span class="nav-link-text">Portfolios</span>
              </a>              
            </li>            
          </ul>
          <!-- Divider -->
          <hr class="my-3">                
        </div>
      </div>
    </div>
  </nav>