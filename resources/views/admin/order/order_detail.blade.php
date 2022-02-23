@extends('layouts.admin')
@section('title')
Order Detail
@endsection
@section('content')
<div class="card" style="margin: 20px 20px; border-radius:20px;">
    <div class="card-header" style="border-top-left-radius:20px; border-top-right-radius: 20px;">
        <h4>Order Detail</h4>
    </div>
    <div class="card-body">
        <div id="left-content" class="col-md-6">
            <div id="checkout-form">
                <div class="col-md-12 label-input">
                    <label class="col-md-3 custom-label" for="">Name</label>
                    <input class="col-md-9 custom-input" name="name" type="text" placeholder="Nhập vào tên" value="{{ $orders->name }}">
                </div>
                <div class="col-md-12 label-input">
                    <label class="col-md-3 custom-label" for="">Email</label>
                    <input class="col-md-9 custom-input" name="email" type="text" placeholder="Nhập vào email" value="{{ $orders->email }}">
                </div>
                <div class="col-md-12 label-input">
                    <label class="col-md-3 custom-label" for="">Shipping Address</label>
                    <input class="col-md-9 custom-input" name="address" type="text" placeholder="Nhập vào địa chỉ" value="{{ $orders->address }}">
                </div>
                <div class="col-md-12 label-input">
                    <label class="col-md-3 custom-label" for="">Phone Number</label>
                    <input class="col-md-9 custom-input" name="phone" type="text" placeholder="Nhập vào số điện thoại" value="{{ $orders->phone }}">
                </div>
            </div>
        </div>
        <div id="right-content"  class="col-md-6">
            <div id="detail">
                <table>
                    <thead>
                        <tr id="thead-tr">
                            <td class="col-md-3">Image</td>
                            <td class="col-md-4">Product</td>
                            <td class="col-md-2">Quantity</td>
                            <td class="col-md-2">Price</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders->orderItems as $orderItem)
                        <tr>
                            <td>
                                <img src="{{ asset('assets/uploads/products/'.$orderItem->products->image) }}" alt="OrderItem Image" width="30px" height="30px">
                            </td>
                            <td>{{ $orderItem->products->name }}</td>
                            <td>{{ $orderItem->product_qty }}</td>
                            <td>{{ $orderItem->product_price }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div style="display:inline-block; margin-top:30px;" class="col-md-12">
                    <div style="float: left;" class="col-md-6">
                    </div>
                    <div style="float: right; text-align:right; font-weight:bold;" class="col-md-6">
                        Total Price : {{ $orders->total_price }}
                    </div>
                </div>
                <div style="text-align: left; padding-left:30px;">
                    <div for="" style="font-weight:bold; margin-bottom:10px;">Order Status</div>
                    <div style="display: inline-block;" class="col-md-12">
                        <form action="{{ url('update-order/'.$orders->id) }}" method="POST">
                            @csrf
                            <div style="float: left;" class="col-md-9">
                                <select class="form-select" name="order_status" style="width:140px; ">
                                    <option {{ $orderItem->status == '0' ? 'selected' : '' }} value="0">Pending</option>
                                    <option {{ $orderItem->status == '1' ? 'selected' : '' }} value="1">Completed</option>
                                </select>
                            </div>
                            <div style="float: right;" class="col-md-3">
                                <button type="submit" class="btn btn-primary" style="border-radius: 30px;;">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection