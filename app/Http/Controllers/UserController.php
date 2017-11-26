<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterFormRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Events\UserRegistered;

class UserController extends MainController
{
    /**
     * Страница входа
     * @return string
     */
    public function login()
    {
        $this->title = 'Вход';

        return view('layouts.primary', [
            'page'=>'pages.login',
            'title'=> $this->title
        ]);
    }
    
    /**
     * Обработка формы входа
     * @param Request $request
     * @return string
     */
    public function loginPost(Request $request)
    {
        $remember = $request->input('remember') ? true : false;
        
        $authResult = Auth::attempt([
            'email' => $request->input('email'),
            'password' => $request->input('pass')
        ], $remember);
                           
        if (!$authResult){
            return redirect()
               ->route('login')
               ->with('authError', 'Неверный логин или пароль');  
        } 
               
        return redirect()->intended(route('mainPage'));
    }
    
    /**
     * Страница регистрации
     * @return string
     */
    public function registration()
    {
        $this->title = 'Регистрация';

        return view('layouts.primary', [
            'page'=>'pages.registration',
            'title'=> $this->title
        ]);
    }
    
    /**
     * Обработка формы регистрации
     * @param Request $request
     * @return array|void
     */
    public function registrationPost(RegisterFormRequest $request)
    {
        event(new UserRegistered($request->all()));
               
        return redirect()
            ->route('mainPage')
            ->with('action', 'Регистрация прошла успешно!');
    }
    
    /**
     * Выход юзера с сайта
     * @return void
     */
    public function logout()
    {
        Auth::logout();
        return redirect()
            ->route('mainPage');
           
    }
}
