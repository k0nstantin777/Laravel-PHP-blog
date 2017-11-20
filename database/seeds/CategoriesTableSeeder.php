<?php

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
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
        Category::create([
            'name' => 'Общие',
            'slug' => url_slug('Общие')
        ]);
        
        /**
         * 2
         */
        Category::create([
            'name' => 'Спорт',
            'slug' => url_slug('Спорт')
        ]);
        
        /**
         * 3
         */
        Category::create([
            'name' => 'Путешествия',
            'slug' => url_slug('Путешествия')
        ]);
        
        /**
         * 4
         */
        Category::create([
            'name' => 'ИМХО',
            'slug' => url_slug('ИМХО')
        ]);
        
        /**
         * 5
         */
        Category::create([
            'name' => 'Веб-разработка',
            'slug' => url_slug('Веб-разработка')
        ]);
        
        /**
         * 6
         */
        Category::create([
            'name' => 'Юмор',
            'slug' => url_slug('Юмор')
        ]);
        
        
        
    }
}
