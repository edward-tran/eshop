@extends('layouts.app')
@section('title')
<title>Đăng nhập tài khoản</title>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center" >
        <div class="col-md-8">
            <div class="card" style="border-radius: 30px; margin-top:50px; opacity:0.9;" >
                <div class="card-header " style="text-align: center; border-top-right-radius:30px; border-top-left-radius:30px; font-size:20px; color:#385a64; background-color:#e1e1e1;">
                    <img style="margin-right:10px;" src="{{ asset('assets/img/login.png') }}" alt="" width="30px" height="30px">
                Đăng nhập</div>

                <div class="card-body " style="margin-left: 20px; ">
                    <div style="float: left;" class="col-md-4">
                        <img src="{{ asset('assets/img/login_bg.jpg') }}" alt="" width="250px" height="250px">
                    </div>
                    <div style="float: right; margin-top:20px;" class="col-md-8">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end" style="color:#385a64;">Email</label>

                                <div class="col-md-6">
                                    <input style="border-radius:30px;" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Nhập vào email của bạn">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end" style="color:#385a64;">Mật khẩu</label>

                                <div class="col-md-6">
                                    <input style="border-radius:30px;" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Mật khẩu">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check" style="margin-left: 40px;">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember" style="color:#385a64;">
                                            Ghi nhớ tôi
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4" >
                                    <button type="submit" class="btn btn-primary" style="border-radius:30px; margin-left:50px;">
                                        Đăng nhập
                                    </button>

                                </div>
                            </div>
                            <div style="text-align: center; margin-left:70px;">
                            @if (Route::has('password.request'))
                                        <a style="text-decoration: none; color:#ff4f5a;" class="btn btn-link" href="{{ route('password.request') }}">
                                            Quên mật khẩu
                                            <i class="fa fa-question-circle" aria-hidden="true"></i>
                                        </a>
                                    @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
