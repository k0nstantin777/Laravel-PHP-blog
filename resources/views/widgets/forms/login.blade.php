<h3>Авторизация</h3>
<form name="registration" action="{{route('user.loginPost')}}" method="post">
 {{ csrf_field() }}


    <label for="email">E-mail</label>
    <input id="email" name="email" type="text" placeholder="ivan@mail.ru" value="{{ old('email') }}" required autofocus/> 

    <label for="pass">Пароль</label>
    <input type="password" id="pass" name="pass" placeholder="Пароль" value="{{ old('pass') }}" required/>

    <input type="checkbox" id="remember" name="remember" value="yes"/>
    <label id="remember" for="remember">Запомнить меня</label>

    @if (session('authError'))
        <div>
            <p>{{session('authError')}}</p>
        </div>
    @endif
    
    <div class="clearfix"></div> 

    <input id="submit" value="Войти" type="submit" class="button" />
</form>

