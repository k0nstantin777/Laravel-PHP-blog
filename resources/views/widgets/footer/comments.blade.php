<h3>Последние комментарии</h3>

<div class="recent-comments">
    <ul>
        @foreach($comments as $comment)
            <li><a href="index.html" title="Comment on title">{{$comment->title}}</a><br /> <cite> &#45; {{$comment->user->name}}</cite></li>
        @endforeach
    </ul>
</div>