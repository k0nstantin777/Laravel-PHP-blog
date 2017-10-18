@extends ('layouts.two-column')

@section('main')
    @include($page)
@endsection

@section('sidebar')
    @include('widgets.me')
    @include('widgets.categories')
    @include('widgets.favorite_post')
    @include('widgets.popular_posts')
@endsection