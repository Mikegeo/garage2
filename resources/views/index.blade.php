@extends('layouts.app')

@section('content')

@if ($message = Session::get('success'))
    <div class="alert alert-seccess">
        <p> {{ $message }} </p>
    </div>
@endif
<div class="row">
    <div class="col-md-6">
        <h1>Johns Garage</h1>
    </div>
    <div class="col-md-6 text-right">
        <a href="{{ action('CarController@create') }}" class="btn btn-primary"> Add Car</a>
    </div>
</div>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Car Registration Number</th>
            <th>Car Maker</th>
            <th>Customer Name</th>
            <th>Customer Address</th>
            <th>Customer Telephone</th>
            <th>Car Mileage</th>
        </tr>
    </thead>
    <tbody>
    @foreach($cars as $car)
    <tr>
        <td>{{ $car->id }}</td>
        <td>{{ $car->Car_reg_no }}</td>
        <td>{{ $car->Car_Maker }}</td>
        <td>{{ $car->Cust_Name}}</td>
        <td>{{ $car->Cust_Adr}}</td>
        <td>{{ $car->Cust_Tele}}</td>
        <td>{{ $car->Car_Mileage}}</td>
        <td>
            <form action="{{ action ('CarController@destroy', $car->id) }} " method="post">
                <a href="{{ action ('CarController@show', $car->id) }}" class="btn btn-info">Show</a>
                <a href="{{ action ('CarController@edit', $car->id) }}" class="btn btn-warning">Update</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>    
    </tr>  
    @endforeach  
</table>
@endsection