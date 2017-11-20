<article class="post">

    @if (!$post)
        <span>Нет постов для отображения</span>
    @else
        <h2>{{$post->title}}</h2>

        <div class="image-section">
                <img src="{{$post->image}}" alt="image post" height="256" width="498"/>
        </div>

        <p class="text">{{$post->fulltext}}</p>
        @include ('widgets.post.info')
        @include('widgets.post.options')
    @endif
</article>
@include('widgets.post.comments')
@include('widgets.forms.comment')
