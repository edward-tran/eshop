<?php

namespace App\Http\Controllers\Homepage;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addProduct(Request $request){

        $product_id = $request->input('product_id');
        $product_qty = $request->input('product_qty');

        if (Auth::check()){
            $product_check = Product::where('id', $product_id)->first();

            if ($product_check){
                if (Cart::where('product_id', $product_id)->where('user_id', Auth::id())->exists()){
                    return response()->json(['status'=>$product_check->name.' đã tồn tại trong giỏ hàng. Vui lòng kiểm tra lại!']);
                }else{
                    $cartItem = new Cart();
                    $cartItem->user_id = Auth::id();
                    $cartItem->product_id = $product_id;
                    $cartItem->product_qty = $product_qty;
                    $cartItem->save();
                    return response()->json(['status'=>$product_check->name.' đã thêm vào giỏ hàng thành công! ']);
                }
            }
        }else{
            return response()->json(['status'=>'Đăng nhập để thực hiện hành động này!']);
        }
    }

    public function showCart(){
        $cartItems = Cart::where('user_id', Auth::id())->get();
        return view('homepage.cart', compact('cartItems'));
    }

    public function updateCart(Request $request){
        $product_id = $request->input('product_id');
        $product_qty = $request->input('product_qty');
        
        if (Auth::check()){
            if (Cart::where('product_id', $product_id)->where('user_id', Auth::id())->exists()){
                $cart = Cart::where('product_id', $product_id)->where('user_id', Auth::id())->first();
                $cart->product_qty = $product_qty;
                $cart->update();
                return response()->json(['status'=> 'Giỏ hàng đã được cập nhật thành công!']);
            }
        }
    }
    public function deleteProduct(Request $request){
        if (Auth::check()){
            $product_id = $request->input('product_id');
            if (Cart::where('product_id', $product_id)->where('user_id', Auth::id())->exists()){
                $cartItem = Cart::where('product_id', $product_id)->where('user_id', Auth::id())->first();
                $cartItem->delete();
                return response()->json(['status'=>'Sản phẩm đã được xóa khỏi giỏ hàng!']);
            }
        }else{
            return response()->json(['status'=>'Đăng nhập để thực hiện hành động này!']);
        }
    }
}
