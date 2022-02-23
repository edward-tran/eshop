<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index(){
        $orders = Order::where('status', '0')->get();
        return view('admin.order.index', compact('orders'));
    }

    public function showOrder($id){
        $orders = Order::where('id', $id)->first();
        return view('admin.order.order_detail', compact('orders'));
    }

    public function updateOrder( Request $request, $id){
        $order = Order::find($id);
        $order->status = $request->input('order_status');
        $order->update();
        return redirect('order')->with('message', 'Cập nhật trạng thái đơn hàng thành công!');
    }

    public function showOrderCompleted(){
        $orders = Order::where('status', '1')->get();
        return view('admin.order.order_completed', compact('orders'));
    }
}
