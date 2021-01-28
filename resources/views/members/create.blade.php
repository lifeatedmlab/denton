<!DOCTYPE html>
<html>
<head>
    <title>Add Member | EDE Laboratory</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Add New Member</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-secondary" href="{{ route('members.index') }}"> Back</a>
            </div>
        </div>
    </div>
    
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form action="{{ route('members.store') }}" method="POST">
        @csrf
        <div class="form-row">
            <div class="form-group col">
                <label for="name">Full Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="The new member's full name">
            </div>
            <div class="form-group col">
                <label for="code">Code</label>
                <input type="text" class="form-control" id="code" name="code" placeholder="The new member's code">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col">
                <label for="position">Position</label>
                <input type="text" class="form-control" id="position" name="position" placeholder="The new member's position">
            </div>
            <div class="form-group col">
                <label for="generation">Generation</label>
                <select id="generation" class="form-control" name="generation">
                    <option value="1st Generation">1st Generation</option>
                    <option value="2nd Generation">2nd Generation</option>
                    <option value="3rd Generation">3rd Generation</option>
                    <option value="4th Generation">4th Generation</option>
                    <option value="5th Generation">5th Generation</option>
                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col">
                <label for="batch_year">Batch Year</label>
                <select id="batch_year" class="form-control" name="batch_year">
                    <option value="2018">2018</option>
                    <option value="2019">2019</option>
                    <option value="2020">2020</option>
                    <option value="2021">2021</option>
                    <option value="2022">2022</option>
                </select>
            </div>
            <div class="form-group col">
                <label for="status">Active Status</label>
                <select id="status" class="form-control" name="status">
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                    <option value="graduate">Graduate</option>
                </select>
            </div>
        </div>
        <div class="form-row">
            <label>Social Media</label>
        </div>
        <div class="form-row">
            <div class="form-group col">
                <label for="sm_linkedin">LinkedIn</label>
                <input type="text" class="form-control" id="sm_linkedin" name="sm_linkedin" placeholder="Linkedin username">
            </div>
            <div class="form-group col">
                <label for="sm_github">GitHub</label>
                <input type="text" class="form-control" id="sm_github" name="sm_github" placeholder="Github username">
            </div>
            <div class="form-group col">
                <label for="sm_instagram">Instagram</label>
                <input type="text" class="form-control" id="sm_instagram" name="sm_instagram" placeholder="Instagram username">
            </div>
        </div>
        <button type="submit" name="submit" value="save" class="btn btn-primary">Save</button>
        <button type="submit" name="submit" value="add" class="btn btn-primary">Save and Add Another</button>
    </form>
</div>

</body>
</html>