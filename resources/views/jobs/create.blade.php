@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add Job</div>
                <div class="card-body">
                <div class="row">
            <div class="col-md-6 offset-md-3">
            @if($message = Session::get('danger'))
            <div class="alert alert-danger">
                <strong>{{ $message }}</strong>
            </div>
            @endif
            <form action="{{ action('JobController@store') }}" method="post">
            @csrf
            <div class="form-group">
                <label>Job Title</label>
                <input type="text" name="title" placeholder="Title"/>
            </div> 
            <div class="form-group">
          <label for="date">Date</label>
          <input name="date" type="date" class="form-control"></input>
        </div>
        <div class="form-group">
          <label for="description">Report's Description</label>
          <textarea name="description" class="form-control"></textarea>
        </div>
            <div class="form-group">
                <label>Car Mileage</label>
                <input type="text" name="car_mileage" placeholder="Car Mileage"/>
            </div>
            <button class="btn btn-primary" type="submit">Submit</button>
            </form>
          </div>  
          </div>
            </div>
        </div>
    </div>
</div>
@endsection