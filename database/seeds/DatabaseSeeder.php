<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(PostsTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(CommentsTableSeeder::class);
        $this->call(TagsTableSeeder::class);
        $this->call(ProfilesTableSeeder::class);
        $this->call(CategoryPostTableSeeder::class);
        $this->call(PostTagTableSeeder::class);
        $this->call(PrivesTableSeeder::class);
        $this->call(PriveRoleTableSeeder::class);
        
        
        
    }
}
