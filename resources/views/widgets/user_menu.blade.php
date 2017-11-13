    
    <div class="user-menu">
        @if ($currentUser)
            <span>Логин: {{$currentUser->name}}, IP: {{$ip}}</span> | <a href="/user/logout">Выйти</a>
        @else 
            <a href="/user/login">Вход</a> | <a href="/user/registration">Регистрация</a>
        @endif 
    </div>

