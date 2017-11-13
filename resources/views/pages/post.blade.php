<article class="post">

    <h2>{{$post->title}}</h2>

    <div class="image-section">
            <img src="{{$post->image}}" alt="image post" height="256" width="498"/>
    </div>

    <p class="text">{{$post->fulltext}}</p>
    
    <div class="post-info">
        <ul class="tags">
            <span>Тэги</span>
            @foreach ($post->tags as $tag)
                <li class="tags">{{$tag->name}}</li>
            @endforeach
        </ul> 
        <ul class="cats">
            <span>Категории</span>
            @foreach ($post->categories as $cat)
            <li class="permalink">{{$cat->name}}</li>
            @endforeach
        </ul> 
        
    </div>    
</article>
@include('widgets.post_comments')
@include('widgets.forms.comment')
