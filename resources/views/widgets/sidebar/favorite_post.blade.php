<div class="sidemenu ">

    <h3>Избранный пост</h3>
    
    @if (!$post)
    
    <span>Избранный пост не установлен</span>
    
    @else
    <ul>
        <li>
            <a href="{{route('post.show', $post->slug)}}" title="Читать">
                <img src="{{$post->image}}" width="160" height="120" alt="{{$post->image}}" />
                <p>{{$post->title}}</p>
            </a>
        </li>

    </ul>
    @endif

</div>

