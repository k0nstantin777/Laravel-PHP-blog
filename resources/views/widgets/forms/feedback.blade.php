<div class="col-xs-10 col-xs-offset-1">
@if (session('message'))

    <h2>{{session('message')}}</h2>
    <p> Спасибо за Ваше сообщение, я обязательно отвечу!</p>
    <a href='{{route('mainPage')}}'>Вернуться на главную</a>

@else
    <h2>Форма обратной связи</h2>
    <form name="MyForm" action="{{route('feedBackPagePost')}}" method="post">
    {{ csrf_field() }}    

    <label for="name">Имя</label>
    <input  id="name" name="name" class="col-xs-12" type="text" placeholder="Ivan" value="{{ old('name') }}" {{$errors->has('name') ? 'class=error':'' }} autofocus/> 
        @if($errors->has('name'))
            <div>
                <span class="error">{{$errors->first('name')}}</span>
            </div>
        @endif

    <label for="email">Электронная почта</label>
    <input id="email" name="email" class="col-xs-12" type="text" placeholder="ivan@mail.ru" value="{{ old('email') }}" {{$errors->has('email') ? 'class=error':'' }} /> 
        @if($errors->has('email'))
            <div>
                <span class="error">{{$errors->first('email')}}</span>
            </div>
        @endif


    <label for="sub">Тема сообщения</label>
    <input id="sub" name="subject" class="col-xs-12" placeholder="Тема сообщения" value="{{ old('subject') }}" {{$errors->has('subject') ? 'class=error':'' }} />
            @if($errors->has('subject'))
                <div>
                    <span class="error">{{$errors->first('subject')}}</span>
                </div>
            @endif

    <label for="body">Текст сообщения</label>
    <textarea id="body" name="message" class="col-xs-12" placeholder="Текст сообщения" {{$errors->has('message') ? 'class=error':'' }}  >{{ old('message') }}</textarea>
            @if($errors->has('message'))
                <div>
                    <span class="error">{{$errors->first('message')}}</span>
                </div>
            @endif
    <div class="clearfix"></div>
    <input id="submit" value="Отправить" type="submit" class="button" />
    </form>
@endif

</div>