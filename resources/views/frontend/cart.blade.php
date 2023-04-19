@extends('layouts.front')

@section('title')
My Cart
@endsection

@section('content')

<div class = "py-3 mb-4 shadow-sm bg-warning border-top">
    <div class ="container">
        <h6 class = "mb-0">
            <a href="{{url('/')}}">
                Home
            </a> / 
            <a href="{{url('cart')}}">
                Cart
            </a> 
             
        </h6>
    </div>
</div>


<div class = "container my-5">
    <div class = "card shadow product_data">
        <div class = "card-body">
            @php $total =0; @endphp
            @foreach($cartItems as $item)
            <div class = "row">
                <div class = "col-md-2 my-auto">
                    <img src= "{{asset('assets/uploads/products/'.$item->products->image)}}" height="70px" width="70px" alt="Image Here">
                </div>
                <div class = "col-md-3 my-auto">
                    <h6>{{$item->products->name}}</h6>
                </div>
                <div class = "col-md-2 my-auto">
                    <h6>Rs{{$item->products->selling_price}}</h6>
                </div>
                <div class = "col-md-3">
                    <input type ="hidden" class ="prod_id">
                    <div class = "input-group text-center mb-3" style="width:130px;">
                    <div class ="input-group text-center mb-3">
                                <span class  ="input-group-text">-</span>
                                <input type ="text" name="quantity" value="1" class="form-control" />
                                <span class ="input-group-text">+</span>
                            </div>
                    </div>
                </div>
                <div class = "col-md-2">
                   <button class ="btn btn-danger"><i class="fa fa-trash"></i>Remove</button>
                </div>
            </div>
            @php $total += $item->products->selling_price ; @endphp

            @endforeach

        </div>
        <div class="card-footer">
            <h6> Total Price: {{$total}}
            <a href="{{url('checkout')}}" class="btn btn-outline-success float-end">Procees to Checkout</a>
            </h6>
        </div>

    </div>
</div>
@endsection
