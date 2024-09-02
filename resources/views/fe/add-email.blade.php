@extends('fe.layout.page')
@section('title', __('Khí Phách Anh Hùng New'))
@include('fe.layout.dowloadAndProfile')
@section('content')
  <div class="row justify-content-center ">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6  align-items-center justify-content-center">
            <div class="card-body bg-body-content p-5">
            <div style="font-size: 25px; font-weight: 600; width: 100%;" class="card text-white bg-info mb-3 text-center">
NHẬP EMAIL CẦN THÊM         </div> 
<form action="{{ route('add-email') }}" method="POST">
@csrf
<div class="form-group has-success has-feedback">
    <div class="col-sm-13">
      <input type="text" class="form-control" id="inputSuccess" name="email" placeholder="Nhập email vào đây">
      <span class="glyphicon glyphicon-ok form-control-feedback"></span>
    </div>
  </div>              
                  <button type="submit" class="btn btn-success btn-block gradient-custom-4">Thêm Email</button>
                  </form>
                  <br>
                  <br>
                  <br>
              
                </div>
                </div>       </div>
                </div> 
</div>
   
   
@stop

