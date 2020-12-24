@extends('blogs.layout')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Display Users Details</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('blogs.create') }}"> Create new User</a>
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
        <th>No</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Address</th>
        <th>MoNo</th>
        <th>ZipCode</th>
        <th>City</th>
        <th colspan = 2>Actions</th>
    </tr>
    @foreach ($blogs as $blog)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $blog->firstname}}</td>
        <td>{{ $blog->lastname }}</td>
        <td>{{ $blog->address }}</td>
        <td>{{ $blog->mono }}</td>
        <td>{{ $blog->zipcode }}</td>
        <td>{{ $blog->city }}</td>
        <td>
            <a class="btn btn-primary" href="{{ route('blogs.edit',$blog->id) }}">Edit</a></td>
            <td> <form action="{{ route('blogs.destroy',$blog->id) }}" method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

{!! $blogs->links() !!}

@endsection