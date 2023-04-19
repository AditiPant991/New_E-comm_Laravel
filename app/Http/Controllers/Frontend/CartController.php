<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addProduct(Request $request){

        $product_id = $request->input('product_id');

        if(Auth::check())
        {
            $prod_check = Product::where('id', $product_id)->first();
            if($prod_check)
            {

                if(Cart::where('prod_id', $product_id)->where('user_id', Auth::id())->exists()){
                    return response()->json(['status' => $prod_check->name."Already Added to Cart"]);

                }
                else
                {
                $cartItem = new Cart();
                $cartItem->prod_id = $product_id;
                $cartItem->user_id = Auth::id();
                $cartItem->save();
                return response()->json(['status' => $prod_check->name."Added to Cart"]);

                }
            }
        }
        else{
            return response()->json(['status'=> "Login to continue"]);
        }
     }
     public function viewcart()
     {
        $cartItems  = Cart::where('user_id',Auth::id())->get();
        return view('frontend.cart',compact('cartItems'));
     }
}
