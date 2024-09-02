@extends('fe.layout.page')

@section('title', __('Tải game phiên bản android'))

@section('content')
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="" style="border-radius: 15px;">
            <div class="card-body bg-body-content p-5">
              <h2 class="text-uppercase text-center mb-5">Phiên bản Android</h2>
              <h6 style="color:red"> Lưu ý : Bản mod nào ở trên đầu thì bản mod đó mới nhất </h6>
              <p style="font-size: 20px;" >- Phiên Bản Mới Nhất Cực Mượt: <a href="{{ asset('download/NROKING (3).apk') }}" class="text-bold text-dark">Tại đây</a></p>
                       <p style="font-size: 20px;" >- Phiên Bản Cực Hay Cực Mượt: <a href="{{ asset('download/NgocRongKingApk.apk') }}" class="text-bold text-dark">Tại đây</a></p>
       
                
    
      
            </div>
          </div>
        </div>
      </div>
@stop

@section('css')
    
@stop

@section('js')

@stop