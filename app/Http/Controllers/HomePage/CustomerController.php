<?php

namespace App\Http\Controllers\HomePage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;

class CustomerController extends Controller
{
    public function index(){
        $orders = Order::where('user_id', Auth::id())->get();
        return view('homepage.order.index', compact('orders'));
    }

    public function showOrder($id){
        $order = Order::where('id', $id)->where('user_id', Auth::id())->first();
        return view('homepage.order.order_detail', compact('order'));
    }
}
