@extends('fe.layout.page')

@section('title', __('Kiếm Người Yêu Cùng Ngọc Rồng King'))

@section('content')
<div class="row">
  <div class="col-sm-3">
    <div class="form-group">
      <select class="selectpicker form-control ">
        <option value="">Mustard</option>
        <option>Ketchup</option>
        <option>Relish</option>
      </select>
    </div>
  </div>
</div>
@stop

@section('css')
    <style>
        .box-stt {
            font-size: 15px;
            margin-bottom: 10px;
        }
        .box-stt a {
            text-decoration: none !important;
            color: black;
            font-weight: bold;
        }
    </style>
@stop

@section('js')
    
@stop