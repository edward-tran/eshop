@extends('layouts.home_page')
@section('title')
Thông tin khách hàng
@endsection
@section('content')
    <div class="wrapper" id="user-detail" >
        <div>
            <h4><img src="{{ asset('assets/img/information.png') }}" alt="info-icon">Thông tin khách hàng</h4>
        </div>
        <hr>
        <div id="user-detail-form">
            <div class="col-md-12" style="display: inline-block;">
                <label class="col-md-6 mb-3 user-detail-label" for="">Tên khách hàng</label>
                <input class="col-md-6 mb-3 user-detail-input" type="text" value="{{ $userName }}">
            </div>
            <div class="col-md-12" style="display: inline-block;">
                <label class="col-md-6 mb-3 user-detail-label" for="">Email</label>
                <input class="col-md-6 mb-3 user-detail-input" type="text" value="{{ $email }}">
            </div>
            <div class="col-md-12" style="display: inline-block;">
                <label class="col-md-6 mb-3 user-detail-label" for="">Địa chỉ</label>
                <input class="col-md-6 mb-3 user-detail-input" type="text" value="{{ $address }}">
            </div>
            <div class="col-md-12" style="display: inline-block;">
                <label class="col-md-6 mb-3 user-detail-label" for="">Số điện thoại</label>
                <input class="col-md-6 mb-3 user-detail-input" type="text" value="{{ $phone }}">
            </div>
        </div>
    </div>
@endsection