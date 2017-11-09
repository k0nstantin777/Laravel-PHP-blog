<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FormRegisterRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;

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
        
        /*иммитация метода Auth::attempt
            $user = DB::table('users')
                        ->select('*')
                        ->where('email','=', $request->input('email'))
                        ->first();
            if (Hash::check($request->input('pass'), $user->password)){
                Auth::loginUsingId($user->id, $remember);
                $authResult = true;
            } else {
                $authResult = false;
            }    
        */
                
        if (!$authResult){
            return redirect()
               ->route('user.login')
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
    public function registrationPost(FormRegisterRequest $request)
    {
        DB::table('users')->insert([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password'=> bcrypt($request->input('pass')),
            'phone'=> $request->input('phone'),
            'created_at'=> Carbon::createFromTimestamp(time())
                ->format('Y-m-d H:i:s'),
            'updated_at'=> Carbon::createFromTimestamp(time())
                ->format('Y-m-d H:i:s'),    
        ]);
        
        return redirect()
            ->route('mainPage')
            ->with('register', 'Регистрация прошла успешно!');
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
