<div class='options'>
    @can ('edit', $post)
        <p><a class="more" href="{{route('post.edit', $post->slug)}}">Изменить &raquo;</a></p>
    @endcan
    @can ('delete', $post)
        <p><a class="more" href="{{route('post.delete', $post->slug)}}" onclick='return confirm("Удалить статью {{$post->title}} ?")'>Удалить</a></p>
    @endcan
</div>