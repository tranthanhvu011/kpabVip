@extends('fe.layout.page')

@section('title', __('Sự Kiện Hào Quang Rực Rở'))
@include('fe.layout.dowloadAndProfile')

@section('content')
<div class="most-popular">

    <div class="row">
        <div class="col pl-4 pr-4">
            <h1>Sự Kiện Hào Quang Rực Rở</h1>

            </div>
            <div class="text-left">    
                <!--<p><strong>NHỚ XÓA DỮ LIỆU ĐỂ THẤY VẬT PHẨM ITEM MỚI NHÉ !</strong></p>-->
                <!--<p><strong>Bắt đầu từ 9h Sáng Ngày 9/9/2023 - hết ngày 9/10/2023</strong></p>-->
                <!--<p><strong>1/ GiftCode Trung Thu : </strong></p>-->
                    <p>
SỰ KIỆN HÀO QUANG RỰC RỞ <br>
Bắt đầu từ 12h ngày 24-2 đến hết ngày 27/2<br>
- Giftcode: haoquang (mỗi tài khoản chỉ nhập 1 lần duy nhất)<br>
- Nhận x1 hào quang rực rở chỉ số max 10-22% + 1 bộ ngọc rồng tết + bộ ngọc rồng tân thủ.<br>
- Mỗi lần Quy Đổi 20k bạn sẽ nhận được 1 Hộp Hào Quang Rực Rở <br>
Mở hộp quà ra nhận được: x1 Hào quang rực rở tỉ lệ vĩnh viễn cao chỉ số từ 10-22% + 1 viên ngọc rồng 3 sao + 1 Bộ ngọc rồng tết<br>
Quy đổi không giới hạn ở NPC trong nhà<br>
CHÚC AE CHƠI GAME VUI VẺ NHÉ !<br>
                </p>
            </div>
            <div class="text-center mb-5 image-container">
                <img class="rounded" src="{{ asset('assets/images/haoquangrucro.png') }}" style="max-width: 100%; height: auto;">
            </div>
        </div>
    </div>
</div>
</div>
    </div>
</div>
<br><br><br>
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
     p {
        font-size: 16px;
        color : black;
        font-family: 'Poppins', sans-serif;
        font-weight: 600
    }
    .most-popular {
        background: #FFFED3
    }
    h1{
        color: #DA7297
    }
    </style>
@stop

@section('js')
    
@stop