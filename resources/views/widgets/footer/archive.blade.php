<h3>Архивы</h3>

<div class="footer-list">
    <ul>
            @foreach($archives as $archive)
                <li><a href="{{route('post.archive.show', $archive->month.' '.$archive->year)}}">{{$archive->month.' '.$archive->year}}</a></li>
            @endforeach
    </ul>
</div>
