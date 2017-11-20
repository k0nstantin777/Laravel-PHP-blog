    
    <div class="user-menu">
        @if ($currentUser)
            <span>Логин: {{$currentUser->name}}, IP: {{$ip}}</span> | <a href="{{route('logout')}}">Выйти</a>
        @else 
            <a href="{{route('login')}}">Вход</a> | <a href="{{route('register')}}">Регистрация</a>
        @endif 
    </div>

