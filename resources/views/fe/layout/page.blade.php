@extends('fe.layout.master')

@inject('layoutHelper', 'JeroenNoten\LaravelAdminLte\Helpers\LayoutHelper')

@section('adminlte_css')
    @stack('css')
    @yield('css')
@stop

@section('classes_body', $layoutHelper->makeBodyClasses())

@section('body_data', $layoutHelper->makeBodyData())

@section('body')
    <div class="">
        {{-- Header --}}
        @include('fe.layout.header')

        <div class="container">

        <div  class="flash-message pt-3 pb-3 pl-3 pr-3">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            @include('fe.layout.flash-message')
                        </div>
                    </div>
                </div>
            <div class="bg-body-content">
                @yield('content')
                
            </div>
        </div>
        
        {{-- Footer --}}
        @include('fe.layout.footer')
    </div>
</div>
</div>

@stop

@section('adminlte_js')
    @stack('js')
    @yield('js')
@stop
