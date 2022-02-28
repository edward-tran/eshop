@extends('layouts.admin')

@section('title')
Order completed
@endsection

@section('content')
<div class="card" class="card" style="margin: 20px 20px; border-radius:20px; width:75%;">
    <div class="card-header" style="border-top-left-radius:20px; border-top-right-radius: 20px;">
        <h4>Order completed</h4>
    </div>
    <div class="card-body">
    <table style="text-align: center;">
        <thead class="col-md-12">
            <tr style="font-weight: bold;">
                <td class="col-md-2">Order Date</td>
                <td class="col-md-2">Tracking Number</td>
                <td class="col-md-2">Total Price</td>
                <td class="col-md-2">Status</td>
                <td class="col-md-4">Payment Method</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
            <tr style="padding-left:20px;">
                <td>{{ date('d-m-Y', strtotime( $order->created_at )) }}</td>
                <td>{{ $order->tracking_no }}</td>
                <td>{{ $order->total_price}}</td>
                <td style="color:#50C878; font-weight:bold;">{{ $order->status == 0 ? 'Đang chờ' : 'Hoàn thành'}}</td>
                <td>{{ $order->payment_method }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</div>
@endsection