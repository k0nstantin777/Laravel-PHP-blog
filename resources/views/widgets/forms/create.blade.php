    <h3>Создание поста</h3>
    <form name="comment" action="{{route('post.createPost')}}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}    

    <input type="hidden" name="user_id" value="{{$currentUser->id}}" />
    
    <label for="name">Автор<span class="required">*</span></label>
    <input  id="name" name="name" type="text" value="{{$currentUser->name}}" disabled /> 
           
    <label for="title">Тема поста<span class="required">*</span></label>
    <input id="title" name="title" placeholder="Тема поста" value="{{ old('title') }}" {{$errors->has('title') ? 'class=error':'' }} />
        @if($errors->has('title'))
            <div>
                <span class="error">{{$errors->first('title')}}</span>
            </div>
        @endif
    
    <label for="image">Изображение
        <span class="input-info"><i class="fa fa-info-circle" aria-hidden="true"></i> Оставьте пустым, что бы оставить изображение по умолчанию</span>
   </label>
    <input type="file" id="image" multiple accept="image/*" name="file" />
    <input type="button" id="reset-img-preview" value="Удалить">
    <div>
        <img id="img-preview" src="{{config('blog.userImagesPath')}}img-post.jpg" />
    </div>
    
    <label for="announce">Анонс поста<span class="required">*</span></label>
    <textarea id="announce" name="announce" placeholder="Аннонс поста" {{$errors->has('announce') ? 'class=error':'' }}  >{{ old('announce') }}</textarea>
        @if($errors->has('announce'))
            <div>
                <span class="error">{{$errors->first('announce')}}</span>
            </div>
        @endif    
    
    <label for="body">Текст поста<span class="required">*</span></label>
    <textarea id="body" name="fulltext" placeholder="Текст поста" {{$errors->has('fulltext') ? 'class=error':'' }}  >{{ old('fulltext') }}</textarea>
        @if($errors->has('fulltext'))
            <div>
                <span class="error">{{$errors->first('fulltext')}}</span>
            </div>
        @endif
        
    <label for="category">Категория<span class="required">*</span></label>
    <select id="category" name="category">
        @foreach ($cats as $cat)
            <option value="{{$cat->id}}">{{$cat->name}}</option>
        @endforeach
    </select>  
    
    <label for="tag">Теги</label>
    <div class="tag_block">
        <div class="tags">
            <input id="tag" name="tags[]" placeholder="Обо всем" value="{{ old('tag[]') }}" {{$errors->has('tag[]') ? 'class=error':'' }} />
            <span id="plus_tag" class="plus_tag" title="добавить тег"><i class="fa fa-plus" aria-hidden="true"></i></span>
            <span id="remove_tag" class="remove_tag" title="удалить тег"><i class="fa fa-times" aria-hidden="true"></i></span>
        </div>
    </div>    
    @if($errors->has('tag'))
        <div>
            <span class="error">{{$errors->first('tag[]')}}</span>
        </div>
    @endif
    
        
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
