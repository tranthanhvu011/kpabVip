@extends('fe.layout.page')

@section('title', __('Nạp số dư'))
@include('fe.layout.dowloadAndProfile')

@section('content')
<div class="gaming-library">

      <div class="row d-flex justify-content-center">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="" style="border-radius: 15px;">
            <div class="card-body bg-body-content p-5">
              
              <h2 class="text-uppercase text-center mb-5">Nạp số dư</h2>
              {!! Form::open(['route' => ['add-card'], 'method' => 'POST', 'autocomplete' => 'off']) !!}
                <div class="form-outline mb-4 info">
                  {!! Form::label('card_type', 'Chọn loại thẻ', ['class' => 'form-label']) !!}
                  {!! Form::select('card_type', ['' => 'Chọn loại thẻ'] + $cards_type, null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-outline mb-4 info">
                  {!! Form::label('card_amount', 'Chọn mệnh giá', ['class' => 'form-label']) !!}
                  {!! Form::select('card_amount', ['' => 'Chọn mệnh giá'] + $cards_amount, null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-outline mb-4 info">
                  {!! Form::label('serial', 'Số serial', ['class' => 'form-label']) !!}
                  {!! Form::text('serial', null, ['class' => "form-control", 'placeholder' => "Số serial", 'autocomplete' => 'off']) !!}
                </div>
                <div class="form-outline mb-4 info">
                  {!! Form::label('pin', 'Mã thẻ', ['class' => 'form-label']) !!}
                  {!! Form::text('pin', null, ['class' => "form-control", 'placeholder' => "Mã thẻ", 'autocomplete' => 'off']) !!}
                </div>
                <div class="d-flex justify-content-center">
                  <button type="submit" id="add-card-button" class="btn btn-success btn-block gradient-custom-4">Nạp ngay</button>
                </div>

                <div class="text-center mt-3"> <a href="{{ route('add-card-history') }}" class="info"><i class="fas fa-hand-point-right" aria-hidden="true"></i>
                  Xem tình trạng nạp thẻ <i class="fas fa-hand-point-left" aria-hidden="true"></i></a> </div>
              {!! Form::close() !!}
            </div>
          </div>
        </div>
      </div>
      </div>
      </div>
</div>
<br>
<br><br>
@stop

@section('css')
<style>
  h2{
    color: #D6EFD8
  }
      .info {
    font-family: Arial, sans-serif; /* Chọn font */
    font-size: 16px; /* Kích thước chữ */
    color: #; /* Màu chữ */
    line-height: 1.5; /* Độ cao dòng */
    margin: 10px 0; /* Khoảng cách trên dưới */
}
.card {
  color: #D6EFD8,
  background-color: #D6EFD8
}
.info  {
  
    color: #D6EFD8; 
    font-size: 18px/* Màu chữ cho phần in đậm */
}
    </style>
@stop

@section('js')

@stop