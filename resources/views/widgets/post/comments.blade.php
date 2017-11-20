<h3>Последние комментарии</h3>

<div class="recent-comments">
    @if ($post->comments->count('id') === 0)  
        <p>Комментариев пока нет</p>
    @else
    <ul>
        @foreach ($post->comments as $comment)
            <li><i class="fa fa-comments" aria-hidden="true"></i><a href="index.html" title="Comment on title">{{$comment->title}}</a><br />  <cite>&#45; {{$comment->user->name}}</cite></li>
        @endforeach
    </ul>
    @endif
</div>