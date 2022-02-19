<?php

namespace App\Http\Controllers\HomePage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Product;

class CheckoutController extends Controller
{
    public function index(){
        $cartItems = Cart::where('user_id', Auth::id())->get();
        foreach ( $cartItems as $cartItem ){
            if ( !Product::where('id', $cartItem->product_id)->where('quantity', '>=', $cartItem->product_qty)->exists()){
                $removeItem = Cart::where("user_id", Auth::id())->where('product_id', $cartItem->product_id)->first();
                $removeItem->delete();
                return back();
            }
        }
        return view('homepage.checkout', compact('cartItems'));
    }
}
