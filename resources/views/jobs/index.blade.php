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