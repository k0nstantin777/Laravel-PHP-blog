<h3>Регистрация</h3>
<form name="registration" action="{{route('registerPost')}}" method="post">
 {{ csrf_field() }}

    <label for="name">Имя</label>
    <input  id="name" name="name" type="text" placeholder="Ivan" value="{{ old('name') }}" {{$errors->has('name') ? 'class=error':'' }} autofocus />
        @if($errors->has('name'))
            <div>
                <span class="error">{{$errors->first('name')}}</span>
            </div>
        @endif

    <label for="email">E-mail</label>
    <input id="email" name="email" type="text" placeholder="ivan@mail.ru" value="{{ old('email') }}" {{$errors->has('email') ? 'class=error':'' }} /> 
        @if($errors->has('email'))
            <div>
                <span class="error">{{$errors->first('email')}}</span>
            </div>
        @endif

    <label for="pass">Пароль</label>
    <input type="password" id="pass" name="pass" placeholder="Пароль" value="{{ old('pass') }}" {{$errors->has('pass') ? 'class=error':'' }} />
        @if($errors->has('pass'))
            <div>
                <span class="error">{{$errors->first('pass')}}</span>
            </div>
        @endif


    <label for="pass_repeat">Повторите пароль</label>
    <input type="password" id="pass_repeat" name="pass_repeat" placeholder="Повторите пароль" value="{{ old('pass_repeat') }}" {{$errors->has('pass_repeat') ? 'class=error':'' }} />
        @if($errors->has('pass_repeat'))
            <div>
                <span class="error">{{$errors->first('pass_repeat')}}</span>
            </div>
        @endif  

    <input type="checkbox" id="confirm" name="is_confirm" value="yes" {{ old('remember') ? 'checked' : '' }}/>
    <label id="confirm" for="confirm">Согласен с условиями сайта</label>
        @if($errors->has('is_confirm'))
        <div>
            <span class="error">{{$errors->first('is_confirm')}}</span>
        </div>
        @endif

    <div class="clearfix"></div> 

    <input id="submit" value="Отправить" type="submit" class="button" />
</form>

