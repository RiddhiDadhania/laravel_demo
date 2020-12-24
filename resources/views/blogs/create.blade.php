@extends('blogs.layout')
@section('content')
<div class="container jumbotron">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6"><h2>User Details Form</h2>
        
            @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Warning!</strong> Please check your input code<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="{{ route('blogs.store') }}" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <label>FirstName</label>
                    <input type="text" class="form-control" name="firstname" placeholder="Enter FirstName">
                </div>
                <div class="form-group">
                    <label>LastName</label>
                    <input type="text" class="form-control" name="lastname" placeholder="Enter LastName">
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <textarea class="form-control" name="address" placeholder="Enter your address"></textarea>
                </div>
                <div class="form-group">
                    <label>MobileNo</label>
                    <input type="tel" class="form-control" name="mono" placeholder="Enter MobileNo" >
                </div>
                <div class="form-group">
                    <label>Zipcode</label>
                    <input type="text" class="form-control" name="zipcode" placeholder="Enter Zipcode">
                </div>
                <div class="form-group">
                    <label>City</label>
                    <input type="text" class="form-control" name="city" placeholder="Enter CityName">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>

            </form>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>
@endsection