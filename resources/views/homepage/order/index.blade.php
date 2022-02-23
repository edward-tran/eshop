@extends('layouts.home_page')
@section('title')
Danh sách đơn hàng
@endsection
@section('content')
<div class="wrapper" style="padding:10px; height:auto;">
    <div style="padding:10px; font-weight:bold; font-size:20px; text-align:center;">Danh sách đơn hàng</div>
    <hr>
    <table>
        <thead>
            <tr style="font-weight: bold;">
                <td class="col-md-4">Tracking Number</td>
                <td class="col-md-3" >Tổng tiền</td>
                <td class="col-md-3" >Trạng thái</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
            <tr style="padding-left:20px;">
                <td>{{ $order->tracking_no }}</td>
                <td>{{ $order->total_price}}</td>
                <td>{{ $order->status == 0 ? 'Đang chờ' : 'Hoàn thành'}}</td>
                <td>
                    <a href="{{ url('order-detail/'.$order->id)}}" class="btn btn-primary" style="border-radius:30px;">Xem đơn hàng</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection