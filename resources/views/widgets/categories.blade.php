<div class="sidemenu">

        <h3>Категории</h3>
        <ul>
            @foreach ($categories as $cat)   
                <li><a href="#">{{$cat->name}} ({{$cat->posts->count('*')}})</a></li>
            @endforeach    
        </ul>

</div>
