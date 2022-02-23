<?php

namespace App\Http\Controllers\HomePage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use GuzzleHttp\Handler\Proxy;

class CheckoutController extends Controller
{
    public function index(){

        $old_cartItems = Cart::where('user_id', Auth::id())->get();
        foreach ( $old_cartItems as $old_cartItem ){
            if (Product::where('id', $old_cartItem->product_id)->where('quantity','0')->exists()){
                $removeItem = Cart::where('user_id', Auth::id())->where('product_id', $old_cartItem->product_id)->first();
                $removeItem->delete();
            }
        }
        
        $cartItems = Cart::where('user_id', Auth::id())->get();
        foreach ( $cartItems as $cartItem ){
            if ($cartItem->products->quantity < $cartItem->product_qty){
                $cartItem->product_qty = $cartItem->products->quantity;
                $cartItem->save();
            }
        }
        return view('homepage.checkout', compact('cartItems'));
    }

    public function placeOrder( Request $request){
        $order = new Order();
        $order->user_id = Auth::id();
        $order->name = $request->input('name');
        $order->email = $request->input('email');
        $order->address = $request->input('address');
        $order->phone = $request->input('phone');

        $total = 0;
        $cartItem_total = Cart::where('user_id', Auth::id())->get();
        foreach ($cartItem_total as $product){
            $total += $product->products->selling_price;
        }
        $order->total_price = $total;
        
        $order->tracking_no = Auth::user()->name.rand(1111,9999);
        $order->save();

        $cartItems = Cart::where('user_id', Auth::id())->get();
        foreach ($cartItems as $cartItem){
            OrderItem::create([
                'order_id'=>$order->id,
                'product_id'=>$cartItem->product_id,
                'product_qty'=>$cartItem->product_qty,
                'product_price'=>$cartItem->products->selling_price,
            ]);

            $quantity_update = Product::where('id', $cartItem->product_id)->first();
            $quantity_update->quantity = $quantity_update->quantity - $cartItem->product_qty;
            $quantity_update->update();
        }

        $cartItem = Cart::where('user_id', Auth::id())->get();
        Cart::destroy($cartItem);

        return redirect('/')->with('message', "Đơn hàng đã được xác nhận!");
    }
}
