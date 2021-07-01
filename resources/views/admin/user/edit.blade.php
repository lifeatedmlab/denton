@extends('layouts.admin.app')
@section('title', 'Edit Member')
@section('header')
<div class="row align-items-center py-4">
    <div class="col-lg-6 col-7">
        <h6 class="h2 text-white d-inline-block mb-0">EDE Laboratory</h6>
        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><a href="{{ route('index') }}"><i class="fas fa-home"></i></a></li>
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('user.index') }}">Member</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Member</li>
            </ol>
        </nav>
    </div>
    <div class="col-lg-6 col-5 text-right">
        <a href="{{ route('user.index') }}" class="btn btn-md btn-neutral"><< Member List</a>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <!-- Card header -->
            <div class="card-header">
                <h3 class="mb-0">Edit User Information</h3>
            </div>
            <!-- Card body -->
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

                <form action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-row">
                        <div class="col mb-3">
                            <label class="form-control-label" for="name">Full Name</label>
                            <input type="text" class="form-control text-dark" value="{{ old('name',$user->name) }}" id="name" name="name" placeholder="The new user full name" required>
                        </div>
                        <div class="col mb-3">
                            <label class="form-control-label" for="code">User Code</label>
                            <input type="text" class="form-control text-dark" value="{{ old('code',$user->code) }}" id="code" name="code" placeholder="The new user code" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col mb-3">
                            <label class="form-control-label" for="nim">Nim</label>
                            <input type="text" class="form-control text-dark" value="{{ old('nim',$user->nim) }}" id="nim" name="nim"  placeholder="The new user nim" required>
                        </div>
                        <div class="col mb-3">
                            <label class="form-control-label" for="generation">Generation</label>
                            <select class="form-control text-dark" id="generation" name="generation" required>
                                <option value="1st Generation" {{ "1st Generation" == $user->generation ? 'selected' : '' }}>1st Generation</option>
                                <option value="2nd Generation" {{ "2nd Generation" == $user->generation ? 'selected' : '' }}>2nd Generation</option>
                                <option value="3rd Generation" {{ "3rd Generation" == $user->generation ? 'selected' : '' }}>3rd Generation</option>
                                <option value="4th Generation" {{ "4th Generation" == $user->generation ? 'selected' : '' }}>4th Generation</option>
                                <option value="5th Generation" {{ "5th Generation" == $user->generation ? 'selected' : '' }}>5th Generation</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-control-label" for="batch_year">Batch Year</label>
                                <input type="form-control text-dark" value="{{ old('batch_year', $user->batch_year) }}" class="form-control" name="batch_year" id="datepicker" />
                            </div>
                        </div>
                        <div class="col mb-3">
                            <label class="form-control-label" for="status">Status</label>
                            <select class="form-control text-dark" id="status" name="status" required>
                                <option value="active" {{"active" == $user->status ? 'selected' : ''}}>Active</option>
                                <option value="inactive" {{"inactive" == $user->status ? 'selected' : ''}}>Inactive</option>
                                <option value="graduate" {{"graduate" == $user->status ? 'selected' : ''}}>Graduate</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col mb-3">
                            <label class="form-control-label" for="sm_linkedin">LinkedIn</label>
                            <input type="text" class="form-control text-dark" id="sm_linkedin" value="{{ $user->socmed['linkedin'] ?? '' }}" name="sm_linkedin" placeholder="Linkedin username">
                        </div>
                        <div class="col mb-3">
                            <label class="form-control-label" for="sm_github">GitHub</label>
                            <input type="text" class="form-control text-dark" id="sm_github" value="{{ $user->socmed['github'] ?? '' }}" name="sm_github" placeholder="Github username">
                        </div>
                        <div class="col mb-3">
                            <label class="form-control-label" for="sm_instagram">Instagram</label>
                            <input type="text" class="form-control text-dark" id="sm_instagram" value="{{ $user->socmed['instagram'] ?? '' }}" name="sm_instagram" placeholder="Instagram username">
                        </div>
                    </div>
                    <div class='form-row'>
                        <div class="col mb-3">
                            <label class="form-control-label" for="email">Email</label>
                            <input type="email" class="form-control text-dark" id="email" name="email" value="{{ old('email',$user->email) }}" placeholder="The new user email" required>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-control-label" for="image">Profile Photo</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="image" name="image" value="{{ old('profile_photo_path', $user->profile_photo_path) }}">
                                    <label class="custom-file-label" for="image">Choose file</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col"></div>
                        <div class="col">
                            <button class="btn btn-block btn-primary" name="sumit">Update</button>
                        </div>
                        <div class="col"></div>
                    </div>
                </form>
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