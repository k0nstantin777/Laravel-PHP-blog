<?php

namespace App\Listeners;

use App\Events\UserRegistered;
use App\Models\User;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserDbSave
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  UserRegistered  $event
     * @return void
     */
    public function handle(UserRegistered $event)
    {
        return User::create([
                'name' => $event->inputData['name'],
                'email' => $event->inputData['email'],
                'password'=> bcrypt($event->inputData['pass']),
        ]);
    }
}
