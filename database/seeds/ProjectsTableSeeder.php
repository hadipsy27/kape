<?php

use Illuminate\Database\Seeder;


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
		    array([
		    	'name' 				=>	"Bab 1",
		    	'user_id' 			=> 	1,
					'course_id'			=>	1,
					'date'		=> '',
					'github'	=> '',
					'full_name'	=> '',
					'nim'				=> '',
					'description'	=> 'Lorem ipsum sit dolor amet'
				],
				[
		    	'name' 				=>	"Bab 2",
		    	'user_id' 			=> 	1,
					'course_id'			=>	1,
					'date'		=> '',
					'github'	=> '',
					'full_name'	=> '',
					'nim'				=> '',
					'description'	=> 'Lorem ipsum sit dolor amet'
				],
				[
		    	'name' 				=>	"Bab 3",
		    	'user_id' 			=> 	1,
					'course_id'			=>	1,
					'date'		=> '',
					'github'	=> '',
					'full_name'	=> '',
					'nim'				=> '',
					'description'	=> 'Lorem ipsum sit dolor amet'
				],
				[
		    	'name' 				=>	"Bab 4",
		    	'user_id' 			=> 	1,
					'course_id'			=>	1,
					'date'		=> '',
					'github'	=> '',
					'full_name'	=> '',
					'nim'				=> '',
					'description'	=> 'Lorem ipsum sit dolor amet'
				],
				[
		    	'name' 				=>	"Bab 5",
		    	'user_id' 			=> 	1,
					'course_id'			=>	1,
					'date'		=> '',
					'github'	=> '',
					'full_name'	=> '',
					'nim'				=> '',
					'description'	=> 'Lorem ipsum sit dolor amet'
				],
				[
		    	'name' 				=>	"Create WIreframe Website",
		    	'user_id' 			=> 	2,
					'course_id'			=>	2,
					'date'		=> '',
					'github'	=> '',
					'full_name'	=> '',
					'nim'				=> '',
					'description'	=> 'Lorem ipsum sit dolor amet'
				],
				[
		    	'name' 				=>	"Create UI/UX Website",
		    	'user_id' 			=> 	2,
					'course_id'			=>	2,
					'date'		=> '',
					'github'	=> '',
					'full_name'	=> '',
					'nim'				=> '',
					'description'	=> 'Lorem ipsum sit dolor amet'
				],
				[
		    	'name' 				=>	"Create Front-End Website",
		    	'user_id' 			=> 	2,
					'course_id'			=>	2,
					'date'		=> '12/1/2021',
					'github'	=> 'hadipsy27',
					'full_name'	=> 'Hadi Prasetyo',
					'nim'				=> '2016150036',
					'description'	=> 'Lorem ipsum sit dolor amet'
				],
			)
		);

		DB::statement('SET FOREIGN_KEY_CHECKS=1;');
	}

}
