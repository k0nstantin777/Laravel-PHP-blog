@if (session('register'))
    <div class="alert alert-success">
        <p>{{session('register')}}</p>
    </div>
@endif

@include('pages.posts')