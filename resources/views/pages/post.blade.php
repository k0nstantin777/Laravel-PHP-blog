<article class="post">

    @if (!$post)
        <span>Нет постов для отображения</span>
    @else
        <h2>{{$post->title}}</h2>

        <div class="image-section">
                <img src="{{stripos($post->image, 'http') !== false ? $post->image : config('blog.userImagesPath').$post->image}}" alt="image post" height="256" width="498"/>
        </div>
        
        <p class="text">{{$post->fulltext}}</p>
        <div class='clearfix'></div>
        @include ('widgets.post.info')
        @include('widgets.post.options')
    @endif
</article>
@include('widgets.post.comments')
@include('widgets.forms.comment')
