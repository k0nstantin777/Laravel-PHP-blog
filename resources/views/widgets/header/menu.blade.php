<ul>
        <li><a href="{{route('mainPage')}}">Главная</a><span></span></li>
        <li><a href="{{route('post.categories')}}">Категории</a><span></span></li>
        <li><a href="{{route('feedBackPage')}}">Обратная связь</a><span></span></li>
        <li><a href="{{route('aboutPage')}}">Обо мне</a><span></span></li>
        <li><a href="{{route('contactsPage')}}">Контакты</a><span></span></li>
        @can('post_create')
            <li><a href="{{route('post.create')}}">Создать пост</a><span></span></li>
        @endcan
</ul>

