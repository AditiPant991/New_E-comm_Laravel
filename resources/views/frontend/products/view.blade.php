@extends('layouts.front')

@section('title', $products->name)

@section('content')

<div class = "py-3 mb-4 shadow-sm bg-warning border-top">
    <div class ="container">
        <h6 class = "mb-0">
            <a href="{{url('category')}}">
                Collection
            </a> / 
            <a href="{{url('category/'.$products->category->slug)}}">
                {{$products->category->name}}
            </a> / 
            <a href="{{url('category/'.$products->category->slug.'/'.$products->slug)}}">
                {{$products->name}}
            </a>  
        </h6>
    </div>
</div>

<div class = "container">
    <div class ="card-shadow product_data">
        <div class ="card-body">
            <div class ="row">
                 <div class ="col-md-4 border-right">
                    <img src ="{{asset ('assets/uploads/products/'.$products->image)}}" class= "w-100"  alt="">
                </div>
                <div class="col-md-8">
                    <h2 class="mb-0">
                        {{$products->name}}
                        @if($products->trending == '1')
                        <label style="font-size: 16px;" class = "float-end badge bg-danger trending_tag"> Trending </label>
                        @endif
                    </h2>

                    <hr>
                    <label class="me-3">Original Price: <s>Rs{{$products->original_price}} </s></label>
                    <label class="fw-bold">Selling Price: Rs{{$products->selling_price}} </label>
                    <p class ="mt-3">
                        {!! $products->small_description !!}
                    </p>
                    <hr>
                    @if($products->qty >0)
                    <label class="badge bg-success">In stock</label>
                    @else
                    <label class="badge bg-danger">Out of stock</label>
                    @endif

                    <div class="row mt-2">
                        <div class ="col-md-2">
                            <input type ="hidden" value="{{$products->id}}" class ="prod_id">
                            <label for="Quantity">Quantity</label>
                            <div class ="input-group text-center mb-3">
                                <span class  ="input-group-text">-</span>
                                <input type ="text" name="quantity" value="1" class="form-control" />
                                <span class ="input-group-text">+</span>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <br/>
                            <button type="button"  class="btn btn-success me-3 addToCartBtn float-start">Add to Cart <i class="fa fa-shopping-cart"></i></button>
                            <button type="button"  class="btn btn-success me-3 float-start">Add to Wishlist <i class="fa fa-heart"></i></button>
                        </div>
                        <p class ="mt-3">
                            <h6>Description</h6>
                        {!! $products->description !!}
                    </p>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    $(document).ready(function(){
        
        $('.addToCartBtn').click(function(e){
        e.preventDefault();

        var product_id = $(this).closest('.product_data').find('.prod_id').val();

        $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

        $.ajax({
            method:"POST",
            url: "/add-to-cart",
            data: {
                'product_id': product_id,
            },
            success: function(response){
                swal(response.status);

            }
        });
        
    });
});
</script>
@endsection
