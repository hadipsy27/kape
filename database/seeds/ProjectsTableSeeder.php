<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ProjectsTableSeeder extends Seeder {


	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		
		DB::statement('SET FOREIGN_KEY_CHECKS=0;');

		DB::table('projects')->truncate();

		DB::table('projects')->insert(
		    array(
		    	'name' 				=>	"First Board",
		    	'user_id' 			=> 	1,
		    	'course_id'			=>	1,
		    	)
		);

		DB::statement('SET FOREIGN_KEY_CHECKS=1;');
	}

}
