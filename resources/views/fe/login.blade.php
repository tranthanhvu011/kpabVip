@extends('fe.layout.page')
@section('title', __('Đăng nhập'))
@include('fe.layout.dowloadAndProfile')
@section('content')
      <div class="row justify-content-center ">
        <div class="col-12 col-md-9 col-lg-7 col-xl-7  align-items-center justify-content-center">
            <div class="card-body bg-body-content p-5">
            <div style="font-size: 25px; font-weight: 600; width: 100%;" class="card text-white bg-info mb-3 text-center">
            Nhập Thông Tin Đăng Nhập
            </div> 
             {!! Form::open(['route' => ['login'], 'method' => 'POST', 'autocomplete' => 'off']) !!}
                <div class="form-outline mb-4 info">
                  {!! Form::label('username', 'Tên đăng nhập', ['class' => 'form-label']) !!}
                  {!! Form::text('username', null, ['class' => "form-control", 'placeholder' => "Tên đăng nhập", 'autocomplete' => 'off']) !!}
                </disv>

                <div class="form-outline mb-4 info">
                  {!! Form::label('password', 'Mật khẩu', ['class' => 'form-label']) !!}
                  {!! Form::password('password', ['class' => "form-control", 'placeholder' => "Mật khẩu"]) !!}
                </div>
                  <button type="submit" id="login-button" class="btn btn-success btn-block gradient-custom-4">Đăng nhập</button>
                </div>

                <p class="text-center text-muted  mb-0">Bạn chưa có tài khoản?                 
                  <a href="{{ route('register') }}" class="btn btn-dark mb-2"><i class="fa fa-registered" aria-hidden="true"></i> Đăng ký</a>
                  <br><a href="forgot-password" class="btn btn-dark mb-2">Quên Mật Khẩu </a>

                </p>
              {!! Form::close() !!}
            </div>            </div>

          </div>
      </div>
      </div>

@stop
