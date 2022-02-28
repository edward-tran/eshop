@extends('layouts.home_page')

@section('title')
Đơn hàng của bạn
@endsection

@section('content')
<div class="wrapper" style="padding:10px; width:75%;">
    <div style="padding:10px; font-weight:bold; text-align:center; font-size:20px;">Đơn hàng của bạn</div>
    <hr>
        <div id="left-content" class="col-md-6">
            <div id="checkout-form">
                <div class="col-md-12 label-input">
                    <label class="col-md-3 custom-label" for="">Tên</label>
                    <input class="col-md-9 custom-input" name="name" type="text" placeholder="Nhập vào tên" value="{{ $order->name }}">
                </div>
                <div class="col-md-12 label-input">
                    <label class="col-md-3 custom-label" for="">Email</label>
                    <input class="col-md-9 custom-input" name="email" type="text" placeholder="Nhập vào email" value="{{ $order->email }}">
                </div>
                <div class="col-md-12 label-input">
                    <label class="col-md-3 custom-label" for="">Địa chỉ giao hàng</label>
                    <input class="col-md-9 custom-input" name="address" type="text" placeholder="Nhập vào địa chỉ" value="{{ $order->address }}">
                </div>
                <div class="col-md-12 label-input">
                    <label class="col-md-3 custom-label" for="">Số điện thoại</label>
                    <input class="col-md-9 custom-input" name="phone" type="text" placeholder="Nhập vào số điện thoại" value="{{ $order->phone }}">
                </div>
            </div>
        </div>
        <div id="right-content" style="margin-top: 30px;" class="col-md-6">
            <div id="detail">
                <table>
                    <thead>
                        <tr id="thead-tr">
                            <td class="col-md-3">Hình ảnh</td>
                            <td class="col-md-4">Sản phẩm</td>
                            <td class="col-md-2">Số lượng</td>
                            <td class="col-md-2">Đơn giá</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->orderItems as $orderItem)
                        <tr>
                            <td>
                                <img src="{{ asset('assets/uploads/products/'.$orderItem->products->image) }}" alt="OrderItem Image" width="30px" height="30px">
                            </td>
                            <td>{{ $orderItem->products->name }}</td>
                            <td>{{ $orderItem->product_qty }}</td>
                            <td>{{ $orderItem->product_price }}&#8363</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div style="display:inline-block; margin-top:30px;" class="col-md-12">
                    <div style="float: left;" class="col-md-6">
                    </div>
                    <div style="float: right; text-align:right; font-weight:bold;" class="col-md-6">
                        Tổng cộng : {{ $order->total_price }}&#8363
                    </div>
                </div>
                <div style="margin-top:30px; text-align:right;">
                    <div style="font-weight: bold;">Phương thức thanh toán</div>
                    <div style="color:green; font-size:20px; font-weight:bold;">
                        <i>{{ $order->payment_method }}</i>
                    </div>
                </div>
            </div>
            
        </div>
</div>
@endsection