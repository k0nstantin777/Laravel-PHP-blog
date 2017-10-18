    
    <div class="user-menu">
        @if ($user !== 'guest')
            <span>Логин: {{$user}}, IP: {{$ip}}</span> | <a href="/logout">Выйти</a>
        @else 
            <a href="/login">Вход</a> | <a href="/registration">Регистрация</a>
        @endif 
        
        
    </div>

