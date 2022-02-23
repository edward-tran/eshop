@extends('layouts.admin')
@section('title')
Orders
@endsection
@section('content')

@if (\Session::has('message'))
    <div class="alert alert-success">
        <ul>
            <li>{!! \Session::get('message') !!}</li>
        </ul>
    </div>
@endif

<div class="card" style="margin: 20px 20px; border-radius:20px; width:60%;">
    <div class="card-header" style="border-top-left-radius:20px; border-top-right-radius: 20px;">
        <div style="display: inline-block;" class="col-md-12">
            <div style="float: left;" class="col-md-9">
                <h4>Orders</h4>
            </div>
            <div style="float: right;" class="col-md-3">
                <a href="{{ url('order-completed') }}" class="btn btn-success" style="text-decoration: none; border-radius:30px;">Completed Order</a>
            </div>
        </div>
    </div>
    <div class="card-body">
    <table style="text-align: center;">
        <thead class="col-md-12">
            <tr style="font-weight: bold;">
                <td class="col-md-2">Order Date</td>
                <td class="col-md-3">Tracking Number</td>
                <td class="col-md-3" >Total Price</td>
                <td class="col-md-2" >Order Status</td>
                <td class="col-md-2"></td>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
            <tr style="padding-left:20px;">
                <td>{{ date('d-m-Y', strtotime( $order->created_at ))}}</td>
                <td>{{ $order->tracking_no }}</td>
                <td>{{ $order->total_price}}</td>
                <td style="color:#ed2939; font-weight:bold;">{{ $order->status == 0 ? 'Pending' : 'Completed'}}</td>
                <td>
                    <a href="{{ url('admin/order-detail/'.$order->id)}}" class="btn btn-primary" style="border-radius:30px; ">Detail</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</div>
@endsection