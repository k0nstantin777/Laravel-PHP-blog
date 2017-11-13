<aside>

    <p class="dateinfo">{{$data->month($post->created_at)}}<span>{{$data->day($post->created_at)}}</span></p>

    <div class="post-meta">
            <h4>Инфо о посте</h4>
        <ul>
           <li class="user"><a href="#">{{$post->user->name}}</a></li>
           <li class="time">{{$data->time($post->created_at)}}</li>
           <li class="comment"><a href="#">{{$post->comments_count}} комментари{{commentsCountEnding($post->comments_count)}}</a></li>
           <li class="tags" title="@foreach ($post->tags as $tag){{$tag->name . '  '}}@endforeach">
               {{$post->tags_count}} тег{{commentsTagsEnding($post->tags_count)}}
           </li>
           <li class="permalink" title="@foreach ($post->categories as $cat){{$cat->name . '  '}}@endforeach">
               {{$post->categories_count}} категори{{commentsCategoriesEnding($post->categories_count)}}
           </li>
        </ul>
    </div>

</aside>