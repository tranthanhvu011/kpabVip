@extends('fe.layout.page')

@section('title', __('Khí Phách Anh Hùng New'))
@include('fe.layout.dowloadAndProfile')

@section('content')
  <div class="row justify-content-center ">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6  align-items-center justify-content-center">
            <div class="card-body bg-body-content p-5">
            <div style="font-size: 25px; font-weight: 600; width: 100%;" class="card text-white bg-info mb-3 text-center">
            Nhập Mật Khẩu Mới
            </div>            
<form method="POST" action="{{ route('password.update') }}">
@csrf
<div class="form-group has-success has-feedback">
    <div class="col-sm-13">
    <input type="hidden" name="token" value="{{ $token }}">
    <label for="email">Email Address</label>
      <input type="text" class="form-control" id="inputSuccess" name="email" value="{{ $email }}" readonly>
      <span class="glyphicon glyphicon-ok form-control-feedback" ></span>
      <label for="email">Mật Khẩu Mới</label>
      <input type="password" class="form-control" id="inputSuccess" name="password" placeholder="Nhập email vào đây">
      <span class="glyphicon glyphicon-ok form-control-feedback"></span>
      <label for="email">Xác Nhận Mật Khẩu Mới</label>
      <input type="password" class="form-control" id="inputSuccess" name="password_confirmation" placeholder="Nhập email vào đây">
      <span class="glyphicon glyphicon-ok form-control-feedback"></span>
    </div>
  </div>              
                  <button type="submit" id="login-button" class="btn btn-success btn-block gradient-custom-4">Đổi Mật Khẩu Mới</button>
                </div>
                <p class="text-center text-muted  mb-0">Bạn chưa có tài khoản?                 
                    <a href="{{ route('register') }}" class="btn btn-dark mb-2"><i class="fa fa-registered" aria-hidden="true"></i> Đăng ký</a>
                </p>
            </div>
          </div>
      </div>
</div>


@stop



