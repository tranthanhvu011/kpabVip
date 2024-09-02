@extends('fe.layout.page')

@section('title', __('Kiếm Người Yêu Cùng Ngọc Rồng King'))

@section('content')
<div class="card-body">
            <div id="android-version" class="card-body d-none">
                <div class="fw-semibold text-center h5">TẢI GAME CHO ANDROID</div>
                <div class="text-center"><span class="fw-semibold">Cách 1: Phiên bản APK, tải về chơi ngay</span>
                    <div><a href="https://kpah4.com/filebrowser/KPAH4_230.apk" class="btn btn-success me-1 mt-1 py-1">Tải phiên bản gốc</a></div>
                </div>
                <div class="text-center mt-4"><span class="fw-semibold">Cách 2: Giả lập J2ME Loader (khuyên dùng)</span>
                    <div><a href="https://kpah4.com/filebrowser/KPAH4_AutoLogin.jar" class="btn btn-success me-1 mt-1 py-1">Tải phiên bản J2ME</a></div>
                </div>
                <div class="text-center mt-4"><span class="fw-semibold"><b>Những phiên bản java hỗ trợ trên J2ME Loader (khuyên dùng)</b></span>
                    <div><a href="https://kpah4.com/filebrowser/KPAH4_AutoLogin.jar" class="btn btn-success me-2 mt-1 py-1">KPAH4 Auto Login</a><a href="https://kpah4.com/filebrowser/KPAH4_MoHop_fix.jar" class="btn btn-success me-2 mt-1 py-1">KPAH4 Auto Mở Hộp</a><a href="https://kpah4.com/filebrowser/KPAH4_CheDo+TTL+Khoa21.jar" class="btn btn-success me-2 mt-1 py-1">KPAH4 Chế đồ, ttl, d2</a><a href="https://kpah4.com/filebrowser/KPAH4_NuoiPet.jar" class="btn btn-success me-2 mt-1 py-1">KPAH4 Auto Nuôi Pét</a><a href="https://kpah4.com/filebrowser/KPAH4_BảnGốc.jar" class="btn btn-success me-2 mt-1 py-1">KPAH4 PB Gốc</a></div>
                </div>
                <div class="mt-4">
                    <div class="h6">Hướng dẫn cách cài đặt</div>
                    <div><b>Bước 1:</b> Lên CHPlay tải J2Me Loader hoặc tải <a href="https://play.google.com/store/apps/details?id=ru.playsoftware.j2meloader&amp;hl=vi&amp;gl=US">tại
                            đây</a></div>
                    <div><b>Bước 2:</b> Tải một trong các phiên bản bên trên về máy</div>
                    <div><b>Bước 3:</b> Bấm mở trực tiếp phiên bản đã tải về hoặc vào J2MeLoader bấm dấu cộng, sau đó
                        tìm
                        phiên bản đã tải về rồi chạy
                    </div>
                    <br>
                    <div>Trước khi chạy, các bạn nhớ cài đặt màn hình, bàn phím ảo theo ý thích nhé</div>
                    <div>Video hướng dẫn: <a href="https://www.youtube.com/shorts/8ajySmPA-rQ">click để xem</a></div>
                </div>
                <div class="mt-4 text-center fw-semibold link-warning cursor-pointer" onclick="renderAllVersion()">Xem
                    tất cả phiên bản
                </div>
            </div>
            <div id="ios-version" class="card-body d-none">
                <div class="fw-semibold text-center h5">TẢI GAME CHO IOS</div>
                <div class="text-center mt-3"><span class="fw-semibold h6">Phiên bản 1: Màn Hình Ngang</span>
                    <div><a href="https://testflight.apple.com/join/QXJrzm9f" class="btn btn-success me-1 mt-1 py-1">KPAH4
                            Màn Ngang</a>
                        <div>Phiên bản màn hình xoay ngang, độ ổn định không tốt bằng màn hình dọc</div>
                    </div>
                </div>
                <div class="text-center mt-4"><span class="fw-semibold h6">Phiên bản 2: Màn Hình Dọc</span>
                    <div><a href="https://testflight.apple.com/join/QXJrzm9f" class="btn btn-success me-1 mt-1 py-1">KPAH4
                            Màn Dọc</a>
                        <div>Phiên bản màn hình dọc, độ ổn định cao, hỗ trợ nhiều tính năng tự động. Đặc biệt có <b>Auto Làm Đồ Và Auto Phím PK, auto Login và chơi được nhiều nick trên 1 pb. Độc quyền chỉ KPAH4 mới có!</b></div>
                    </div>
                </div>
                <div class="mt-4 text-center fw-semibold link-warning cursor-pointer" onclick="renderAllVersion()">Xem
                    tất cả phiên bản
                </div>
            </div>
            <div id="pc-version" class="card-body d-none">
                <div class="fw-semibold text-center h5">TẢI GAME CHO PC</div>
                <div class="text-center"><span class="fw-semibold">Cách 1: Phiên bản thuần PC, tải về chơi ngay</span>
                    <div><a href="https://kpah4.com/filebrowser/KPAH4_225.zip" class="btn btn-success me-1 mt-1 py-1">Tải phiên bản gốc</a></div>
                </div>
                <div class="text-center mt-4"><span class="fw-semibold">Cách 2: Chạy giả lập Java (Độ ổn định cao, nhiều tính năng)</span>
                    <div><a href="https://kpah4.com/filebrowser/KPAH4_AutoLogin.jar" class="btn btn-success me-2 mt-1 py-1">KPAH4 Auto Login</a><a href="https://kpah4.com/filebrowser/KPAH4_MoHop_fix.jar" class="btn btn-success me-2 mt-1 py-1">KPAH4 Auto Mở Hộp</a><a href="https://kpah4.com/filebrowser/KPAH4_CheDo+TTL+Khoa21.jar" class="btn btn-success me-2 mt-1 py-1">KPAH4 Auto Làm Đồ</a><a href="https://kpah4.com/filebrowser/KPAH4_NuoiPet.jar" class="btn btn-success me-2 mt-1 py-1">KPAH4 Auto Nuôi Pét</a><a href="https://kpah4.com/filebrowser/KPAH4_BảnGốc.jar" class="btn btn-success me-2 mt-1 py-1">KPAH4 PB Gốc</a></div>
                    <div class="mt-4">
                        <div class="h6">Hướng dẫn cách cài đặt</div>
                        <div><b>Bước 1:</b> Tải Microemulator: <a href="https://angelchip.net/files/share/AngelChipEmulatorEXE.zip">AngelChipEmulator.zip</a>
                        </div>
                        <div><b>Bước 2:</b> Tải một trong các phiên bản bên trên (Gợi ý: bản 211)</div>
                        <div><b>Bước 3:</b> Giải nén file AngelChipEmulator.zip đã tải ở bước 1</div>
                        <div><b>Bước 4:</b> Mở ứng dụng AngelChipEmulator.exe ở thư mục đã giải nén</div>
                        <div><b>Bước 5:</b> Kéo file game có đuôi .jar đã tải ở trên vào và bấm Start</div>
                        Trước khi bấm Start các bạn căn chỉnh lại kích thước sao cho dễ chơi nhất nhé
                    </div>
                </div>
                <div class="mt-4 text-center fw-semibold link-warning cursor-pointer" onclick="renderAllVersion()">Xem
                    tất cả phiên bản
                </div>
            </div>
            <div id="all-version" class="card-body">
                <div class="row">
                    <div class="col-md-6 mt-1">
                        <div class="card download-bg suggestion">
                            <div class="card-body text-center"><h5 class="card-title">Tải game cho Java</h5>
                                <p class="card-text">Nhấn vào đây để tải game cho điện thoại Java của bạn.</p><a href="https://kpah4.com/filebrowser/KPAH4_AutoLogin.jar" class="btn btn-success me-1 mt-1 py-1">Auto Login</a><a href="https://kpah4.com/filebrowser/KPAH4_MoHop_fix.jar" class="btn btn-success me-1 mt-1 py-1">Auto Mở Hộp</a><a href="https://kpah4.com/filebrowser/KPAH4_CheDo+TTL+Khoa21.jar" class="btn btn-success me-1 mt-1 py-1">Auto Làm Đồ</a></div>
                        </div>
                    </div>
                    <div class="col-md-6 mt-1">
                        <div class="card download-bg false">
                            <div class="card-body text-center"><h5 class="card-title">Tải game cho Android</h5>
                                <p class="card-text">Nhấn vào đây để tải game cho điện thoại Android của bạn.</p><a href="https://kpah4.com/filebrowser/KPAH4_230.apk" class="btn btn-success me-1 mt-1 py-1">Phiên bản gốc</a></div>
                        </div>
                    </div>
                    <div class="col-md-6 mt-1">
                        <div class="card download-bg suggestion">
                            <div class="card-body text-center"><h5 class="card-title">Tải game cho PC</h5>
                                <p class="card-text">Nhấn vào đây để tải game cho máy tính để bàn của bạn.</p><a href="https://kpah4.com/filebrowser/KPAH4_225.zip" class="btn btn-success me-1 mt-1 py-1">Phiên bản gốc</a></div>
                        </div>
                    </div>
                    <div class="col-md-6 mt-1">
                        <div class="card download-bg ">
                            <div class="card-body text-center"><h5 class="card-title">Tải game cho IOS</h5>
                                <p class="card-text">Nhấn vào đây để tải game cho điện thoại IOS của bạn.</p><a href="https://testflight.apple.com/join/QXJrzm9f" class="btn btn-success me-1 mt-1 py-1">KPAH4 Màn Ngang</a><a href="https://testflight.apple.com/join/QXJrzm9f" class="btn btn-success me-1 mt-1 py-1">KPAH4 Màn Dọc</a></div>
                        </div>
                    </div>
                </div>
                <div class="mt-4 text-center fw-semibold link-warning cursor-pointer" onclick="renderAppropriateVersion()">Xem phiên bản thích hợp
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