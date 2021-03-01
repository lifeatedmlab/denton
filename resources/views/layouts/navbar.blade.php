<section id="navbar-section">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-transparent ede-nav">
            <div class="container-fluid p-0">
                <a class="navbar-brand d-none d-sm-block pt-3" href="#"><img alt=""
                        src="{{ asset('images/ede-logo-potrait.png') }}" width="75px"></a>
                <a class="navbar-brand d-sm-none d-block p-3" href="#"><img alt=""
                        src="{{ asset('images/ede-logo-square.png') }}" width="50px"></a>
                <button aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"
                    class="navbar-toggler" data-bs-target="#navbarNav" data-bs-toggle="collapse" type="button">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item">
                            <a aria-current="page" class="nav-link {{ Request::is('/') ? 'active':'' }}" href="{{ route('index') }}">HOME</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('about') ? 'active':'' }}" href="#">ABOUT</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('our-team') ? 'active':'' }}" href="{{ route('our-team') }}">OUR TEAM</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">ACHIEVEMENT</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('portfolio') }}">PORTFOLIO</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">BLOG</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</section>