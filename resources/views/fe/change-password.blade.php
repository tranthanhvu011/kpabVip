@extends('fe.layout.page')

@section('title', __('Đổi mật khẩu'))
@include('fe.layout.dowloadAndProfile')

@section('content')
      <div class="row d-flex justify-content-center">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="" style="border-radius: 15px;">
            <div class="card-body bg-body-content p-5">
            <div style="font-size: 25px; font-weight: 600; width: 100%;" class="card text-white bg-info mb-3 text-center">
            Đổi Mật Khẩu
</div>                 {!! Form::open(['route' => ['change-password'], 'method' => 'POST', 'autocomplete' => 'off']) !!}
                <div class="form-outline mb-4 info">
                  {!! Form::label('old_password', 'Mật khẩu hiện tại', ['class' => 'form-label']) !!}
                  {!! Form::password('old_password', ['class' => "form-control", 'placeholder' => "Mật khẩu hiện tại"]) !!}
                </div>

                @if(auth()->user()->account->mkc2)
                <div class="form-outline mb-4 info">
                  {!! Form::label('password2', 'Mật khẩu cấp 2', ['class' => 'form-label']) !!}
                  {!! Form::password('password2', ['class' => "form-control", 'placeholder' => "Mật khẩu cấp 2"]) !!}
                </div>
                @endif

                <div class="form-outline mb-4 info">
                  {!! Form::label('password', 'Mật khẩu mới', ['class' => 'form-label']) !!}
                  {!! Form::password('password', ['class' => "form-control", 'placeholder' => "Mật khẩu mới"]) !!}
                </div>

                <div class="form-outline mb-4 info">
                  {!! Form::label('password_confirmation', 'Nhập lại mật khẩu mới', ['class' => 'form-label']) !!}
                  {!! Form::password('password_confirmation', ['class' => "form-control", 'placeholder' => "Nhập lại mật khẩu"]) !!}
                </div>

                <div class="d-flex justify-content-center">
                  <button type="submit" id="change-password-button" class="btn btn-success btn-block gradient-custom-4">Đổi mật khẩu</button>
                </div>
              {!! Form::close() !!}
            </div>
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
    color: #000000
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
  
    color: #000000; 
    font-size: 18px/* Màu chữ cho phần in đậm */
}
    </style>
@stop

@section('js')

@stop