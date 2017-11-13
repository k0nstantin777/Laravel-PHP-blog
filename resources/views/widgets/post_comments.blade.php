<h3>Последние комментарии</h3>

<div class="recent-comments">
    @if ($post->comments->count('*') === 0)  
        <p>Комментариев пока нет</p>
    @else
    <ul>
        @foreach ($post->comments as $comment)
            <li><a href="index.html" title="Comment on title">{{$comment->slug}}</a><br /> &#45; <cite>{{$comment->user->name}}</cite></li>
        @endforeach
    </ul>
    @endif
</div>