 <div class="sidemenu popular">

     <h3>Популярные посты</h3>    
    @if ($posts->count('id') == 0)
    
        <span title="Количество просмотров поста должно быть более 3">Нет постов для отображения</span>
    
    @else
       
        <ul>
            @foreach($posts as $post)
            <li><a href="{{route('post.show', $post->slug)}}">
                {{$post->title}}
                <span>Создан {{$fdata->data($post->created_at)}}</span></a>
            </li>
            @endforeach
        </ul>
    @endif    

</div>

