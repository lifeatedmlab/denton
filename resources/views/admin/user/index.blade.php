@extends('layouts.admin.app')
@section('title', 'User')
@section('header')
<div class="row align-items-center py-4">
    <div class="col-lg-6 col-7">
        <h6 class="h2 text-white d-inline-block mb-0">EDE Laboratory</h6>
        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><a href="{{ route('index') }}"><i class="fas fa-home"></i></a></li>
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">User</li>
            </ol>
        </nav>
    </div>
    <div class="col-lg-6 col-5 text-right">
        <a href="{{ route('user.create') }}" class="btn btn-md btn-neutral">Add User</a>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h3 class="mb-0">User List</h3>
            </div>
            
            @if ($message = Session::get('success'))
            <div class="card-body">
                <div class="alert alert-success">
                    <h2>{{ $message }}</h2>
                </div>
            </div>
            @endif

            <div class="table-responsive py-4">
                <table class="table table-flush" id="datatable-basic">
                    <thead class="thead-light">
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Code</th>
                            <th>Nim</th>
                            <th>Generation</th>
                            <th>Batch Year</th>
                            <th>Status</th>
                            <th>Social Media</th>
                            <th>Email</th>
                            <th>Profile Photo Path</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td class="text-center">{{ ++$i }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->code }}</td>
                        <td>{{ $user->nim }}</td>
                        <td>{{ $user->generation }}</td>
                        <td>{{ $user->batch_year }}</td>
                        <td>{{ $user->status }}</td>
                        <td>
                            {{-- check if member don't have any social media --}}
                            @if (count(array_filter($user->socmed)) == 0) 
                                <p class="text-center text-secondary">no data</p>
                            @else
                            <ul>
                                @if ($user->socmed['linkedin'])
                                        <li><a href="http://linkedin.com/in/{{ $user->socmed['linkedin'] }}" target="_blank">LinkedIn</a></li>
                                    @endif
                                    @if ($user->socmed['github'])
                                        <li><a href="http://github.com/{{ $user->socmed['github'] }}" target="_blank">GitHub</a></li>
                                    @endif
                                    @if ($user->socmed['instagram'])
                                        <li><a href="http://instagram.com/{{ $user->socmed['instagram'] }}" target="_blank">Instagram</a></li>
                                    @endif
                                @endif
                            </ul>
                        </td>
                        <td>{{ $user->email }}</td>
                        <td class="text-center">
                                <img src="{{ Storage::url('public/images/profile/'.$user->profile_photo_path )}}" alt="{{ $user->profile_photo_path }}" width="250px" height="200px">
                        </td>
                        <td class="text-center">
                            <form action="{{ route('user.destroy', $user->id) }}" onsubmit="return confirm('Are you sure you want to delete it?')" method="POST">
                                <a class="btn btn-primary btn-sm" href="{{ route('user.edit', $user->code) }}">Edit</a>

                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" type="submit" >Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach     
                    </tbody>
                </table>
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