<div class="post-info row-flex">
        <ul class="col-sm-2 col-xs-5">
            <span>Тэги</span>
            @if($post->tags->count() === 0)
                <li>Нет привязанных тегов</li>
            @else
                @foreach ($post->tags as $tag)
                <a href="{{route('post.tag.show', $tag->name)}}">
                    <li><i class="fa fa-tags" aria-hidden="true"></i> {{$tag->name}}</li>
                </a>
                @endforeach
            @endif    
        </ul> 
        <ul class="col-sm-2 col-xs-5">
            <span>Категории</span>
            @foreach ($post->categories as $cat)
            <a href="{{route('category.show', $cat->slug)}}">
                <li><i class="fa fa-list-alt" aria-hidden="true"></i>{{$cat->name}}</li>
            </a>    
            @endforeach
        </ul>
        <ul class="col-sm-2 col-xs-5">
            <span>Дата создания</span>
            <li class="time"><p>{{$data->all($post->created_at)}}</p></li>
        </ul>
        @if ($post->updated_at !== $post->created_at) 
        <ul class="col-sm-2 col-xs-5">
            <span>Последнее обновление </span>
            <li class="time"><p>{{$data->all($post->updated_at)}}</p></li>
        </ul>
        @endif
        <ul class="col-sm-2 col-xs-5">
            <span>Просмотры</span>
            <li><p id="count">{{$post->views_count}}</p></li>
        </ul>
        
        
</div>