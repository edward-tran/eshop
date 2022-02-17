@extends('layouts.home_page')
@section('title')
Thông tin khách hàng
@endsection
@section('content')
    <div class="wrapper" style="height:fit-content; width:50%; padding:15px;">
        <div>
            <h4 style="text-align: center;"><img src="{{ asset('assets/img/information.png') }}" alt="" style="margin-right:5px;" width="30px;" height="30px;">Thông tin khách hàng</h4>
        </div>
        <hr>
        <div style="padding:20px;">
            <div class="col-md-12" style="display: inline-block;">
                <label class="col-md-6" for="" style="float: left; font-weight:bold; ">Tên khách hàng</label>
                <input class="col-md-6" type="text" value="{{ $userName }}" style="float: right; border-radius:20px; border-style:solid; border-color:gray; padding-left:10px;">
            </div>
            <div class="col-md-12" style="display: inline-block;">
                <label class="col-md-6" for="" style="float: left; font-weight:bold; ">Email</label>
                <input class="col-md-6" type="text" value="{{ $email }}" style="float: right; border-radius:20px; border-style:solid; border-color:gray; padding-left:10px;">
            </div>
            <div class="col-md-12" style="display: inline-block;">
                <label class="col-md-6" for="" style="float: left; font-weight:bold; ">Địa chỉ</label>
                <input class="col-md-6" type="text" value="{{ $address }}" style="float: right; border-radius:20px; border-style:solid; border-color:gray; padding-left:10px;">
            </div>
            <div class="col-md-12" style="display: inline-block;">
                <label class="col-md-6" for="" style="float: left; font-weight:bold; ">Số điện thoại</label>
                <input class="col-md-6" type="text" value="{{ $phone }}" style="float: right; border-radius:20px; border-style:solid; border-color:gray; padding-left:10px;">
            </div>
        </div>
    </div>
@endsection