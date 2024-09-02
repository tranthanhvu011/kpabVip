<br>
<br>
<br>
<br>
<br>
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="header-text">
          <h4 style="color:transparent">Cực Hay</h4>
          <div class="text-center">
            <img style="width: 30%;" src="{{ asset('assets/images/4306971-03.png') }}" alt="">
          </div>
          <div class="main-button1 text-center">
            <a href="{{ asset('download/KPAHNEW_NHD4.apk') }}"><img src="{{ asset('assets/images/DL_APK.png') }}" alt=""></a>
            <a href="{{ asset('download/PC.zip') }}"><img src="{{ asset('assets/images/DL_PC.png') }}" alt=""></a>
            <a href="tai-game-ios"><img src="{{ asset('assets/images/DL_IOS.png') }}" alt=""></a>
            <a href="{{ asset('download/KPAHNEW.jar') }}"><img src="{{ asset('assets/images/DL_GGP.png') }}" alt=""></a>
          </div>
          @if(auth()->check())
          <div class="bottom-header mt-3">
            <div class="text-center">
              @php
                $account_info = auth()->user()->account;
                $nameUsers = $account_info->username;
                $tichdiem = $account_info->tichdiem;
                $admin = $account_info->admin;
                $avatar_url = asset('assets/images/6ndKi1k.png');
              @endphp
              {!! '<div style="color: red"><img src="' . $avatar_url . '" alt="Avatar" style="width: 50px">' !!}
              {!! $nameUsers !!}</div>
              <p style="color: red" class="pt-0">Số dư: <strong>{{ number_format($account_info->vnd, 0, ',', '.') }} VNĐ</strong></p>
            </div>
            <div class="row d-flex justify-content-center align-items-center">
              <div class="col-md-10 text-center">
                <div class="button-column">
                  <a href="{{ route('home') }}" class="btn btn-danger mb-2"><i class="fa fa-home" aria-hidden="true"></i> Trang chủ</a>
                  <a href="{{ route('profile') }}" class="btn btn-danger mb-2">
                    <span class="fas fa-user" aria-hidden="true"></span>
                    {{ $nameUsers }}
                  </a>
                  <a class="btn btn-dark mb-2" href="{{ route('add-card') }}"><i class="fa fa-money" aria-hidden="true"></i> Nạp số dư</a>
                  <a class="btn btn-dark mb-2" href="link-gioi-thieu"><i aria-hidden="true"></i> Giới Thiệu Nhận Quà</a>
                  <a class="btn btn-dark mb-2" href="{{ route('convertToXu') }}"><i class="fa fa-money" aria-hidden="true"></i> Quy đổi xu</a>
                  <a class="btn btn-dark mb-2" href="{{ route('convertToLuong') }}"><i class="fa fa-money" aria-hidden="true"></i> Quy đổi lượng</a>
                  <a class="btn btn-success mb-2" href="mo-thanh-vien"><i class="fa fa-money" aria-hidden="true"></i> Mở Thành Viên</a>
                  <a href="groupzalo" class="btn btn-info mb-2"> Box Cộng Đồng</a>

                </div>
              </div>
            </div>
          </div>
          @else
          <div class="row d-flex justify-content-center align-items-center">
            <div class="col-md-10 text-center">
              <div class="button-column">
                <a href="{{ route('home') }}" class="btn btn-dark mb-2"><i class="fa fa-home" aria-hidden="true"></i> Trang chủ</a>
                <a href="{{ route('login') }}" class="btn btn-dark mb-2"><i class="fa fa-sign-in" aria-hidden="true"></i> Đăng nhập</a>
                <a href="{{ route('register') }}" class="btn btn-dark mb-2"><i class="fa fa-registered" aria-hidden="true"></i> Đăng ký</a>
                <a href="groupzalo" class="btn btn-dark mb-2"> Box Cộng Đồng</a>

              </div>
            </div>
          </div>
          @endif
          @yield('dowloadAndProfile')
        </div>
      </div>
</div>

