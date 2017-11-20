<div class="sidemenu">

        <h3>Категории</h3>
        <ul>
            @foreach ($categories as $cat)   
                <li><a href="{{route('category.show', $cat->slug)}}">{{$cat->name}} ({{$cat->posts->count('*')}})</a></li>
            @endforeach    
        </ul>

</div>
