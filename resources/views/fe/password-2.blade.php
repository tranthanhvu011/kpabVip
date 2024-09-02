@extends('fe.layout.page')

@if(auth()->user()->account->mkc2)
@section('title', __('Cập nhật mật khẩu cấp 2'))
@else
@section('title', __('Tạo mật khẩu cấp 2'))
@endif
@include('fe.layout.dowloadAndProfile')

@section('content')
      <div class="row d-flex justify-content-center ">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="" style="border-radius: 15px;">
            <div class="card-body bg-body-content p-5">
              @if(auth()->user()->account->mkc2)
              <div style="font-size: 25px; font-weight: 600; width: 100%;" class="card text-white bg-info mb-3 text-center">
           ĐỔI MẬT KHẨU CẤP 2
</div>                 {!! Form::open(['route' => ['change-password-2'], 'method' => 'POST', 'autocomplete' => 'off']) !!}

                <div class="form-outline mb-4 info">
                  {!! Form::label('current_password', 'Mật khẩu hiện tại', ['class' => 'form-label']) !!}
                  {!! Form::password('current_password', ['class' => "form-control", 'placeholder' => "Mật khẩu"]) !!}
                </div>

                <div class="form-outline mb-4 info">
                  {!! Form::label('old_password2', 'Mật khẩu cấp 2 hiện tại', ['class' => 'form-label']) !!}
                  {!! Form::password('old_password2', ['class' => "form-control", 'placeholder' => "Mật khẩu cấp 2 cũ"]) !!}
                </div>

                <div class="form-outline mb-4 info">
                  {!! Form::label('password', 'Mật khẩu cấp 2 mới', ['class' => 'form-label']) !!}
                  {!! Form::password('password', ['class' => "form-control", 'placeholder' => "Mật khẩu cấp 2 mới"]) !!}
                </div>

                <div class="form-outline mb-4 info">
                  {!! Form::label('password_confirmation', 'Nhập lại mật khẩu cấp 2 mới', ['class' => 'form-label']) !!}
                  {!! Form::password('password_confirmation', ['class' => "form-control", 'placeholder' => "Nhập lại mật khẩu cấp 2 mới"]) !!}
                </div>

                <div class="d-flex justify-content-center">
                  <button type="submit" id="password-2-button" class="btn btn-success btn-block gradient-custom-4">Đổi mật khẩu</button>
                </div>
              {!! Form::close() !!}
              @else
              <div style="font-size: 25px; font-weight: 600; width: 100%;" class="card text-white bg-info mb-3 text-center">
            TẠO MẬT KHẨU CẤP 2
            </div>                {!! Form::open(['route' => ['password-2'], 'method' => 'POST', 'autocomplete' => 'off']) !!}

                <div class="form-outline mb-4 info">
                  {!! Form::label('current_password', 'Mật khẩu hiện tại', ['class' => 'form-label']) !!}
                  {!! Form::password('current_password', ['class' => "form-control", 'placeholder' => "Mật khẩu"]) !!}
                </div>

                <div class="form-outline mb-4 info">
                  {!! Form::label('password', 'Mật khẩu cấp 2', ['class' => 'form-label']) !!}
                  {!! Form::password('password', ['class' => "form-control", 'placeholder' => "Mật khẩu"]) !!}
                </div>

                <div class="form-outline mb-4 info">
                  {!! Form::label('password_confirmation', 'Nhập lại mật khẩu cấp 2', ['class' => 'form-label']) !!}
                  {!! Form::password('password_confirmation', ['class' => "form-control", 'placeholder' => "Nhập lại mật khẩu"]) !!}
                </div>

                <div class="d-flex justify-content-center">
                  <button type="submit" id="password-2-button" class="btn btn-success btn-block gradient-custom-4">Tạo mật khẩu</button>
                </div>
              {!! Form::close() !!}
              @endif
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
    color: #8C3333
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
  background-color: black
}
.info  {
  
    color: black; 
    font-size: 18px/* Màu chữ cho phần in đậm */
}
    </style>
@stop

@section('js')

@stop