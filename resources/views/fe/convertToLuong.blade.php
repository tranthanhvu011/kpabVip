@extends('fe.layout.page')

@section('title', __('Mở thành viên'))
@include('fe.layout.dowloadAndProfile')

@section('content')

<div class="gaming-library">

<div class="d-flex justify-content-center align-items-center" >
<div class="col-8">
@php
    $account_info = auth()->user()->account;
    $namePlayer = $account_info->player ? $account_info->player->name : "Bạn chưa tạo nhân vật, hãy vào game tạo nhân vật và quay lại nhé !";
    $soDuLuong = $account_info->luong;
@endphp
<div class="alert alert-success text-center" role="alert">
  Số dư lượng của bạn: {!!$soDuLuong!!}
</div>
<div class="alert alert-warning text-center" role="alert">
Tên Nhân Vật:  {!! $namePlayer !!}</div>

</div>
</div>
<br>
<form action="{{ route('convertToLuong') }}" method="POST">
    @csrf
  <div class="d-flex justify-content-center align-items-center " >
    <div class="col-8">
      <select class="selectpicker form-control" name="vnd_amount" id="vnd_amount" required >
      <option class="text-center" value="" disabled selected>Chọn Số VNĐ Cần Quy Đổi</option>
        <option class="text-center" value="10000">10,000 VNĐ</option>
        <option class="text-center" value="20000">20,000 VNĐ</option>
        <option class="text-center" value="30000">30,000 VNĐ</option>
        <option class="text-center" value="50000">50,000 VNĐ</option>
        <option class="text-center" value="100000">100,000 VNĐ</option>
        <option class="text-center" value="200000">200,000 VNĐ</option>
        <option class="text-center" value="300000">300,000 VNĐ</option>
        <option class="text-center" value="500000">500,000 VNĐ</option>
        <option class="text-center" value="1000000">1,000,000 VNĐ</option>
      </select>
      
  </div>
</div>
<br>
<div class="d-flex justify-content-center" >
<div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Đổi Lượng</button>
</div>
                    </div>
</form>
<br>
<table class="table table-bordered" id="banggia" style="background: #ffecc3;">
        <tbody><tr>
            <th><small>Mệnh giá</small> 10,000đ</th>
            <td>500 Lượng + <span class="text-success">250 LK </span>
            </td>
        </tr>
        <tr>
            <th><small>Mệnh giá</small> 20,000đ</th>
            <td>1000 Lượng + <span class="text-success">500 LK </span> 
            </td>
        </tr>
        <tr>
            <th><small>Mệnh giá</small> 30,000đ</th>
            <td>1500 Lượng + <span class="text-success">750 LK </span> 
            </td>
        </tr>
        <tr>
            <th><small>Mệnh giá</small> 50,000đ</th>
            <td>2500 Lượng + <span class="text-success">1250 LK </span> 
            </td>
        </tr>
        <tr>
            <th><small>Mệnh giá</small> 100,000đ</th>
            <td>5000 Lượng + <span class="text-success">2500 LK </span> 
            </td>
        </tr>
        <tr>
            <th><small>Mệnh giá</small> 200,000đ</th>
            <td>10000 Lượng <span class="text-success">+ 5000 LK</span>
            </td>
        </tr>
        <tr>
            <th><small>Mệnh giá</small> 300,000đ</th>
            <td>15000 Lượng + <span class="text-success">7500 LK </span>
            </td>
        </tr>
        <tr>
            <th><small>Mệnh giá</small> 500,000đ</th>
            <td>25000 Lượng + <span class="text-success">12500 LK </span> 
            </td>
        </tr>
        <tr>
            <th><small>Mệnh giá</small> 1,000,000đ</th>
            <td>50000 Lượng + <span class="text-success">25000 LK  </span>
            </td>
        </tr>
    </tbody></table>
</div>
</div>
</div>
<br><br><br>
@endsection

@section('css')
<!-- Các file CSS nếu cần -->
@endsection

@section('js')
<!-- Các file JavaScript nếu cần -->
@endsection
