<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@mail.ru',
            'password' => bcrypt('qwerty'),
            'role_id' => 3
        ]);
        
        User::create([
            'name' => 'Пользователь',
            'email' => 'user@mail.ru',
            'password' => bcrypt('qwerty'),
            'role_id' => 1
        ]);
        
        User::create([
            'name' => 'Модератор',
            'email' => 'moderator@mail.ru',
            'password' => bcrypt('qwerty'),
            'role_id' => 2
        ]);
    }
}
