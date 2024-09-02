@extends('fe.layout.page')

@section('title', __('Tạo bài viết mới'))
@include('fe.layout.dowloadAndProfile')

@section('content')
      <div class="row d-flex justify-content-center ">
        <div class="col-12 col-md-9 col-lg-8 col-xl-8">
          <div class="" style="border-radius: 15px;">
            <div class="card-body bg-body-content p-5">
            <div class="card text-white bg-info mb-3 text-center">
  <div style="background-color: #131842" class="card-body ">
    Tạo Bài Viết
  </div>
</div>     
              {!! Form::open(['route' => ['forum.store'], 'method' => 'POST', 'autocomplete' => 'off']) !!}
                <div class="form-outline mb-4">
                  {!! Form::label('title', 'Tiêu đề', ['class' => 'form-label']) !!}
                  {!! Form::text('title', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-outline mb-4">
                  {!! Form::label('content', 'Nội dung', ['class' => 'form-label']) !!}
                  {!! Form::textarea('content', null, ['class' => 'form-control tinyMCE']) !!}
                </div>
                <div class="d-flex justify-content-center">
                  <button type="submit" id="add-card-button" class="btn btn-success btn-block gradient-custom-4">Đăng bài</button>
                </div>
                </div>

              {!! Form::close() !!}
            </div>
          </div>
        </div>
      </div>
      </div>
<br><br><br><br>
@stop

@section('css')
    
@stop

@section('js')
<script>
  $('textarea.tinyMCE').summernote({
    height: 250,
    toolbar: [
        // [ 'style', [ 'style' ] ],
        [ 'font', [ 'bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear'] ],
        // [ 'fontname', [ 'fontname' ] ],
        // [ 'fontsize', [ 'fontsize' ] ],
        // [ 'color', [ 'color' ] ],
        [ 'para', [ 'ol', 'ul', 'paragraph', 'height' ] ],
        [ 'table', [ 'table' ] ],
        [ 'insert', [ 'link'] ],
        [ 'view', [ 'undo', 'redo', 'fullscreen', 'codeview', 'help' ] ]
    ]
  });
</script>
@stop