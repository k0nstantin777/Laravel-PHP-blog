<?php

use Illuminate\Database\Seeder;
use App\Models\Tag;

class TagsTableSeeder extends Seeder
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
       Tag::create([
           'name' => 'Футбол', 
       ]);
       
       /**
        * 2
        */
       Tag::create([
           'name' => 'Россия', 
       ]);
       
       /**
        * 3
        */
       Tag::create([
           'name' => 'Путешествие', 
       ]);
       
              
       /**
        * 4
        */
       Tag::create([
            'name' => 'Обо всем'
       ]);
    }
}
