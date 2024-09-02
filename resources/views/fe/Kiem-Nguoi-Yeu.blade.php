@extends('fe.layout.page')

@section('title', __('Kiếm Người Yêu Cùng Ngọc Rồng King'))

@section('content')
    <div class="row">
        <div class="col pl-4 pr-4">
            <h1>Người Yêu Ngọc Rồng King</h1>
            <div class="text-left">    
                <!--<p><strong>NHỚ XÓA DỮ LIỆU ĐỂ THẤY VẬT PHẨM ITEM MỚI NHÉ !</strong></p>-->
                <!--<p><strong>Bắt đầu từ 9h Sáng Ngày 9/9/2023 - hết ngày 9/10/2023</strong></p>-->
                <!--<p><strong>1/ GiftCode Trung Thu : </strong></p>-->
                    <p>
    <Strong>Boss Tú Bà Bunma Xuất Hiện Ở Tất Cả Các Map ! </Strong> <br>
        <Strong>Khi tiêu diệt được boss Tú Bà Bunma sẽ nhận được 1 lá thư tỏ tình</Strong><br>
                <Strong>Mở Lá Thư Tỏ Tình Sẽ Nhận Được Người Yêu Nhé !</Strong>

                </p>
            </div>
            <div class="text-center mb-5 image-container">
                <img class="rounded" src="{{ asset('assets/images/nguoiyeu112.png') }}" style="max-width: 100%; height: auto;">
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