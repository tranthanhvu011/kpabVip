@extends('fe.layout.page')

@section('title', __('Tải game phiên bản IOS'))
@include('fe.layout.dowloadAndProfile')

@section('content')
<div class="most-popular">
      <div class="row d-flex justify-content-center text-center">
        <div class="col-12 col-md-9 col-lg-7 col-xl-12">
          <div class="" style="border-radius: 15px;">
            <div class="card-body bg-body-content p-5 ">
              <h2 id="ios-version" class="text-uppercase text-center mb-5">Phiên bản IOS</h2>
              <h4 class="text-danger" >Phiên Bản TestFlight Khí Phách Anh Hùng New!</h4>
              <h6> <strong>Bước 1: </strong> Cài đặt TestFlight từ AppStore <a class="text-dark

" href="https://apps.apple.com/vn/app/testflight/id899247664">Tại đây</a><br>
              	<strong>Bước 2: </strong> Sau khi tải xong TestFlight Thì Bạn Nhấn Vào  <a class="text-dark" href="https://testflight.apple.com/join/W9cizKBY"> Tải Game Tại đây </a> <br>
              	* Làm theo hướng dẫn trong TestFlight và trải nghiệm </h5>	
              </div>
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
window.onload = function() {
  // Tìm thẻ H2 bằng ID
  var h2Element = document.getElementById('ios-version');
  
  // Nếu tìm thấy thẻ H2, cuộn đến vị trí của nó
  if(h2Element) {
    h2Element.scrollIntoView({behavior: "smooth", block: "center"});
  }
};
</script>
@stop