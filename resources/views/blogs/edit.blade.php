@extends('blogs.layout')

@section('content')
<div class="container jumbotron">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Edit Form</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('blogs.index') }}"> Back</a>
                </div>
            </div>


            @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Warning!</strong> Please check input field code<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="{{ route('blogs.update',$blog->id) }}" method="POST">
                <!-- @method('PUT')
                @csrf     -->
                {{ csrf_field() }}

                <input type="hidden" name="_method" value="PUT">
                <div class="form-group">
                    <label>FirstName</label>
                    <input type="text" class="form-control" name="firstname" value="{{ $blog->firstname }}" placeholder="Enter FirstName">
                </div>
                <div class="form-group">
                    <label>LastName</label>
                    <input type="text" class="form-control" name="lastname" value="{{ $blog->lastname }}" placeholder="Enter LastName">
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <textarea class="form-control" name="address" placeholder="Enter your address">{{ $blog->address }}</textarea>
                </div>
                <div class="form-group">
                    <label>MobileNo</label>
                    <input type="number" class="form-control" name="mono" value="{{ $blog->mono }}" placeholder="Enter MobileNo">
                </div>
                <div class="form-group">
                    <label>Zipcode</label>
                    <input type="text" class="form-control" name="zipcode" value="{{ $blog->zipcode }}" placeholder="Enter Zipcode">
                </div>
                <div class="form-group">
                    <label>City</label>
                    <input type="text" class="form-control" name="city" value="{{ $blog->city }}" placeholder="Enter CityName">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>

            </form>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>
@endsection