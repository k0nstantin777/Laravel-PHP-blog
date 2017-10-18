@extends ('layouts.base')

@section('header')
    @include('parts.header')
@endsection


@section('content')
    <div id="content-wrap">
        <!-- content -->
        <div id="content" class="clearfix">
            <!-- main -->
            <div id="main">
                @section('main')
                @show
            </div>
            <!-- /main -->
            <!-- sidebar -->
            <div id="sidebar">
                @section('sidebar')
                @show
            </div>
            <!-- /sidebar -->
        </div>
        <!-- content -->
    </div>
                    
@endsection

@section('footer_first')
    @include('parts.footer_first')
@endsection

@section('footer_second')
    @include('parts.footer_second')
@endsection
