@extends('fe.layout.page')

@section('title', __('Tải game phiên bản PC'))
@include('fe.layout.dowloadAndProfile')
@section('content')
<div class="most-popular">
            <div class="row">
              <div class="col-lg-12">
                <div class="heading-section">
                  <h4 style="color: black"><em>Phiên Bản Game</em> Tất Cả Phiên Bản Của Game</h4>
                </div>
                <div class="row">
               
                  <div class="col-lg-3 col-sm-6">
                    <div class="item">
                      <img src="assets/images/jarne.png" alt="">
                      <h4>BẢN JAR<br><span>Nhấp vào đây</span></h4>
                      <ul>
                        <li><i class="fa fa-star"></i> 4.8</li>
                        <li><i class="fa fa-download"></i> 2.3M</li>
                      </ul>
                    </div>
                    
                  </div>
                  <div class="col-lg-3 col-sm-6">
                    <div class="item">
                      <img src="assets/images/androine.png" alt="">
                      <h4>BẢN APK<br><span>Nhấp vào đây</span></h4>
                      <ul>
                        <li><i class="fa fa-star"></i> 4.8</li>
                        <li><i class="fa fa-download"></i> 2.3M</li>
                      </ul>
                    </div>
                    
                  </div>
                  <div class="col-lg-3 col-sm-6">
                    <div class="item">
                      <img src="assets/images/pcne.png" alt="">
                      <h4>BẢN PC<br><span>Nhấp vào đây</span></h4>
                      <ul>
                        <li><i class="fa fa-star"></i> 4.8</li>
                        <li><i class="fa fa-download"></i> 2.3M</li>
                      </ul>
                    </div>
                    
                  </div>
                  <div class="col-lg-3 col-sm-6">
                    <div class="item">
                      <img src="assets/images/iosne.png" alt="">
                      <h4>BẢN IOS<br><span>Nhấp vào đây</span></h4>
                      <ul>
                        <li><i class="fa fa-star"></i> 4.8</li>
                        <li><i class="fa fa-download"></i> 2.3M</li>
                      </ul>
                    </div>
                  </div>
                 
                  <!-- <div class="col-lg-3 col-sm-6">
                    <div class="item">
                      <img src="assets/images/download.gif" alt="">
                      <h4>Tải Game Tại Đây<br><span>Nhấp vào đây</span></h4>
                      <ul>
                        <li><i class="fa fa-star"></i> 4.8</li>
                        <li><i class="fa fa-download"></i> 2.3M</li>
                      </ul>
                    </div>
                    
                  </div>
                  <div class="col-lg-3 col-sm-6">
                    <div class="item">
                      <img src="assets/images/download.gif" alt="">
                      <h4>Tải Game Tại Đây<br><span>Nhấp vào đây</span></h4>
                      <ul>
                        <li><i class="fa fa-star"></i> 4.8</li>
                        <li><i class="fa fa-download"></i> 2.3M</li>
                      </ul>
                    </div>
                  </div>
                  <div class="col-lg-3 col-sm-6">
                    <div class="item">
                      <img src="assets/images/download.gif" alt="">
                      <h4>Tải Game Tại Đây<br><span>Nhấp vào đây</span></h4>
                      <ul>
                        <li><i class="fa fa-star"></i> 4.8</li>
                        <li><i class="fa fa-download"></i> 2.3M</li>
                      </ul>
                    </div>
                    
                  </div>
                  <div class="col-lg-3 col-sm-6">
                    <div class="item">
                      <img src="assets/images/download.gif" alt="">
                      <h4>Tải Game Tại Đây<br><span>Nhấp vào đây</span></h4>
                      <ul>
                        <li><i class="fa fa-star"></i> 4.8</li>
                        <li><i class="fa fa-download"></i> 2.3M</li>
                      </ul>
                    </div>
                  </div> -->
                  </div>
                  </div>
                  </div>
                  </div>
                  </div>
                  </div>
                  <br>
                  <br><br>
      <!-- <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="" style="border-radius: 15px;">
            <div class="card-body bg-body-content p-5">
              <h2 class="text-uppercase text-center mb-5">Phiên bản PC</h2>
                            <h6 style="color:red"> Lưu ý : Bản mod nào ở trên đầu thì bản mod đó mới nhất </h6>
<p style="font-size: 20px;" >- Phiên Bản Mới Nhất Cực Mượt: <a href="{{ asset('download/NgocRongKing (3).zip') }}" class="text-bold text-dark">Tại đây</a></p>
<p style="font-size: 20px;" >- Phiên Bản Cho Máy 32bit Cực Mượt: <a href="{{ asset('download/KINGPC32Bit.zip') }}" class="text-bold text-dark">Tại đây</a></p>
                                <p style="font-size: 20px;" >- Phiên Bản Cực Hay Cực Mượt: <a href="{{ asset('download/NgocRongKing.zip') }}" class="text-bold text-dark">Tại đây</a></p>
              
              

              <p style="font-size: 20px;" >- Tải Phiên Bản Mới và Mới Nhất: <a href="{{ asset('download/PC - Love.zip') }}" class="text-bold text-dark">Tại đây</a></p>
            </div>
          </div>
        </div>
      </div>
      </div>
        </div>
      </div> -->
@stop

@section('css')
    <style>
      .item img:hover {
        background-color: #D6EFD8;
        cursor: pointer;
      }
    </style>
@stop

@section('js')

@stop