@extends ('layouts.two-column')

@section('main')
    @include($page)
@endsection

@section('sidebar')
    @include('parts.sidebar')
@endsection