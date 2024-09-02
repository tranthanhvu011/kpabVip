@extends('fe.layout.page')

@section('title', __('Mở thành viên'))
@include('fe.layout.dowloadAndProfile')

@section('content')
<div class="most-popular">
      <div class="row d-flex justify-content-center ">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="" style="border-radius: 15px;">
            <div class="card-body bg-body-content p-5">
              <h2 class="text-uppercase text-center mb-5">MỞ THÀNH VIÊN</h2>
              <div class="info"><strong class="font-pro-by-vip">- Thông tin mở thành viên:</strong><br>- Mở thành viên với chỉ <strong>10k VNĐ</strong>. <img style="width: 5%;" src="{{ asset('assets/images/hot.gif') }}">
                <!--<br>- Khi mở thành viên bạn sẽ nhận được hộp quà sét kích hoạt ở NPC trong nhà ! <img style="width: 5%;" src="{{ asset('assets/images/hot.gif') }}">-->
                <br>- Tận hưởng trọn vẹn các tính năng. <img style="width: 5%;" src="{{ asset('assets/images/hot.gif') }}">
                <br>- Xây dựng, ủng hộ kpahnew.com hoạt động. 
              </div>
              @if(auth()->user()->account->active != 1)
              {!! Form::open(['route' => ['active-member'], 'method' => 'POST', 'autocomplete' => 'off']) !!}
                <div class="d-flex justify-content-center mt-3">
                  <button type="submit" id="active-member-button" class="btn btn-success btn-block gradient-custom-4 info">Mở ngay</button>
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
<br>
                <br>
                <br>
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