@extends('layouts.app')

@section('content')

@if ($message = Session::get('success'))
    <div class="alert alert-seccess">
        <p> {{ $message }} </p>
    </div>
@endif
<div class="container">
    <div class="row justify-content-center">
<div class="row">
        <h1>Johns Garage</h1>
    <div class="col-md-8">
        <a href="{{ action('CarController@create') }}" class="btn btn-primary"> Add Car</a>
    </div>
</div>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Car Registration Number</th>
            <th>Car's Make</th>
            <th>Customer's Name</th>
            <th>Customer's Address</th>
            <th>Customer's Telephone</th>
        </tr>
    </thead>
    <tbody>
    @foreach($cars as $car)
    <tr>
        <td>{{ $car->Car_reg_no }}</td>
        <td>{{ $car->Car_Maker }}</td>
        <td>{{ $car->Cust_Name}}</td>
        <td>{{ $car->Cust_Adr}}</td>
        <td>{{ $car->Cust_Tele}}</td>
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
{{ $cars->links() }}
</div>
</div>
@endsection