<h3>Последние комментарии</h3>

<div class="post-comments">
    @if ($post->comments->count('id') === 0)  
        <p>Комментариев пока нет</p>
    @else
    <ul>
        @foreach ($post->comments->load('user') as $comment)
            <li>
                <i class="fa fa-comments" aria-hidden="true"></i><p>{{$comment->title}}</p>
                
                <span>{{$data->all($comment->created_at). ', '.$comment->user->name}}</span>
                <span class="hidden">{{$comment->comment}}</span> 
            </li>
        @endforeach
    </ul>
    @endif
</div>