@extends('fe.layout.page')

@section('title', __('Thông tin nhân vật'))
@include('fe.layout.dowloadAndProfile')

@section('content')
      <div class="row d-flex justify-content-center ">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="" style="border-radius: 15px;">
            <div class="card-body bg-body-content p-5">
            @php
    $account_info = auth()->user()->account;
    $namePlayer = $account_info->player ? $account_info->player->name : "Bạn chưa tạo nhân vật, hãy vào game tạo nhân vật và quay lại nhé !";
    $soDuLuong = $account_info->luong;
    $soDuXu = $account_info->xu;
    $soDu = $account_info->vnd;
    $email =  $account_info->email ? $account_info->email : "Bạn chưa có email";
    
@endphp
<div class="card text-white bg-info mb-3 text-center">
  <div style="background-color: #131842" class="card-body ">
    Thông Tin Nhân Vật
  </div>
</div>             
 <div class="alert alert-primary" role="alert">Tên nhân vật:
  {!!$namePlayer!!}
</div>
<div class="alert alert-secondary" role="alert">
  Số dư lượng: {!!$soDuLuong!!}
</div>
<div class="alert alert-success" role="alert">
Số dư xu: {!!$soDuXu!!}
</div>
<div class="alert alert-danger" role="alert">
Số dư: {!!$soDu!!} VNĐ
</div>
<div class="alert alert-warning" role="alert">
  Email: {!!$email!!}
</div>


<a class="btn btn-success mb-2" href="{{ route('change-password') }}"><i class="" aria-hidden="true"></i>Đổi Mật Khẩu</a>

<a class="btn btn-success mb-2" href="{{ route('password-2') }}"><i class="" aria-hidden="true"></i>Mật Khẩu Cấp 2</a>
@if($account_info->mkc2)
<a class="btn btn-success mb-2" href="{{ route('delete-password-2') }}"><i class="" aria-hidden="true"></i> Xóa Mật Khẩu Cấp 2</a>
@endif
<a class="btn btn-success mb-2" href="dang-xuat"><i class="" aria-hidden="true"></i>Đăng Xuất</a>
@if($email == "Bạn chưa có email")
    <a class="btn btn-success mb-2 " href="{{ route('add-email') }}">
        <i class="" aria-hidden="true"></i>Thêm Email
    </a>
@else
<form action="{{ route('send-delete-email-link') }}" method="POST">
@csrf
<input type="hidden" name="email" required value="{!!$email!!}">
    <button class="btn btn-success mb-2" type="submit">Xóa Email</button>
    </form>
@endif
<!-- <div class="alert alert-info" role="alert">
  A simple info alert—check it out!
</div>
<div class="alert alert-light" role="alert">
  A simple light alert—check it out!
</div>
<div class="alert alert-dark" role="alert">
  A simple dark alert—check it out!
</div> -->
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
      h2 {
        color : #750E21;
      }
    </style>
@stop

@section('js')

@stop