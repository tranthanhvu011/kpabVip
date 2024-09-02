@extends('fe.layout.page')

@section('title', __('Mở thành viên'))
@include('fe.layout.dowloadAndProfile')
@section('content')

<div class="gaming-library">
<div class="d-flex justify-content-center " >
<div class="col-8">
@php
    $account_info = auth()->user()->account;
    $namePlayer = $account_info->player ? $account_info->player->name : "Bạn chưa tạo nhân vật, hãy vào game tạo nhân vật và quay lại nhé !";
    $soDuXu = $account_info->xu;
@endphp
<div class="alert alert-dark text-center" role="alert">
  Số dư xu của bạn: {!!$soDuXu!!}
</div>
<div class="alert alert-warning text-center" role="alert">
Tên Nhân Vật:  {!! $namePlayer !!}</div>

</div>
</div>
<br>
<form action="{{ route('convertToXu') }}" method="POST">
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
                        <button type="submit" class="btn btn-primary btn-block">Đổi Xu</button>
</div>
                    </div>
</form>
<br>
<table class="table table-bordered" id="banggia" style="background: #ffecc3;">
        <tbody><tr>
            <th><small>Mệnh giá</small> 10,000đ</th>
            <td>10 triệu xu<span class="text-success"></span>
            </td>
        </tr>
        <tr>
            <th><small>Mệnh giá</small> 20,000đ</th>
            <td>20 triệu xu<span class="text-success"></span> 
            </td>
        </tr>
        <tr>
            <th><small>Mệnh giá</small> 30,000đ</th>
            <td>30 triệu xu<span class="text-success"></span> 
            </td>
        </tr>
        <tr>
            <th><small>Mệnh giá</small> 50,000đ</th>
            <td>60 triệu xu<span class="text-success"></span> 
            </td>
        </tr>
        <tr>
            <th><small>Mệnh giá</small> 100,000đ</th>
            <td>130 triệu xu<span class="text-success"></span> 
            </td>
        </tr>
        <tr>
            <th><small>Mệnh giá</small> 200,000đ</th>
            <td>280 triệu xu<span class="text-success"></span>
            </td>
        </tr>
        <tr>
            <th><small>Mệnh giá</small> 300,000đ</th>
            <td>435 triệu xu<span class="text-success"></span>
            </td>
        </tr>
        <tr>
            <th><small>Mệnh giá</small> 500,000đ</th>
            <td>750 triệu xu<span class="text-success"></span> 
            </td>
        </tr>
        <tr>
            <th><small>Mệnh giá</small> 1,000,000đ</th>
            <td>1tỷ700 triệu xu<span class="text-success"></span>
            </td>
        </tr>
    </tbody></table>
    </div>
<br><br><br>
@endsection
</div>
</div>
</div>
</div>
</div>

@section('css')
<style>
    .bootstrap-select .dropdown-menu {
    bottom: auto;
    top: 100%;
    margin-top: 0;
    margin-bottom: 0;
    transform: none !important;
}

</style>
    
@endsection

@section('js')

@endsection
