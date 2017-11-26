<h3>Последние комментарии</h3>

<div class="recent-comments">
    <ul>
        @foreach($comments->load('user') as $comment)
            <li><a href="{{route('post.show', $comment->post->slug)}}" title="Перейти в пост">{{$comment->title}}</a><br /> <cite> &#45; {{$comment->user->name}}</cite></li>
        @endforeach
    </ul>
</div>