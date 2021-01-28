<!DOCTYPE html>
<html>
<head>
    <title>Members | EDE Laboratory</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>EDE Laboratory Members</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('members.create') }}">Add Member</a>
            </div>
        </div>
    </div>
 
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
 
    <table class="table table-bordered">
        <tr>
            <th class="text-center">No</th>
            <th>Name</th>
            <th>Code</th>
            <th>Position</th>
            <th>Generation</th>
            <th>Batch Year</th>
            <th>Status</th>
            <th>Social Media</th>
            <th class="text-center">Action</th>
        </tr>
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
                <form action="{{ route('members.destroy', $member->id) }}" method="POST">
                    <a class="btn btn-primary btn-sm" href="{{ route('members.edit', $member->code) }}">Edit</a>

                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    {!! $members->links() !!}

</div>

</body>
</html>