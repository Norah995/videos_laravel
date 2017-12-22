<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	/*$this->truncateTables([
    		'users',
    		'professions'
    	]);*/

        // $this->call(UsersTableSeeder::class);
        $this->call(ProfessionSeeder::class);
         $this->call(UserSeeder::class);
    }
}
