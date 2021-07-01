@extends('layouts.admin.app')
@section('title', 'Add User')
@section('header')
<div class="row align-items-center py-4">
    <div class="col-lg-6 col-7">
        <h6 class="h2 text-white d-inline-block mb-0">EDE Laboratory</h6>
        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><a href="{{ route('index') }}"><i class="fas fa-home"></i></a></li>
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('user.index') }}">User</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add User</li>
            </ol>
        </nav>
    </div>
    <div class="col-lg-6 col-5 text-right">
        <a href="{{ route('user.index') }}" class="btn btn-md btn-neutral"><< User List</a>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <!-- Card header -->
            <div class="card-header">
                <h3 class="mb-0">Add New User</h3>
            </div>
            <!-- Card body -->
            <div class="card-body">
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <h2>{{ $message }}</h2>
                </div>
                @endif
                
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

                <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="col mb-3">
                            <label class="form-control-label" for="name">Full Name</label>
                            <input type="text" class="form-control text-dark" id="name" name="name" placeholder="The new user full name" required>
                        </div>
                        <div class="col mb-3">
                            <label class="form-control-label" for="code">User Code</label>
                            <input type="text" class="form-control text-dark" id="code" name="code" placeholder="Ex : NNN" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col mb-3">
                            <label class="form-control-label" for="nim">Nim</label>
                            <input type="text" class="form-control text-dark" id="nim" name="nim"  placeholder="The new user nim" required>
                        </div>
                        <div class="col mb-3">
                            <label class="form-control-label" for="generation">Generation</label>
                            <select class="form-control text-dark" id="generation" name="generation" required>
                                <option value="1st Generation">1st Generation</option>
                                <option value="2nd Generation">2nd Generation</option>
                                <option value="3rd Generation">3rd Generation</option>
                                <option value="4th Generation">4th Generation</option>
                                <option value="5th Generation">5th Generation</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-control-label" for="batch_year">Batch Year</label>
                                <input type="form-control text-dark" class="form-control" name="batch_year" id="datepicker" />
                            </div>
                        </div>
                        <div class="col mb-3">
                            <label class="form-control-label" for="status">Status</label>
                            <select class="form-control text-dark" id="status" name="status" required>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                                <option value="graduate">Graduate</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col mb-3">
                            <label class="form-control-label" for="sm_linkedin">LinkedIn</label>
                            <input type="text" class="form-control text-dark" id="sm_linkedin" name="sm_linkedin" placeholder="Linkedin username">
                        </div>
                        <div class="col mb-3">
                            <label class="form-control-label" for="sm_github">GitHub</label>
                            <input type="text" class="form-control text-dark" id="sm_github" name="sm_github" placeholder="Github username">
                        </div>
                        <div class="col mb-3">
                            <label class="form-control-label" for="sm_instagram">Instagram</label>
                            <input type="text" class="form-control text-dark" id="sm_instagram" name="sm_instagram" placeholder="Instagram username">
                        </div>
                    </div>
                    <div class='form-row'>
                        <div class="col mb-3">
                            <label class="form-control-label" for="email">Email</label>
                            <input type="email" class="form-control text-dark" id="email" name="email" placeholder="The new user email" required>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-control-label" for="image">Profile Photo</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="image" name="image" >
                                    <label class="custom-file-label" for="image">Choose file</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <button type="submit" name="submit" value="add" class="btn btn-block btn-primary">Save and Add Another</button>
                        </div>
                        <div class="col">
                            <button type="submit" name="submit" value="save" class="btn btn-block btn-default">Save</button>
                        </div>
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