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
    </div>
</div>
@endsection 