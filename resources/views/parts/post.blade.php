

<h3><a href="{{route('post.show', $post->slug)}}">{{$post->title}}</a></h3>

<div class="image-section">
        <img class="img-responsive" src="{{stripos($post->image, 'http') !== false ? $post->image : config('blog.userImagesPath').$post->image}}" alt="image post"/>
</div>

<p>{{$post->announce}}</p>



