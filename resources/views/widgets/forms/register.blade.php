<h3>Регистрация</h3>
<form name="registration" action="{{route('user.registerPost')}}" method="post">
 {{ csrf_field() }}

    <label for="name">Имя</label>
    <input  id="name" name="name" type="text" placeholder="Ivan" value="{{ old('name') }}" required autofocus/>
        @if($errors->has('name'))
            <div>{{$errors->first('name')}}</div>
        @endif

    <label for="email">E-mail</label>
    <input id="email" name="email" type="text" placeholder="ivan@mail.ru" value="{{ old('email') }}" required/> 
        @if($errors->has('email'))
            <div>{{$errors->first('email')}}</div>
        @endif

    <label for="pass">Пароль</label>
    <input type="password" id="pass" name="pass" placeholder="Пароль" value="{{ old('pass') }}" required/>
        @if($errors->has('pass'))
            <div>{{$errors->first('pass')}}</div>
        @endif


    <label for="pass_repeat">Повторите пароль</label>
    <input type="password" id="pass_repeat" name="pass_repeat" placeholder="Повторите пароль" value="{{ old('pass_repeat') }}" required/>
        @if($errors->has('pass_repeat'))
            <div>{{$errors->first('pass_repeat')}}</div>
        @endif  


    <label for="phone">Номер телефона</label>
    <input type="tel" id="phone" name="phone" placeholder="+7 (999) 999-99-99" value="{{ old('phone') }}"/>
        @if($errors->has('phone'))
            <div>{{$errors->first('phone')}}</div>
        @endif

    <input type="checkbox" id="confirm" name="is_confirm" value="yes" {{ old('remember') ? 'checked' : '' }}/>
    <label id="confirm" for="confirm">Согласен с условиями сайта</label>
        @if($errors->has('is_confirm'))
            <div>{{$errors->first('is_confirm')}}</div>
        @endif

    <div class="clearfix"></div> 

    <input id="submit" value="Отправить" type="submit" class="button" />
</form>

