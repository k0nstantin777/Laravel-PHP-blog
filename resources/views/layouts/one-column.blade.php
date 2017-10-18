@extends ('layouts.base')

@section('header')
    @include('parts.header')
@endsection


@section('content')
    <div id="content-wrap">
        <!-- content -->
        
            <div id="center">
                @section('main')
                @show
            </div>
            <!-- /main -->
        
        <!-- content -->
    </div>
@endsection

@section('footer_first')
    @include('parts.footer_first')
@endsection

@section('footer_second')
    @include('parts.footer_second')
@endsection
