@extends('layouts.app')
@section('title')
<title>Đặt lại mật khẩu</title>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8" >
            <div class="card" style="border-radius: 30px; margin-top:40px;">
                <div class="card-header" style="border-top-right-radius:30px; border-top-left-radius:30px; text-align:center;">
                <img style="margin-right:5px;" src="{{ asset('assets/img/password.png') }}" alt="" width="30px" height="30px">
                Đặt lại mật khẩu</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div style="float:left;" class="col-md-4">
                        <img style="margin-left:30px;" src="{{ asset('assets/img/reset_pw.jpg') }}" alt="" width="250px" height="250px">
                    </div>
                    <div style="float:right; margin-top:20px;" class="col-md-8">
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div class="row mb-3">
                                <p class="col-md-12" style="margin-left:60px; width:430px; ">
                                    Đã xảy ra vấn đề với việc đăng nhập?
                                    <i class='fas fa-surprise'></i>
                                    <br> 
                                    Vui lòng nhập vào email để tiến hành đặt lại mật khẩu cho tài khoản của bạn!
                                </p>
                                <label for="email" class="col-md-4 col-form-label text-md-end">Email</label>

                                <div class="col-md-6" style="margin-bottom: 20px;">
                                    <input style="border-radius:30px;" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Nhập vào email của bạn">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4" style="text-align: center;">
                                    <button style="border-radius:30px;" type="submit" class="btn btn-primary" >
                                        Gửi link
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
