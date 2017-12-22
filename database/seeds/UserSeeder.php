<?php

use App\User;
use App\Profession;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    		
	
//$profession = DB::table('professions')->select('id')->where('title', '=', 'Desarrollador back-end')->first();
    	
//DB::select('SELECT id FROM professions WHERE title = ?', ['Desarrollador back-end']);
    	//dd($profession[0]->id);
//con el constructor de consultas
    	//$profession=DB::table('professions')->select('id')->take(1)->get();	
    	//dd($profession->first()->id);
    	//$profession=DB::table('professions')->select('id')->first();
    	//dd($profession);
    	$professionId=Profession::where('title', 'Desarrollador back-end')->value('id');
    	//DB::table('users')->insert([
    	User::create([
    		'name' => 'Duilio Palacios',
    		'email' => 'duilio@gmail.com',
    		'password' => bcrypt('laravel'),
    		'profession_id' => $professionId, 
    	]);        
    }
}
