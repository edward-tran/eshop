@extends('layouts.app')
@section('title')
<title>Đăng ký tài khoản mới</title>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8" style="margin-top:30px;opacity:0.9">
            <div class="card" style="border-radius: 30px;">
                <div class="card-header" style="text-align: center; border-top-right-radius:30px; border-top-left-radius:30px; font-size:20px;">
                    <img style="margin-right:5px;" src="{{ asset('assets/img/register.png') }}" alt="" width="30px" height="30px">
                Đăng ký</div>

                <div class="card-body " style="margin-left: 20px;">
                    <div style="float: left;" class="col-md-4">
                        <img src="{{ asset('assets/img/signup.jpg') }}" alt="" width="250px" height="250px"> 
                    </div>
                    <div style="float: right; margin-top:10px; " class="col-md-8">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">Tên</label>

                                <div class="col-md-6">
                                    <input style="border-radius: 30px; " id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Nhập vào tên của bạn">

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">Email</label>

                                <div class="col-md-6">
                                    <input style="border-radius: 30px;" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Nhập vào email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">Địa chỉ</label>

                                <div class="col-md-6">
                                    <input style="border-radius: 30px;" id="address" type="text" class="form-control @error('email') is-invalid @enderror" name="address"  required autocomplete="address" placeholder="Nhập vào địa chỉ">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">Số điện thoại</label>

                                <div class="col-md-6">
                                    <input style="border-radius: 30px;" id="phone" type="text" class="form-control @error('email') is-invalid @enderror" name="phone"  required autocomplete="phone" placeholder="Nhập vào số điện thoại">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">Mật khẩu</label>

                                <div class="col-md-6">
                                    <input style="border-radius: 30px;" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Mật khẩu">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-end">Xác nhận mật khẩu</label>

                                <div class="col-md-6">
                                    <input style="border-radius: 30px;" id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Nhập lại mật khẩu">
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4" style="text-align: center;">
                                    <button type="submit" class="btn btn-primary" style="border-radius: 30px;">
                                        Đăng ký
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
