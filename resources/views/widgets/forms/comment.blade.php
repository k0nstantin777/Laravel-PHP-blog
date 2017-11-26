@if (session('comment_add_success'))
    <div class="alert alert-success">
        <p>{{session('comment_add_success')}}</p>
    </div>
@endif

@if(!Auth::check())
    <p>Что бы оставить комментарий необходимо <a href="{{route('login')}}">авторизоваться</a> или <a href="{{route('register')}}">зарегестироваться</a>.</p>
@else
    <h3>Оставьте комментарий</h3>
    <form name="comment" action="{{route('post.createComment', $post->slug)}}" method="post">
    {{ csrf_field() }}    

    <input type="hidden" name="post_id" value="{{$post->id}}" />
    <input type="hidden" name="user_id" value="{{$currentUser->id}}" />
    
    <label for="name">Имя</label>
    <input  id="name" name="name" type="text" value="{{$currentUser->name}}" disabled /> 

    <label for="title">Тема комментария</label>
    <input id="title" name="title" placeholder="Тема комментария" value="{{ old('title') }}" {{$errors->has('title') ? 'class=error':'' }} />
        @if($errors->has('title'))
            <div>
                <span class="error">{{$errors->first('title')}}</span>
            </div>
        @endif
    
    
    <label for="body">Текст комментария</label>
    <textarea id="body" name="comment" placeholder="Текст комментария" {{$errors->has('comment') ? 'class=error':'' }}  >{{ old('comment') }}</textarea>
        @if($errors->has('comment'))
            <div>
                <span class="error">{{$errors->first('comment')}}</span>
            </div>
        @endif
    @if($errors->has('user_id') || $errors->has('post_id') )
        <div>
            <span class="error">Не пытайтесь подделать форму!</span>
        </div>
    @endif
    <input id="submit" value="Отправить" type="submit" class="button" />
    </form>
@endif