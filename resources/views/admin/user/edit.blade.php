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
                <li class="breadcrumb-item"><a href="{{ route('member.index') }}">Member</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Member</li>
            </ol>
        </nav>
    </div>
    <div class="col-lg-6 col-5 text-right">
        <a href="{{ route('member.index') }}" class="btn btn-md btn-neutral"><< Member List</a>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <!-- Card header -->
            <div class="card-header">
                <h3 class="mb-0">Edit Member Information</h3>
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

                <form action="{{ route('member.update', $member->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" value="{{ $member->id }}">
                    <div class="form-row">
                        <div class="col mb-3">
                            <label class="form-control-label" for="name">Full Name</label>
                            <input type="text" class="form-control text-dark" id="name" name="name" value="{{ $member->name }}" placeholder="The new member full name" required>
                        </div>
                        <div class="col mb-3">
                            <label class="form-control-label" for="code">Member Code</label>
                            <input type="text" class="form-control text-dark" id="code" name="code" value="{{ $member->code }}" placeholder="The new member code" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col mb-3">
                            <label class="form-control-label" for="position">Position</label>
                            <input type="text" class="form-control text-dark" id="position" name="position" value="{{ $member->position }}" placeholder="The new member position" required>
                        </div>
                        <div class="col mb-3">
                            <label class="form-control-label" for="generation">Generation</label>
                            <select class="form-control text-dark" id="generation" name="generation" required>
                                <option value="1st Generation" {{ "1st Generation" == $member->generation ? 'selected' : '' }}>1st Generation</option>
                                <option value="2nd Generation" {{ "2nd Generation" == $member->generation ? 'selected' : '' }}>2nd Generation</option>
                                <option value="3rd Generation" {{ "3rd Generation" == $member->generation ? 'selected' : '' }}>3rd Generation</option>
                                <option value="4th Generation" {{ "4th Generation" == $member->generation ? 'selected' : '' }}>4th Generation</option>
                                <option value="5th Generation" {{ "5th Generation" == $member->generation ? 'selected' : '' }}>5th Generation</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col mb-3">
                            <label class="form-control-label" for="batch_year">Batch Year</label>
                            <select class="form-control text-dark" id="batch_year" name="batch_year" required>
                                <option value="2018" {{ "2018" == $member->batch_year ? 'selected' : '' }}>2018</option>
                                <option value="2019" {{ "2019" == $member->batch_year ? 'selected' : '' }}>2019</option>
                                <option value="2020" {{ "2020" == $member->batch_year ? 'selected' : '' }}>2020</option>
                                <option value="2021" {{ "2021" == $member->batch_year ? 'selected' : '' }}>2021</option>
                                <option value="2022" {{ "2022" == $member->batch_year ? 'selected' : '' }}>2022</option>
                            </select>
                        </div>
                        <div class="col mb-3">
                            <label class="form-control-label" for="status">Batch Year</label>
                            <select class="form-control text-dark" id="status" name="status" required>
                                <option value="active" {{ "active" == $member->status ? 'selected' : '' }}>Active</option>
                                <option value="inactive" {{ "inactive" == $member->status ? 'selected' : '' }}>Inactive</option>
                                <option value="graduate" {{ "graduate" == $member->status ? 'selected' : '' }}>Graduate</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col mb-3">
                            <label class="form-control-label" for="sm_linkedin">LinkedIn</label>
                            <input type="text" class="form-control text-dark" id="sm_linkedin" name="sm_linkedin" value="{{ $member->socmed['linkedin'] ?? '' }}" placeholder="Linkedin username">
                        </div>
                        <div class="col mb-3">
                            <label class="form-control-label" for="sm_github">GitHub</label>
                            <input type="text" class="form-control text-dark" id="sm_github" name="sm_github" value="{{ $member->socmed['github'] ?? '' }}" placeholder="Github username">
                        </div>
                        <div class="col mb-3">
                            <label class="form-control-label" for="sm_instagram">Instagram</label>
                            <input type="text" class="form-control text-dark" id="sm_instagram" name="sm_instagram" value="{{ $member->socmed['instagram'] ?? '' }}" placeholder="Instagram username">
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
<link rel="stylesheet" href="{{asset('assets/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css')}}">
@endpush

@push('js')
<script src="{{asset('assets/vendor/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/vendor/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/vendor/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/vendor/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('assets/vendor/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
<script src="{{asset('assets/vendor/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('assets/vendor/datatables.net-select/js/dataTables.select.min.js')}}"></script>
@endpush