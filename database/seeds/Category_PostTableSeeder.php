<?php

use Illuminate\Database\Seeder;
use App\Models\Post;

class CategoryPostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::find(1)->categories()->attach([1,3]);
        Post::find(2)->categories()->attach([1,2]);
        Post::find(3)->categories()->attach([1,4]);
        Post::find(4)->categories()->attach([1,5]);
        Post::find(5)->categories()->attach([1,6,3]);
        Post::find(6)->categories()->attach([1,5,2]);
        Post::find(7)->categories()->attach([1,2]);
        Post::find(8)->categories()->attach([1,2]);
        Post::find(9)->categories()->attach([2,5]);
        Post::find(10)->categories()->attach([1,5]);
        Post::find(11)->categories()->attach([1,2]);
        Post::find(12)->categories()->attach([1]);
    }
}
