<?php

use Illuminate\Database\Seeder;
use App\Models\Role;

class PriveRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::find(1)->prives()->attach([1,2,5]);
        Role::find(2)->prives()->attach([1,3,5]);
        Role::find(3)->prives()->attach([1,3,4,5]);
    }
}
