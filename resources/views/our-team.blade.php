@extends('layouts.app')
@section('title', 'Our Team')
@section('content')
<!--header-->
<section id="header-section">
    <div class="container">
        <div class="row pt-3">
            <div class="col-12">
                <h1 class="mt-5" data-aos="fade-down" data-aos-duration="2000">
                    Meet our team! 💗
                </h1>
                <p class="mt-5" data-aos="fade-down" data-aos-duration="3000">
                    a freaking awesome one!
                </p>
            </div>
        </div>
    </div>
</section>

<section class="our-team-section" id="2020-2021">
    <div class="container">
        <div class="row pt-5">
            <h3 class="section-header mt-5 pt-5 w-100">
                2020-2021
            </h3>
            <p>
                meet our laboratory asistant first!
            </p>
        </div>
        <div class="row mt-2">
            <div class="col-lg-6 col-md-6 col-sm-1">
                <div class="card our-team-card">
                    <img alt="" src="{{ asset('images/our-team/nan.jpg') }}">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-1">
                <div class="card our-team-card">
                    <img alt="" src="{{ asset('images/our-team/rdy.jpg') }}">
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-lg-4 col-md-4 col-sm-1">
                <div class="card our-team-card">
                    <img alt="" src="{{ asset('images/our-team/ilm.jpg') }}">
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-1">
                <div class="card our-team-card">
                    <img alt="" src="{{ asset('images/our-team/saz.jpg') }}">
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-1">
                <div class="card our-team-card">
                    <img alt="" src="{{ asset('images/our-team/fen.jpg') }}">
                </div>
            </div>
        </div>
        <div class="row pt-5">
            <p>
                and dont forget about the staff 🤍
            </p>
        </div>
        <div class="row px-5 card-table">
            <table class="table table-borderless">
                <thead>
                    <tr>
                        <th scope="col">
                            MEMBER CODE
                        </th>
                        <th scope="col">
                            NAME
                        </th>
                        <th scope="col">
                            DIVISION
                        </th>
                        <th scope="col">
                            POSITION
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            TEM
                        </td>
                        <td>
                            ANDHIKA WICAKSANA
                        </td>
                        <td>
                            CREATIVE 🎨
                        </td>
                        <td class="head-of-division">
                            CREATIVE DIRECTOR
                        </td>
                    </tr>
                    <tr>
                        <td>
                            TEM
                        </td>
                        <td>
                            ANDHIKA WICAKSANA
                        </td>
                        <td>
                            CREATIVE 🎨
                        </td>
                        <td>
                            MEMBER
                        </td>
                    </tr>
                    <tr>
                        <td>
                            TEM
                        </td>
                        <td>
                            ANDHIKA WICAKSANA
                        </td>
                        <td>
                            CREATIVE 🎨
                        </td>
                        <td>
                            MEMBER
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
</section>
<section class="our-team-section" id="2019-2020">
    <div class="container">
        <div class="row pt-5">
            <p class="mt-5">
                here our previous team.
            </p>
            <a class="text-decoration-none" href="">
                <h3 class="section-header w-100">
                    2019-2020
                </h3>
            </a>
            <a class="text-decoration-none" href="">
                <h3 class="section-header w-100">
                    2018-2019
                </h3>
            </a>
        </div>
    </div>
</section>
@endsection
