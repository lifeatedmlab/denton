@extends('layouts.admin.app')
@section('title', 'Edit Profile')
@section('header')
<div class="row align-items-center py-4">
    <div class="col-lg-6 col-7">
        <h6 class="h2 text-white d-inline-block mb-0">EDE Laboratory</h6>
        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><a href="{{ route('index') }}"><i class="fas fa-home"></i></a></li>
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">My Profile</li>
            </ol>
        </nav>
    </div>
</div>
@endsection

@section('content')
<div class="header pb-6 d-flex align-items-center" style="min-height: 500px; background-image: url(../assets/img/theme/profile-cover.jpg); background-size: cover; background-position: center top;">
<span class="mask bg-gradient-default opacity-8"></span>
<div class="container-fluid d-flex align-items-center">
        <div class="row">
          <div class="col-lg-7 col-md-10">
            <h1 class="display-2 text-white">Hello {{Auth::user()->name}}</h1>
            <p class="text-white mt-0 mb-5">This is your profile page. You can see the progress you've made with your work and manage your projects or assigned tasks</p>
            <a href="#!" class="btn btn-neutral">Edit profile</a>
            
          </div>

        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col-xl-4 order-xl-2">
          <div class="card card-profile">
            <img src="../assets/img/theme/img-1-1000x600.jpg" alt="Image placeholder" class="card-img-top">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                  <a href="#">
                    <img src="{{ Storage::url('public/images/profile/'.Auth:: user()->profile_photo_path) }}" class="rounded-circle">
                  </a>
                </div>
              </div>
            </div>
            <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
              <div class="d-flex justify-content-between">
                <a href="#" class="btn btn-sm btn-info  mr-4 ">Connect</a>
                <a href="#" class="btn btn-sm btn-default float-right">Message</a>
              </div>
            </div>
            <div class="card-body pt-0">
              <div class="row">
                <div class="col">
                  <div class="card-profile-stats d-flex justify-content-center">
                    <div>
                      <span class="heading">22</span>
                      <span class="description">Friends</span>
                    </div>
                    <div>
                      <span class="heading">10</span>
                      <span class="description">Photos</span>
                    </div>
                    <div>
                      <span class="heading">89</span>
                      <span class="description">Comments</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="text-center">
                <h5 class="h3">
                    {{Auth::user()->name}}<span class="font-weight-light">, 27</span>
                </h5>
                <div class="h5 font-weight-300">
                  <i class="ni location_pin mr-2"></i>Bucharest, Romania
                </div>
                <div class="h5 mt-4">
                  <i class="ni business_briefcase-24 mr-2"></i>Solution Manager - Creative Tim Officer
                </div>
                <div>
                  <i class="ni education_hat mr-2"></i>University of Computer Science
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-8 order-xl-1">
          <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Edit profile </h3>
                </div>
                <div class="col-4 text-right">
                  <a href="#!" class="btn btn-sm btn-primary">Settings</a>
                </div>
              </div>
            </div>
            <div class="card-body">
            @if ($errors->any())
                <div class="row">
                    <div class="col">
                        <div class="alert alert-danger">
                            <h2>
                                <strong>Whoops!</strong> There were some problems with your input.
                            </h2>
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li class="text-default">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endif
            @if ($message = Session::get('success'))
            <div class="card-body">
                <div class="alert alert-success">
                    <h2>{{ $message }}</h2>
                </div>
            </div>
            @endif
            
                <form action="{{route('profile.update', Auth::user()->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <h6 class="heading-small text-muted mb-4">User information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="name">Full Name</label>
                        <input type="text" class="form-control text-dark" value="{{ Auth:: user()->name }}" id="name" name="name" placeholder="The new user full name" required>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="email">Email</label>
                        <input type="email" class="form-control text-dark" value="{{ Auth:: user()->email }}" id="email" name="email" placeholder="New Email" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="password">Password</label>
                        <input type="password" class="form-control text-dark" id="password" name="password" placeholder="New Password">
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4" />
                <!-- Address -->
                <h6 class="heading-small text-muted mb-4">General information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label" for="code">User Code</label>
                        <input type="text" class="form-control text-dark" value="{{ Auth:: user()->code }}" id="code" name="code" placeholder="The new user code" required>
                      </div>
                      <div class="form-group">
                        <label class="form-control-label" for="nim">Nim</label>
                        <input type="text" class="form-control text-dark" value="{{ Auth:: user()->nim }}" id="nim" name="nim"  placeholder="The new user nim" required>
                      </div>
                      <div class="form-group">
                        <label class="form-control-label" for="generation">Generation</label>
                        <select class="form-control text-dark" id="generation" name="generation" required>
                            <option value="1st Generation" {{ "1st Generation" == Auth::user()->generation ? 'selected' : '' }}>1st Generation</option>
                            <option value="2nd Generation" {{ "2nd Generation" == Auth::user()->generation ? 'selected' : '' }}>2nd Generation</option>
                            <option value="3rd Generation" {{ "3rd Generation" == Auth::user()->generation ? 'selected' : '' }}>3rd Generation</option>
                            <option value="4th Generation" {{ "4th Generation" == Auth::user()->generation ? 'selected' : '' }}>4th Generation</option>
                            <option value="5th Generation" {{ "5th Generation" == Auth::user()->generation ? 'selected' : '' }}>5th Generation</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label class="form-control-label" for="batch_year">Batch Year</label>
                        <input type="form-control text-dark" value="{{ Auth:: user()->batch_year }}" class="form-control" name="batch_year" id="datepicker" />
                      </div>
                      <div class="form-group">
                        <label class="form-control-label" for="status">Status</label>
                        <select class="form-control text-dark" id="status" name="status" required>
                            <option value="active" {{"active" == Auth::user()->status ? 'selected' : ''}}>Active</option>
                            <option value="inactive" {{"inactive" == Auth::user()->status ? 'selected' : ''}}>Inactive</option>
                            <option value="graduate" {{"graduate" == Auth::user()->status ? 'selected' : ''}}>Graduate</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <div class="form-row">
                          <div class="col mb-3">
                              <label class="form-control-label" for="sm_linkedin">LinkedIn</label>
                              <input type="text" class="form-control text-dark" id="sm_linkedin" value="{{  Auth::user()->socmed['linkedin'] ?? '' }}" name="sm_linkedin" placeholder="Linkedin username">
                          </div>
                          <div class="col mb-3">
                              <label class="form-control-label" for="sm_github">GitHub</label>
                              <input type="text" class="form-control text-dark" id="sm_github" value="{{  Auth::user()->socmed['github'] ?? '' }}" name="sm_github" placeholder="Github username">
                          </div>
                          <div class="col mb-3">
                              <label class="form-control-label" for="sm_instagram">Instagram</label>
                              <input type="text" class="form-control text-dark" id="sm_instagram" value="{{  Auth::user()->socmed['instagram'] ?? '' }}" name="sm_instagram" placeholder="Instagram username">
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="form-control-label" for="image">Profile Photo</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="image" name="image" value="{{ Auth:: user()->profile_photo_path }}">
                            <label class="custom-file-label" for="image">Choose file</label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <button class="btn btn-block btn-primary" type="submit" name="submit" >Update Profile</button> 
                </div>
            </div>
          </div>
        </div>
      </div>
@endsection

@push('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/css/datepicker.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{asset('assets/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css')}}">
@endpush

@push('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="https://netdna.bootstrapcdn.com/bootstrap/2.3.2/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/js/bootstrap-datepicker.min.js"></script>
<script>
$("#datepicker").datepicker( {
    format: "yyyy",
    startView: "years", 
    minViewMode: "years"
});</script>
<script src="{{asset('assets/vendor/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/vendor/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/vendor/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/vendor/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('assets/vendor/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
<script src="{{asset('assets/vendor/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('assets/vendor/datatables.net-select/js/dataTables.select.min.js')}}"></script>
@endpush