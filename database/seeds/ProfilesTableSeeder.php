<?php

use Illuminate\Database\Seeder;
use App\Models\Profile;
use Illuminate\Support\Carbon;

class ProfilesTableSeeder extends Seeder
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
        Profile::create([
            'user_id' => 1,
            'name' => 'Admin',
            'birthdate' => Carbon::create('1985', '06', '11')->format('Y-m-d H:i:s'),
            'phone' => '8(999)999-99-99',
        ]);
        
    }
}
