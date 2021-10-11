
<nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header d-flex align-items-center">
        <a class="navbar-brand {{ Request::is('dashboard') ? 'active':''}} " href="{{route('dashboard')}}">
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
            <li class="nav-item">
              <a class="nav-link {{ Request::is('achievement') ? 'active':'' }}" href="{{ route('achievement.index') }}">              
                <i class="ni ni-folder-17 text-info"></i>
                <span class="nav-link-text">Achievements</span>
              </a>              
            </li>
            <li class="nav-item">
              <a class="nav-link {{ Request::is('batch_year') ? 'active':'' }}" href="{{ route('batch_year.index') }}">              
                <i class="ni ni-bullet-list-67 text-default"></i>
                <span class="nav-link-text">Batch Years</span>
              </a>              
            </li>
            <li class="nav-item">
              <a class="nav-link {{ Request::is('gallery') ? 'active':'' }}" href="{{ route('gallery.index') }}">              
                <i class="ni ni-planet text-orange"></i>
                <span class="nav-link-text">Galleries</span>
              </a>              
            </li>
            <li class="nav-item">
              <a class="nav-link {{ Request::is('user') ? 'active':'' }}" href="{{ route('user.index') }}">              
                <i class="ni ni-single-02 text-yellow"></i>
                <span class="nav-link-text">Users</span>
              </a>              
            </li>
          </ul>
          <!-- Divider -->
          <hr class="my-3">                
        </div>
      </div>
    </div>
  </nav>