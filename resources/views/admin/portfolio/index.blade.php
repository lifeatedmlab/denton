@extends('layouts.admin.app')
@section('title', 'Portfolio')
@section('header')
<div class="row align-items-center py-4">
    <div class="col-lg-6 col-7">
        <h6 class="h2 text-white d-inline-block mb-0">EDE Laboratory</h6>
        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><a href="{{ route('index') }}"><i class="fas fa-home"></i></a></li>
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Portfolios</li>
            </ol>
        </nav>
    </div>
    <div class="col-lg-6 col-5 text-right">
        <a href="{{ route('portfolio.create') }}" class="btn btn-md btn-neutral">New Portfolio</a>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <!-- Card header -->
            <div class="card-header">
                <h3 class="mb-0">Portfolio List</h3>
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
                            <th class="text-center">Image</th>
                            <th>Name</th>                            
                            <th>Description</th>
                            <th>Year</th>
                            <th>Link</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th class="text-center">Image</th>
                            <th>Name</th>                            
                            <th>Description</th>
                            <th>Year</th>
                            <th>Link</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($portfolios as $portfolio)
                        <tr>
                            <td>{{ $loop->iteration }}</td>                            
                            <td class="text-center">
                                <img src="{{ Storage::url('public/images/'.$portfolio->image )}}" alt="{{ $portfolio->image }}" width="250px" height="200px">
                            </td>
                            <td>{{ $portfolio->name }}</td>
                            <td class="text-wrap">{{ $portfolio->description }}</td>
                            <td>{{ $portfolio->year }}</td>
                            <td><a href="http://{{ $portfolio->link }}">{{ $portfolio->link }}</a></td>
                            <td class="text-center">
                                <form action="{{ route('portfolio.destroy', $portfolio->id) }}" onsubmit="return confirm('Are you sure you want to delete it?')" method="POST">
                                    <a href="{{ route('portfolio.edit', $portfolio->id) }}" class="btn btn-primary btn-sm">Update</a>
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" type="submit">Delete</button>
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
