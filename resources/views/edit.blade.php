@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add car</div>
                 <div class="card-body">
                  <div class="row">
                    <div class="col-md-6 offset-md-3">
                    @if($message = Session::get('danger'))
                    <div class="alert alert-danger">
                    <strong>{{ $message }}</strong>
                   </div>
                   @endif
                   @foreach($cars as $car)
                    <form action="{{ action('CarController@update', $car->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Custumer's Name</label>
                            <input type="text" name="Cust_Name" class="form-control" value="{{ $car->Cust_Name }}">
                        </div>
                        <div class="form-group">
                            <label>Customer's Address</label>
                            <input type="text" name="Cust_Adr" class="form-control" value="{{ $car->Cust_Adr }}">
                        </div>
                        <div class="form-group">
                            <label>Customer's Telephone</label>
                            <input type="text" name="Cust_Tele" class="form-control" value="{{ $car->Cust_Tele }}">
                        </div>
                        <button type="submit" class="btn btn-warning">Update</button>
                        <a href="{{ action('CarController@index') }}" class="btn btn-default">Back</a>
                    </form>        
                   @endforeach

@endsection