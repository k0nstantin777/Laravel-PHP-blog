@extends ('layouts.base')

@section('header')
    @include('parts.header')
@endsection


@section('content')
    <div id="content-wrap" class="container">
        <!-- content -->
        <div id="content" class="row">
            <!-- main -->
            <div id="main"  >
                <div class="col-lg-9 col-md-8 col-sm-12">
                @section('main')
                @show
                </div>
            </div>
            <!-- /main -->
            <!-- sidebar -->
            <div id="sidebar" class="col-lg-3 col-md-4 col-sm-12">
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
