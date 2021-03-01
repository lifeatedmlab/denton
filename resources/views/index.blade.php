@extends('layouts.app')
@section('title', 'Home')
@section('content')
        <!--header-->
        <section id="header-section">
            <div class="container">
                <div class="row pt-5">
                    <div class="col-12">
                        <h1 class="mt-5" data-aos="fade-down" data-aos-duration="2000">
                            Hola, 👋 <br>
                            we are EDE Laboratory
                        </h1>
                        <p class="mt-5" data-aos="fade-down" data-aos-duration="3000">
                            a laboratory/ a study group/ a family
                        </p>
                        <button class="btn btn-ede p-4 mt-5" data-aos="fade-right" data-aos-duration="3000" href="#">
                            Get to Know Us
                        </button>
                    </div>
                </div>
            </div>
        </section>
    
        <!--activity-->
        <section id="activity-section">
            <div class="container">
                <div class="row mt-5 pt-5">
                    <h3 class="section-header mt-5 pt-5">
                        OUR ACTIVITIES
                    </h3>
                    <p>
                        you know like something we usually do, and we proud to do <i>haha</i>
                    </p>
                    <div class="col-sm-12 col-md-4 col-lg-4 d-flex justify-content-center mt-3">
                        <div class="activity-card d-flex justify-content-center" id="card-st">
                            <img alt="" class="align-self-center" src="{{ asset('images/st.png') }}">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-4 d-flex justify-content-center mt-3">
                        <div class="activity-card d-flex justify-content-center" id="card-hs">
                            <img alt="" class="align-self-center" src="{{ asset('images/hs.png') }}">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-4 d-flex justify-content-center mt-3">
                        <div class="activity-card d-flex justify-content-center" id="card-gwe">
                            <img alt="" class="align-self-center" src="{{ asset('images/gwe.png') }}">
                        </div>
                    </div>
                </div>
            </div>
        </section>
    
    
        <!--research-->
        <section id="research-section">
            <div class="container">
                <div class="row mt-4 pt-5">
                    <h3 class="section-header mt-5 pt-5">
                        OUR RESEARCHES
                    </h3>
                    <p>
                        a serious subject underneath, <i>*trust me</i>
                    </p>
                    <div class="col-sm-12 col-md-4 col-lg-4 mt-3">
                        <div class="research-card" style="height: 400px">
                            <a href="">
                                <h3 class="card-text-header mb-5">
                                    Analisis Perancangan Sistem Gambung
                                </h3>
                            </a>
                            <p class="card-text-body">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem cumque delectus doloribus et
                                facilis harum incidunt laboriosam laborum molestias nisi numquam odio perspiciatis, quas
                                soluta
                                tempora tempore totam veniam voluptates.
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-4 mt-3">
                        <div class="research-card" style="height: 400px">
                            <a href="">
                                <h3 class="card-text-header mb-5">
                                    Analisis Perancangan Sistem Gambung
                                </h3>
                            </a>
                            <p class="card-text-body">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem cumque delectus doloribus et
                                facilis harum incidunt laboriosam laborum molestias nisi numquam odio perspiciatis, quas
                                soluta
                                tempora tempore totam veniam voluptates.
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-4 mt-3">
                        <div class="research-card" style="height: 400px">
                            <a href="">
                                <h3 class="card-text-header mb-5">
                                    Analisis Perancangan Sistem Gambung
                                </h3>
                            </a>
                            <p class="card-text-body">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem cumque delectus doloribus et
                                facilis harum incidunt laboriosam laborum molestias nisi numquam odio perspiciatis, quas
                                soluta
                                tempora tempore totam veniam voluptates.
                            </p>
                        </div>
                    </div>
                    <div class="col-12 mt-4">
                        <a class="arrow-right" href=""><img alt="" src="{{ asset('images/arrow-right.png') }}"></a>
                    </div>
                </div>
            </div>
        </section>
    
        <!--galery-->
        <section id="galery-section">
            <div class="container">
                <div class="row mt-2 pt-5">
                    <h3 class="section-header mt-5">
                        GALERY
                    </h3>
                    <p>
                        <i>*cekrek cekrek 📸</i>
                    </p>
                    <section class="galery">
                        <img src="{{ asset('images/galery/1.jpg') }}">
                        <img src="{{ asset('images/galery/2.JPG') }}">
                        <img src="{{ asset('images/galery/3.JPG') }}">
                        <img src="{{ asset('images/galery/4.jpg') }}">
                        <img src="{{ asset('images/galery/2.JPG') }}">
                    </section>
                </div>
            </div>
        </section>
@endsection