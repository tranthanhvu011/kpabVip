@extends('fe.layout.page')

@section('title', __('Đăng ký tài khoản'))
@include('fe.layout.dowloadAndProfile')
@section('content')
      <div class="row d-flex justify-content-center">
        <div class="col-12 col-md-9 col-lg-7 col-xl-7">
          <div class="" style="border-radius: 15px;">
            <div class="card-body bg-body-content p-5">
            <div style="font-size: 25px; font-weight: 600; width: 100%;" class="card text-white bg-info mb-3 text-center">
    Nhập Thông Tin Đăng Ký
</div>              {!! Form::open(['route' => ['register'], 'method' => 'POST', 'autocomplete' => 'off']) !!}
                <div class="form-outline mb-4 info">
                  {!! Form::label('username', 'Tên đăng nhập', ['class' => 'form-label']) !!}
                  {!! Form::text('username', null, ['class' => "form-control", 'placeholder' => "Tên đăng nhập", 'autocomplete' => 'off']) !!}
                </div>

                <div class="form-outline mb-4 info">
                  {!! Form::label('password', 'Mật khẩu', ['class' => 'form-label']) !!}
                  {!! Form::password('password', ['class' => "form-control", 'placeholder' => "Mật khẩu"]) !!}
                </div>

                <div class="form-outline mb-4 info">
                  {!! Form::label('password_confirmation', 'Nhập lại mật khẩu', ['class' => 'form-label']) !!}
                  {!! Form::password('password_confirmation', ['class' => "form-control", 'placeholder' => "Nhập lại mật khẩu"]) !!}
                </div>

                <div class="d-flex justify-content-center">
                  <button type="submit" id="register-button" class="btn btn-success btn-block gradient-custom-4">Đăng ký</button>
                </div>
                <p class="text-center text-muted mt-5 mb-0">Bạn đã có tài khoản?<a href="{{ route('login') }}" class="btn btn-dark mb-2">Đăng Nhập </a> <br><a href="forgot-password" class="btn btn-dark mb-2">Quên Mật Khẩu </a>

              {!! Form::close() !!}
            </div>
          </div>
          </div>

          </div>
          </div>
          </div>

@stop
@section('css')
<style>
  h2{
    color: #22092C
  }
      .info {
    font-family: Arial, sans-serif; /* Chọn font */
    font-size: 16px; /* Kích thước chữ */
    color: #; /* Màu chữ */
    line-height: 1.5; /* Độ cao dòng */
    margin: 10px 0; /* Khoảng cách trên dưới */
}
.card {
  color: #131842,
  background-color: #131842
}
.info  {
  
    color: #22092C; 
    font-size: 18px/* Màu chữ cho phần in đậm */
}
    </style>
@stop

@section('js')

@stop