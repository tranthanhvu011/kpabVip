
<header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <a style="width: 20%;" href="{{ route('home') }}" class="">
                        <img src="{{ asset('assets/images/kpahnew.png') }}" alt="">
                    </a>
                    @if(auth()->check())
                    @php
                    $account_info = auth()->user()->account;
                    $nameUsers = $account_info->username;
                    $tichdiem = $account_info->tichdiem;
                    $admin = $account_info->admin;
                    $avatar_url = asset('assets/images/6ndKi1k.png');

                @endphp
                    <!-- ***** Logo End ***** -->
                    <ul class="nav">
                   <li> <a href="{{ route('home') }}" class="active">Trang Chủ</a></strong>
                        <li><a href="{{ route('add-card') }}">Nạp Thẻ</a></li>
                        <li><a href="{{ route('convertToLuong') }}">Quy Đổi Xu</a></li>
                        <li><a href="{{ route('convertToXu') }}">Quy Đổi Lượng</a></li>
                        <li><a href="groupzalo">Box Cộng Đồng</a></li>
                        <li><a href="{{ route('profile') }}">{!! $nameUsers !!}
                            <img src="{{ $avatar_url }}" alt=""></a></li>
                    </ul>   
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
                @else
                <ul class="nav">
                   <li> <a href="{{ route('home') }}" class="active">Trang Chủ</a></strong>
                        <li><a href="{{ route('add-card') }}">Nạp Thẻ</a></li>
                        <li><a href="{{ route('register') }}">Đăng Ký</a></li>
                        <li><a href="{{ route('login') }}">Đăng Nhập</a></li>
                        <li><a href="groupzalo">Box Cộng Đồng</a></li>
                        <li><a href="dang-nhap">Thông Tin Tài Khoản<img src="{{ asset('assets/images/6ndKi1k.png') }}" alt=""></a></li>
                        
                    </ul>   
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
@endif
            </div>
        </div>
    </div>
     
  </header>


