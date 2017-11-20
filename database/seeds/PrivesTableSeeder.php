<?php

use Illuminate\Database\Seeder;
use App\Models\Prive;

class PrivesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
        * 1
        */
       Prive::create([
           'name' => 'post_create',
           'discription' => 'Создание постов'
       ]);
       
       /**
        * 2
        */
       Prive::create([
           'name' => 'post_edit_own',
           'discription' => 'Редактирование постов созданных авторизированным пользователем'
       ]);
       
       /**
        * 3
        */
       Prive::create([
           'name' => 'post_edit_all',
           'discription' => 'Редактирование всех постов'
       ]);
       
       /**
        * 4
        */
       Prive::create([
           'name' => 'post_delete',
           'discription' => 'Удаление постов'
       ]);
       
    }
}
