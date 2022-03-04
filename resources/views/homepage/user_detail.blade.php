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
            <form action="{{ url('update-user-detail/'.$user->id) }}" method="POST">
            @csrf
                <div id="user-detail-form">
                    <div class="col-md-12" style="display: inline-block;">
                        <label class="col-md-6 mb-3 user-detail-label" for="">Tên khách hàng</label>
                        <input class="col-md-6 mb-3 user-detail-input" name="name" type="text" value="{{ $user->name }}">
                    </div>
                    <div class="col-md-12" style="display: inline-block;">
                        <label class="col-md-6 mb-3 user-detail-label" for="">Email</label>
                        <input class="col-md-6 mb-3 user-detail-input" name="email" type="text" value="{{ $user->email }}">
                    </div>
                    <div class="col-md-12" style="display: inline-block;">
                        <label class="col-md-6 mb-3 user-detail-label" for="">Địa chỉ</label>
                        <input class="col-md-6 mb-3 user-detail-input" name="address" type="text" value="{{ $user->address }}">
                    </div>
                    <div class="col-md-12" style="display: inline-block;">
                        <label class="col-md-6 mb-3 user-detail-label" for="">Số điện thoại</label>
                        <input class="col-md-6 mb-3 user-detail-input" name="phone" type="text" value="{{ $user->phone }}">
                    </div>
                    <div class="col-md-12" style="display: inline-block;">
                        <div style="float: left;" class="col-md-10">
                        </div>
                        <div style="float:right;" class="col-md-2">
                            <button type="submit" class="btn btn-primary right" style="border-radius: 30px;">Cập nhật</button>
                        </div>
                    </div>
                </div>
            </form>
    </div>
@endsection