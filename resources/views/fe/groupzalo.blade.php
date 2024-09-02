@extends('fe.layout.page')

@section('title', __('Khí Phách Anh Hùng New'))
@include('fe.layout.dowloadAndProfile')

@section('content')


@section('css')
<style>
      .item img:hover {
        background-color: #D6EFD8;
        cursor: pointer;
      }
    </style>
<div style="background-color: #41B06E;" class="most-popular">
            <div class="row">
              <div class="col-lg-12">
                <div class="heading-section">
                  <h4 style="color: black"><em>Box Chat</em> Tất Cả Của Ae Cần</h4>
                </div>
                <div class="row">
               
                  <div class="col-lg-3 col-sm-6">
                      <a href="https://www.tiktok.com/@kpah.new?_t=8nyn04ohYue&_r=1">
                    <div class="item">
                      <img style="width: 30%" src="assets/images/6ndKi1k.png" alt="">
                      <h4>Trang tiktok<br><span>Nhấp vào đây</span></h4>
                      <ul>
                        <li><i class="fa fa-star"></i> 4.8</li>
                        <li><i class="fa fa-download"></i> 2.3M</li>
                      </ul>
                    </div>
                    </a>
                  </div>
                  <div class="col-lg-3 col-sm-6">
                      <a href="https://www.facebook.com/profile.php?id=61561992646219">
                    <div class="item">
                      <img style="width: 30%" src="assets/images/6ndKi1k.png" alt="">
                      <h4>Trang Facebook<br><span>Nhấp vào đây</span></h4>
                      <ul>
                        <li><i class="fa fa-star"></i> 4.8</li>
                        <li><i class="fa fa-download"></i> 2.3M</li>
                      </ul>
                    </div>
                    </a>
                  </div>
                    <div class="col-lg-3 col-sm-6">
                      <a href="https://www.facebook.com/groups/1224610825646352">
                    <div class="item">
                      <img style="width: 30%" src="assets/images/6ndKi1k.png" alt="">
                      <h4>Group Facebook<br><span>Nhấp vào đây</span></h4>
                      <ul>
                        <li><i class="fa fa-star"></i> 4.8</li>
                        <li><i class="fa fa-download"></i> 2.3M</li>
                      </ul>
                    </div>
                    </a>
                  </div>
                  <div class="col-lg-3 col-sm-6">
                                            <a href="">
                    <div class="item">
                      <img style="width: 30%" src="assets/images/6ndKi1k.png" alt="">
                      <h4>Trang Youtube<br><span>Nhấp vào đây</span></h4>
                      <ul>
                        <li><i class="fa fa-star"></i> 4.8</li>
                        <li><i class="fa fa-download"></i> 2.3M</li>
                      </ul>
                    </div>
                    </a>
                  </div>
                  <div class="col-lg-3 col-sm-6">
                                            <a href="https://zalo.me/g/dlgody498">

                    <div class="item">
                      <img style="width: 30%" src="assets/images/6ndKi1k.png" alt="">
                      <h4>Box Zalo 1<br><span>Nhấp vào đây</span></h4>
                      <ul>
                        <li><i class="fa fa-star"></i> 4.8</li>
                        <li><i class="fa fa-download"></i> 2.3M</li>
                      </ul>
                    </div>
                    </a>
                  </div>
                  <div class="col-lg-3 col-sm-6">
                                            <a href="https://zalo.me/g/bauxzl120">
                    <div class="item">
                      <img style="width: 30%" src="assets/images/6ndKi1k.png" alt="">
                      <h4>Box Zalo 2<br><span>Nhấp vào đây</span></h4>
                      <ul>
                        <li><i class="fa fa-star"></i> 4.8</li>
                        <li><i class="fa fa-download"></i> 2.3M</li>
                      </ul>
                    </div>
                    </a>
                  </div>
              <div class="col-lg-3 col-sm-6">
                                            <a href="https://zalo.me/g/uukkka140">
                    <div class="item">
                      <img style="width: 30%" src="assets/images/6ndKi1k.png" alt="">
                      <h4>Box Zalo 3<br><span>Nhấp vào đây</span></h4>
                      <ul>
                        <li><i class="fa fa-star"></i> 4.8</li>
                        <li><i class="fa fa-download"></i> 2.3M</li>
                      </ul>
                    </div>
                    </a>
                  </div>

                  <div class="col-lg-12">
                    <div class="main-button">
                      <a style="background-color: #939185"  href="{{ route('register') }}">Đăng Ký Ngay</a>
                    </div>
                    
                  </div>
                  
                </div>
                
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


@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            // Check if the modal has been shown within the last 30 minutes
            const lastShown = localStorage.getItem('welcomeModalLastShown');
            const now = new Date().getTime();

            if (!lastShown || now - lastShown > 30 * 60 * 1000) {
                $('#welcomeModal').modal('show');
                localStorage.setItem('welcomeModalLastShown', now);
            }
        });
    </script>
@stop
