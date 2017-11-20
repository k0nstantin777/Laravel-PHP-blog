    <h3>Создание поста</h3>
    <form name="comment" action="{{route('post.createPost')}}" method="post">
    {{ csrf_field() }}    

    <input type="hidden" name="user_id" value="{{$currentUser->id}}" />
    
    <label for="name">Автор</label>
    <input  id="name" name="name" type="text" value="{{$currentUser->name}}" disabled /> 

    <label for="title">Тема поста</label>
    <input id="title" name="title" placeholder="Тема поста" value="{{ old('title') }}" {{$errors->has('title') ? 'class=error':'' }} />
        @if($errors->has('title'))
            <div>
                <span class="error">{{$errors->first('title')}}</span>
            </div>
        @endif
    
    <label for="announce">Анонс поста</label>
    <textarea id="announce" name="announce" placeholder="Аннонс поста" {{$errors->has('announce') ? 'class=error':'' }}  >{{ old('announce') }}</textarea>
        @if($errors->has('announce'))
            <div>
                <span class="error">{{$errors->first('announce')}}</span>
            </div>
        @endif    
    
    <label for="body">Текст поста</label>
    <textarea id="body" name="fulltext" placeholder="Текст поста" {{$errors->has('fulltext') ? 'class=error':'' }}  >{{ old('fulltext') }}</textarea>
        @if($errors->has('fulltext'))
            <div>
                <span class="error">{{$errors->first('fulltext')}}</span>
            </div>
        @endif
        
    <label for="category">Категория</label>
    <select id="category" name="category">
        @foreach ($cats as $cat)
            <option value="{{$cat->id}}">{{$cat->name}}</option>
        @endforeach
    </select>  
        
    <label for="time">Начала показа  
        <span class="input-info"><i class="fa fa-info-circle" aria-hidden="true"></i> Оставьте пустым для немедленной публикации</span>
    </label>
    <input id="time" type="datetime-local" name="active_from" value="{{ old('active_from') }}" {{$errors->has('active_from') ? 'class=error':'' }} />
    @if($errors->has('title')) 
        <div>
            <span class="error">{{$errors->first('active_from')}}</span>
        </div>
    @endif
    
    <label for="time">Окончание показа
        <span class="input-info"><i class="fa fa-info-circle" aria-hidden="true"></i> Оставьте пустым что-бы неограничить срок показа</span>
    </label>
    <input id="time" type="datetime-local" name="active_to" value="{{ old('active_to') }}" {{$errors->has('active_to') ? 'class=error':'' }} />
    @if($errors->has('title'))
        <div>
            <span class="error">{{$errors->first('active_to')}}</span>
        </div>
    @endif
        
        
    @if($errors->has('user_id') || $errors->has('post_id') )
        <div>
            <span class="error">Не пытайтесь подделать форму!</span>
        </div>
    @endif
     <div class="cleare"></div>
    <input id="submit" value="Создать" type="submit" class="button" />
    </form>
