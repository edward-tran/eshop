@extends('layouts.home_page')
@section('title')
    Thông tin đặt hàng
@endsection
@section('content')
 <div class="wrapper" id="checkout-page">
    <div id="left-content" class="col-md-6">
        <div id="customer-detail">Thông tin khách hàng</div>
        <hr>
        <div id="checkout-form">
            <div class="col-md-12 label-input">
                <label class="col-md-3 custom-label" for="">Tên</label>
                <input class="col-md-9 custom-input" type="text" placeholder="Nhập vào tên">
            </div>
            <div class="col-md-12 label-input">
                <label class="col-md-3 custom-label" for="">Email</label>
                <input class="col-md-9 custom-input" type="text" placeholder="Nhập vào email">
            </div>
            <div class="col-md-12 label-input">
                <label class="col-md-3 custom-label" for="">Địa chỉ</label>
                <input class="col-md-9 custom-input" type="text" placeholder="Nhập vào địa chỉ">
            </div>
            <div class="col-md-12 label-input">
                <label class="col-md-3 custom-label" for="">Số điện thoại</label>
                <input class="col-md-9 custom-input" type="text" placeholder="Nhập vào số điện thoại">
            </div>
        </div>
    </div>
    <div id="right-content" class="col-md-6">
        <div id="checkout-cart-detail">Thông tin giỏ hàng</div>
        <hr>
        <div id="detail">
            <table>
                <thead>
                    <tr id="thead-tr">
                        <td class="col-md-2"></td>
                        <td class="col-md-4">Sản phẩm</td>
                        <td class="col-md-2">Giá</td>
                        <td class="col-md-2">Số lượng</td>
                    </tr>
                </thead>
                <tbody>
                    <tr >
                    @foreach ($cartItems as $cartItem)
                        <td class="col-md-2">
                            <img id="td-img" src="{{ asset('assets/uploads/products/'.$cartItem->products->image ) }}" alt="product-image">
                        </td>
                        <td id="td-product-name" class="col-md-4">
                            {{ $cartItem->products->name }}
                        </td>
                        <td class="col-md-2">
                            {{ $cartItem->products->selling_price }}&#8363
                        </td>
                        <td class="col-md-2">
                            {{ $cartItem->product_qty}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div id="pay-button" class="col-md-12">
            <div style="float: left;" class="col-md-9"></div>
            <div style="float: right" class="col-md-3">
                <button class="btn btn-danger">Thanh Toán</button>
            </div>
        </div>
    </div>
 </div>
@endsection