<p>Cообщение из формы обратной связи</p>
<p>Имя: {{$data['name']}}</p>
<p>email: {{$data['email']}}</p>
<p>Тема сообщения: {{$data['subject']}}</p>
<span>Сообщение: {{nl2br($data['message'])}}</span>