@extends('layouts.app')
@section('title', 'Portfolio')
@section('content')
    <!--header-->
<section id="header-section">
    <div class="container">
        <div class="row pt-3">
            <div class="col-12">
                <h1 class="mt-5" data-aos="fade-down" data-aos-duration="2000">
                    Our Best Creation 💫
                </h1>
                <p class="mt-5" data-aos="fade-down" data-aos-duration="3000">
                    *so far, and keep updating
                </p>
            </div>
        </div>
    </div>
</section>

<section class="portfolio-section" id="2020-2021">
    <div class="container">
        <div class="row pt-5">
            <div class="col-lg-3 col-md-3 col-sm-6 mt-3" data-aos="fade-up" data-aos-duration="3000">
                <a class="text-decoration-none portfolio-a" href="">
                    <div class="card portfolio-card d-flex justify-content-center">
                        <img alt="" class="align-self-center" src="{{ asset('images/st.png') }}">
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 mt-3" data-aos="fade-up" data-aos-duration="3000">
                <a class="text-decoration-none portfolio-a" href="">
                    <div class="card portfolio-card d-flex justify-content-center">
                        <img alt="" class="align-self-center" src="{{ asset('images/st.png') }}">
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 mt-3" data-aos="fade-up" data-aos-duration="3000">
                <a class="text-decoration-none portfolio-a" href="">
                    <div class="card portfolio-card d-flex justify-content-center">
                        <img alt="" class="align-self-center" src="{{ asset('images/st.png') }}">
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 mt-3" data-aos="fade-up" data-aos-duration="3000">
                <a class="text-decoration-none portfolio-a" href="">
                    <div class="card portfolio-card d-flex justify-content-center">
                        <img alt="" class="align-self-center" src="{{ asset('images/st.png') }}">
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 mt-3" data-aos="fade-up" data-aos-duration="3000">
                <a class="text-decoration-none portfolio-a" href="">
                    <div class="card portfolio-card d-flex justify-content-center">
                        <img alt="" class="align-self-center" src="{{ asset('images/st.png') }}">
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 mt-3" data-aos="fade-up" data-aos-duration="3000">
                <a class="text-decoration-none portfolio-a" href="">
                    <div class="card portfolio-card d-flex justify-content-center">
                        <img alt="" class="align-self-center" src="{{ asset('images/st.png') }}">
                    </div>
                </a>
            </div>

        </div>
    </div>
</section>

@endsection