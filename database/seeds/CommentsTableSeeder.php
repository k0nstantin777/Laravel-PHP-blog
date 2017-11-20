<?php

use Illuminate\Database\Seeder;
use App\Models\Comment;

class CommentsTableSeeder extends Seeder
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
        Comment::create([
            'user_id' => 1,
            'post_id' => 1,
            'title' => 'Комментарий про статью об о.Зюраткуль',
            'slug' => url_slug('Комментарий про статью об о.Зюраткуль'),
            'comment' => 'Текст моего комментария про статью об автопутешествии о.Зюраткуле',
        ]);
        
        /**
         * 2
         */
        Comment::create([
            'user_id' => 1,
            'post_id' => 1,
            'title' => 'Еще один комментарий про статью об о.Зюраткуль',
            'slug' => url_slug('Еще один комментарий про статью об о.Зюраткуль'),
            'comment' => 'Текст еще одного моего комментария про статью об автопутешествии о.Зюраткуле',
        ]);
        
        /**
         * 3
         */
        Comment::create([
            'user_id' => 1,
            'post_id' => 2,
            'title' => 'Комментарий о игре Россия - Аргентина в Лужниках',
            'slug' => url_slug('Комментарий о игре Россия - Аргентина в Лужниках'),
            'comment' => 'Текст комментария о игре Россия - Аргентина в Лужниках',
        ]);
    }
}
