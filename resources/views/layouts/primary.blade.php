@extends ('layouts.two-column')

@section('main')
    @include($page)
@endsection

@section('sidebar')
    <div class="sidebar_widget">
        @include('widgets.sidebar.me')
    </div>
    <div class="sidebar_widget">
        @include('widgets.sidebar.categories')
    </div>
    <div class="sidebar_widget">
        @include('widgets.sidebar.favorite_post')
    </div>
    <div class="sidebar_widget">
        @include('widgets.sidebar.popular_posts')
    </div>  
    
@endsection