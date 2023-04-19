@extends('layouts.front')

@section('title')
    Checkout
@endsection

@section('content')

<div class ="container mt-5">
    <form action="{{url('place-order')}}" method="POST">
        @csrf
    <div class="row">
        <div class="col-md-7">
            <div class="card">
                <div class="card-body">
                     <h6> Basic Details</h6>
                     <hr>
                    <div class="row checkout-form">
                        <div class ="col-md-6">
                            <label for="">First Name</label>
                            <input type="text" class="form-control" value="{{Auth::user()->name}}" name="fname" placeholder="Enter First Name">
                        </div>
                        
                        <div class ="col-md-6">
                            <label for="">Last Name</label>
                            <input type="text" class="form-control" value="{{Auth::user()->lname}}" name="lname" placeholder="Enter Last Name">
                        </div>
                        <div class ="col-md-6">
                            <label for="">Email</label>
                            <input type="text" class="form-control" value="{{Auth::user()->email}}" name="email" placeholder="Enter Email">
                        </div>
                        <div class ="col-md-6">
                            <label for="">Phone number</label>
                            <input type="text" class="form-control" value="{{Auth::user()->phone}}" name="phone" placeholder="Enter phone number">
                        </div>
                        <div class ="col-md-6">
                            <label for="">Address</label>
                            <input type="text" class="form-control"  value="{{Auth::user()->address}}" name="address" placeholder="Enter Address">
                        </div>
                        <div class ="col-md-6">
                            <label for="">City</label>
                            <input type="text" class="form-control" value="{{Auth::user()->city}}" name="city" placeholder="Enter City">
                        </div>
                        <div class ="col-md-6">
                            <label for="">State</label>
                            <input type="text" class="form-control" value="{{Auth::user()->state}}" name="state" placeholder="Enter state">
                        </div>
                        <div class ="col-md-6">
                            <label for="">Country</label>
                            <input type="text" class="form-control" value="{{Auth::user()->country}}" name="country" placeholder="Enter country">
                        </div>
                        <div class ="col-md-6">
                            <label for="">Pincode</label>
                            <input type="text" class="form-control" value="{{Auth::user()->pincode}}" name="pincode" placeholder="Enter pincode">
                        </div>

                    </div>
                </div>
            </div>
        </div>
    <div class="col-md-5">
            <div class="card">
                <div class="card-body">
                     <h6>Order Details</h6>
                     <hr>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        @foreach($cartitems as $item)
                        <tr>
                            <td>{{$item->products->name}}</td>
                            <td>{{$item->products->selling_price}}</td>
                        </tr>
                        @endforeach
                           
                        </tbody>
                    </table>
                    <hr>
                    <button type = "submit" class="btn btn-success float-end w-100">Place Order</button>
                    <button type ="button" class="btn btn-primary mt-3 float-end w-100">Pay with Paypal</button>

                </div>
            </div>
    </div>
</form>
</div>
@endsection