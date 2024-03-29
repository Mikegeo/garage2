@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="width: 350px">
                @foreach($cars as $car)
                <div class="card-body">
                <div class="card-title">{{$car->Car_reg_no}}</div>
                <div class="card-text">{{$car->Car_Maker}}</div>
                <div class="card-text">{{$car->Cust_Name}}</div>
                <div class="card-text">{{$car->Cust_Adr}}</div>
                <div class="card-text">{{$car->Cust_Tele}}</div>
                <a href="{{action('CarController@index')}}" class="btn btn-primary">Back</a>
            </div>
            @endforeach
        </div>
        <table class="table table-bordered">
    <thead>
        <tr>
            <th>Job Title</th>
            <th>Date</th>
            <th>Description</th>
            <th>Car Mileage</th>
        </tr>
    </thead>
    <tbody>
    @foreach($jobs as $job)
    <tr>
        <td>{{ $job->title }}</td>
        <td>{{ $job->date }}</td>
        <td>{{ $job->description}}</td>
        <td>{{ $job->car_mileage}}</td>
        <td>
            <form action="{{ action ('JobController@destroy', $job->id) }} " method="post">
                <a href="{{ action ('JobController@show', $job->id) }}" class="btn btn-info">Show</a>
                <a href="{{ action ('JobController@edit', $job->id) }}" class="btn btn-warning">Update</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>    
    </tr>  
    @endforeach  
</table>
{{ $jobs->links() }}
    </div>
</div>
@endsection 