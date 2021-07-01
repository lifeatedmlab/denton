@extends('layouts.admin.app')
@section('title', 'Member')
@section('header')
<div class="row align-items-center py-4">
    <div class="col-lg-6 col-7">
        <h6 class="h2 text-white d-inline-block mb-0">EDE Laboratory</h6>
        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><a href="{{ route('index') }}"><i class="fas fa-home"></i></a></li>
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Member</li>
            </ol>
        </nav>
    </div>
    <div class="col-lg-6 col-5 text-right">
        <a href="{{ route('member.create') }}" class="btn btn-md btn-neutral">Add Member</a>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h3 class="mb-0">Member List</h3>
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
                            <th>Position</th>
                            <th>Generation</th>
                            <th>Batch Year</th>
                            <th>Status</th>
                            <th>Social Media</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($members as $member)
                    <tr>
                        <td class="text-center">{{ ++$i }}</td>
                        <td>{{ $member->name }}</td>
                        <td>{{ $member->code }}</td>
                        <td>{{ $member->position }}</td>
                        <td>{{ $member->generation }}</td>
                        <td>{{ $member->batch_year }}</td>
                        <td>{{ $member->status }}</td>
                        <td>
                            {{-- check if member don't have any social media --}}
                            @if (count(array_filter($member->socmed)) == 0) 
                                <p class="text-center text-secondary">no data</p>
                            @else
                            <ul>
                                @if ($member->socmed['linkedin'])
                                        <li><a href="http://linkedin.com/in/{{ $member->socmed['linkedin'] }}" target="_blank">LinkedIn</a></li>
                                    @endif
                                    @if ($member->socmed['github'])
                                        <li><a href="http://github.com/{{ $member->socmed['github'] }}" target="_blank">GitHub</a></li>
                                    @endif
                                    @if ($member->socmed['instagram'])
                                        <li><a href="http://instagram.com/{{ $member->socmed['instagram'] }}" target="_blank">Instagram</a></li>
                                    @endif
                                @endif
                            </ul>
                        </td>
                        <td class="text-center">
                            <form action="{{ route('member.destroy', $member->id) }}" method="POST">
                                <a class="btn btn-primary btn-sm" href="{{ route('member.edit', $member->code) }}">Edit</a>

                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
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