@foreach ($posts as $post)
<article class="post">
    <div class="primary">
        @include('parts.post')
        @include('widgets.read_more')  
    </div>
    @include('widgets.aside')
      
</article>
@endforeach


