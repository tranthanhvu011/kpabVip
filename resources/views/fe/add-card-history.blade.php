@extends('fe.layout.page')

@section('title', __('Lịch sử nạp thẻ'))
@include('fe.layout.dowloadAndProfile')

@section('content')
<div class="gaming-library">

      <div class="row d-flex justify-content-center ">
        <div class="col-md-10">
          <h2 class="text-uppercase text-center mb-5 info">Lịch sử nạp thẻ</h2>
          <table class="table">
            <thead>
              <tr>
                <th>Tài khoản</th>
                <th>Mệnh giá</th>
                <th>Loại thẻ</th>
                <th>Trạng thái</th>
                <th>Thời gian</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($items as $item)
                <tr>
                  <td>{{ $item->name }}</td>
                  <td>{{ number_format($item->amount, 0, ',', '.') }}</td>
                  <td>{{ $item->type }}</td>
                  <td>
                    @switch($item->status)
                      @case(\app\Models\FE\TransLog::STATUS_PROCESSING)
                        Đang xử lý
                        @break
                      @case(\app\Models\FE\TransLog::STATUS_SUCCESS)
                        Thành công
                        @break
                      @case(\app\Models\FE\TransLog::STATUS_WRONG_AMOUNT)
                        Thẻ lỗi
                        @break
                      @case(\app\Models\FE\TransLog::STATUS_ERROR)
                        Thẻ lỗi
                        @break
                      @default
                        Lỗi hệ thống
                    @endswitch
                  </td>
                  <td>{{ $item->date }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>

          @if($items)
 
              {!! $items->appends(request()->all())->render() !!}
          @endif
        </div>
      </div>
</div></div>
</div>
<br><br><br>
@stop

@section('css')
<style>
      th {
    font-family: Arial, sans-serif; /* Chọn font */
    font-size: 16px; /* Kích thước chữ */
    color: #EEEDEB; /* Màu chữ */
    line-height: 1.5; /* Độ cao dòng */
    margin: 10px 0; /* Khoảng cách trên dưới */
}

th{
    color: #EEEDEB; /* Màu chữ cho phần in đậm */
    h2{
    color: #22092C
  }
      .info {
    font-family: Arial, sans-serif; /* Chọn font */
    font-size: 16px; /* Kích thước chữ */
    color: #; /* Màu chữ */
    line-height: 1.5; /* Độ cao dòng */
    margin: 10px 0; /* Khoảng cách trên dưới */
}

.info  {
  
    color: #22092C; 
    font-size: 18px/* Màu chữ cho phần in đậm */
}
}
    </style>
@stop

@section('js')

@stop