<?php

use Illuminate\Database\Seeder;
use App\Profession;
use Illuminate\Support\Facades\DB;
class ProfessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //DB::table('professions')->truncate(); //vacia la tabla
    	//$this->command->info('Unguarding models');
//Model::unguard(); 
  //  	DB::statement('SET FOREIGN_KEY_CHECKS=0;'); //desactiva la revision de claves foraneas
    	//ALTER TABLE professions DISABLE TRIGGER ALL;
    	//DB::table('professions')->truncate();
//ALTER TABLE 'professions' ENABLE TRIGGER ALL
    	
// ---- esto es SQL
    	//DB::insert('INSERT INTO professions (title) VALUES (:title)', ['Desarrollador back-end']);

// --- constructor de consultas 1
 //DB::table('professions')->insert(['title' => 'Desarrollador back-end',]); 

//--------------- con model nivel mas alto
		Profession::create([
			'title' => 'Desarrollador back-end',
		]);

		Profession::create([
			'title' => 'Desarrollador front-end',
		]);

		Profession::create([
			'title' => 'Diseñador web',
		]);
    }
}
