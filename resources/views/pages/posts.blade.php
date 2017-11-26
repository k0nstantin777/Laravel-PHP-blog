@if ($posts->count('id') === 0)
     <p class="center">Нет постов для отображения</p>
@else

    @foreach ($posts as $post)
    <article class="post">
        <div class="primary">
            @include('parts.post')
            @include('widgets.post.read_more')
            @include('widgets.post.options')
        </div>
        @include('widgets.post.aside')

    </article>
    @endforeach
    
    {{$posts->links()}}
    
@endif    


