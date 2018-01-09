@if ($posts->count('id') === 0)
     <p class="center">Нет постов для отображения</p>
@else
    
    @foreach ($posts as $post)
    
        
            <div class="post">
                <div class="col-lg-3 col-lg-offset-1 col-md-3 col-md-offset-1 col-sm-3 col-sm-offset-1 visible-lg visible-sm visible-md">
                    @include('widgets.post.aside')
                </div>
                <div class="primary col-lg-8  col-md-8  col-sm-8  col-xs-12">
                    @include('parts.post')
                    @include('widgets.post.read_more')
                    @include('widgets.post.options')
                </div>
            </div>    
        
       
    @endforeach
        <div class="col-lg-12">
            {{$posts->links()}}
        </div>    
 
@endif    


