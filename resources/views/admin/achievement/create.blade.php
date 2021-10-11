@extends('layouts.admin.app')
@section('title', 'Add Achievement')
@section('header')
<div class="row align-items-center py-4">
    <div class="col-lg-6 col-7">
        <h6 class="h2 text-white d-inline-block mb-0">EDE Laboratory</h6>
        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><a href="{{ route('index') }}"><i class="fas fa-home"></i></a></li>
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('achievement.index') }}">Achievements</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add Achievements</li>
            </ol>
        </nav>
    </div>
    <div class="col-lg-6 col-5 text-right">
        <a href="{{ route('achievement.index') }}" class="btn btn-md btn-neutral">
            << Achievements List</a>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <!-- Card header -->
            <div class="card-header">
                <h3 class="mb-0">Add Achievements</h3>
            </div>
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
                
                <form action="{{ route('achievement.store') }}" method="post" enctype="multipart/form-data" id="form-achievement">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-control-label" for="name">Achievements Name</label>
                                <input class="form-control text-dark" placeholder="Name of achievements" type="text" id="name" name="name" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group" id="user">
                                <label class="form-control-label" for="user">User</label>
                                    <select class="form-control" data-toggle="select" name="user[]" multiple data-live-search="true" data-live-search-placeholder="Search ...">
                                        <optgroup label="Users">
                                        @foreach($users as $user)
                                            <option value="{{$user->id}}">{{$user->name}}</option>
                                        @endforeach
                                        </optgroup>
                                    </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-control-label" for="year">Achievement Year</label>
                                <input type="form-control text-dark" class="form-control" name="year" id="datepicker" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-control-label" for="image">Image</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="image" name="image" required>
                                    <label class="custom-file-label" for="image">Choose file</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label" for="description">Description</label>
                        <textarea class="form-control text-dark" id="description" name="description" rows="3" required></textarea>
                    </div>
                    <div class="row">
                        <div class="col">
                            <button type="submit" value="add" class="btn btn-primary btn-block" name="submit">Save and Add Another</button>
                        </div>
                        <div class="col">
                            <button type="submit" value="save" class="btn btn-default btn-block" name="submit">Save</button>
                        </div>
                    </div>
                </form>
            </div>
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
<link href="{{asset('assets/vendor/select2/dist/css/select2.min.css')}}" rel="stylesheet" />
@endpush

@push('js')

<script src="https://netdna.bootstrapcdn.com/bootstrap/2.3.2/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/js/bootstrap-datepicker.min.js"></script>
<script src="{{asset('assets/vendor/select2/dist/js/select2.min.js')}}"></script>
<script>
$("#datepicker").datepicker( {
    format: "yyyy",
    startView: "years", 
    minViewMode: "years"
});
</script>
<script src="{{asset('assets/vendor/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/vendor/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/vendor/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/vendor/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('assets/vendor/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
<script src="{{asset('assets/vendor/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('assets/vendor/datatables.net-select/js/dataTables.select.min.js')}}"></script>

@endpush