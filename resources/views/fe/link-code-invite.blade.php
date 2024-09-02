@extends('fe.layout.page')

@section('title', __('Mã giới thiệu'))
@include('fe.layout.dowloadAndProfile')

@section('content')
          <div class="gaming-library">
          <div class="" style="border-radius: 15px;">
            <div class="card-body bg-body-content p-5">
              <h2 class="text-uppercase text-center mb-5">Mã giới thiệu</h2>
                <div style="width: 100%; height: 50%">
                     <p style="font-size:16px; color:#ECFFE6; font-weight: 600">
- Hãy copy văn bản mẫu dưới đây và dán vào các nhóm NRO Zalo, Facebook, Youtuber,Tiktok... <br>
- Khi có càng nhiều người chơi tham gia bạn sẽ nhận được càng nhiều phần quà<br>
- Khuyến khích chia sẽ vào những group có càng đông người càng tốt (trên 500 người) <br>
- Chú ý hệ thống sẽ kiểm tra nếu bạn gian lận tự đăng ký qua link của mình sẽ không nhận được quà nhé !
Link giới thiệu của bạn là:
                    </p>
                        <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-9 ">
                    <div style="width:100%; height: 300px; ">
                        <textarea  style="width:100%; height: 80%; font-size: 18px" id="coppyCode" readonly>
- Khí Phách Anh Hùng New (kpahnew.com) Mở Test Đua Top Phần Thưởng Lên Đến 30tr Đồng
- Miễn Phí Nhiều Vật Phẩm
- Miễn Phí Lượng, Xu ,... 
- Đầy đủ nhiệm vụ, Full chức năng
- Lối chơi mới nhiều tính năng mới🥰
😘Link đăng ký và tải game: {{ route('code-invite', $code_invite) }}
</textarea>
            <div class="input-group-append">
                    <button style="width:30%" class="btn btn-success" type="button" id="linkInviteButton">Copy</button>
                </div>
                        </div>
</div>
 <div class="form-group">
                <p style="font-size:25px; color: #D24545">
                  Số lần sử dụng: <strong>{{ $account->invitation_used }}</strong>
                </p>
            
        </div>
</div>

    <!--<div class="row d-flex justify-content-center align-items-center h-100">-->
    <!--    <div class="col-12 col-md-9 col-lg-7 col-xl-6">-->
    <!--          <div class="input-group mb-3">-->
    <!--            <input type="text" id="linkInviteText" class="form-control" value="{{ route('code-invite', $code_invite) }}" readonly>-->
    <!--                    <div class="input-group-append">-->
    <!--                <button class="btn btn-nro" type="button" id="linkInviteButton1">Copy</button>-->
    <!--            </div>-->
    <!--            </div> -->
               
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
    
@stop

@section('js')
<script>
  $(document).ready(function(){
      $("#linkInviteButton").click(function(){
          var copyText = document.getElementById("coppyCode");
          copyText.select();
          copyText.setSelectionRange(0, 99999);
          document.execCommand("copy");
          alert("Đã copy!");
      });
  });
</script>
<script>
  $(document).ready(function(){
      $("#linkInviteButton1").click(function(){
          var copyText = document.getElementById("linkInviteText");
          copyText.select();
          copyText.setSelectionRange(0, 99999);
          document.execCommand("copy");
          alert("Đã copy!");
      });
  });
</script>
@stop