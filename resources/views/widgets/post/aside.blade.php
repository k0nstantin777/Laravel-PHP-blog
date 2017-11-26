<aside>

    <p class="dateinfo">{{$data->month($post->created_at)}}<span>{{$data->day($post->created_at)}}</span></p>

    <div class="post-meta">
            <h4>Инфо о посте</h4>
        <ul>
           <li title="Автор поста"><i class="fa fa-user" aria-hidden="true"></i><a href="#">{{$post->user->name}}</a></li>
           <li title="Дата создания"><i class="fa fa-clock-o" aria-hidden="true"></i>{{$data->all($post->created_at)}}</li>
           <li title="Количество комментов"><i class="fa fa-comments" aria-hidden="true"></i><a href="#">{{$post->comments->count('id')}} комментари{{commentsCountEnding($post->comments->count('id'))}}</a></li>
           <li title="Теги: @foreach ($post->tags as $tag){{$tag->name . '  '}}@endforeach">
               <i class="fa fa-tags" aria-hidden="true"></i>{{$post->tags->count('id')}} тег{{tagsCountEnding($post->tags->count('id'))}}
           </li>
           <li title="Категории: @foreach ($post->categories as $cat){{$cat->name . '  '}}@endforeach">
               <i class="fa fa-list-alt" aria-hidden="true"></i>{{$post->categories->count('id')}} категори{{catsCountEnding($post->categories->count('id'))}}
           </li>
           <li title="Количество просмотров"><i class="fa fa-eye" aria-hidden="true"></i>Просмотров: {{$post->views_count}}</li>
        </ul>
    </div>

</aside>