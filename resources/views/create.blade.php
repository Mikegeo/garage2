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
            <form action="{{ action('CarController@store') }}" method="post">
            @csrf
            <div class="form-group">
                <label>Car Registration Number</label>
                <input type="text" name="Car_reg_no" placeholder="Car_Reg_No"/>
            </div> 
            <div class="form-group">
                <label>Car Make</label>
                <input type="text" name="Car_Maker" placeholder="Car_Make"/>
            </div>
            <div class="form-group">
                <label>Customer's Name</label>
                <input type="text" name="Cust_Name" placeholder="Customer's Name"/>
            </div>   
            <div class="form-group">
                <label>Customer's Address</label>
                <input type="text" name="Cust_Adr" placeholder="Customer's Address"/>
            </div>
            <div class="form-group">
                <label>Customer's Telephone</label>
                <input type="text" name="Cust_Tele" placeholder="Customer's Telephone"/>
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