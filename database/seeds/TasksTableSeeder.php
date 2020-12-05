<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class TasksTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		DB::statement('SET FOREIGN_KEY_CHECKS=0;');

		DB::table('tasks')->truncate();
		DB::table('tasks')->insert(
		    array([
		    	'user_id' 		=>	1,
		    	'project_id' 	=>	1,
					'name'				=>	"First Task",
					'priority'		=> 'normal',
		    	'state' 			=> 	"doing",
					'weight'			=>	2,
				],
				[
		    	'user_id' 		=> 1,
		    	'project_id' 	=> 8,
					'name'				=> "Navbar",
					'priority'		=> 'normal',
		    	'state' 			=> "complete",
					'weight'			=> 2,
				],
				[
		    	'user_id' 		=> 1,
		    	'project_id' 	=> 8,
					'name'				=> "Home",
					'priority'		=> 'normal',
		    	'state' 			=> "complete",
					'weight'			=> 1,
				],
				[
		    	'user_id' 		=> 1,
		    	'project_id' 	=> 8,
					'name'				=> "Services",
					'priority'		=> 'normal',
		    	'state' 			=> "complete",
					'weight'			=> 2,
				],
				[
		    	'user_id' 		=> 1,
		    	'project_id' 	=> 8,
					'name'				=> "About",
					'priority'		=> 'normal',
		    	'state' 			=> "complete",
					'weight'			=> 1,
				],
				[
		    	'user_id' 		=> 1,
		    	'project_id' 	=> 8,
					'name'				=> "How It Works",
					'priority'		=> 'normal',
		    	'state' 			=> "complete",
					'weight'			=> 1,
				],
				[
		    	'user_id' 		=> 1,
		    	'project_id' 	=> 8,
					'name'				=> "Testimonials",
					'priority'		=> 'normal',
		    	'state' 			=> "doing",
					'weight'			=> 2,
				],
				[
		    	'user_id' 		=> 1,
		    	'project_id' 	=> 8,
					'name'				=> "Footer",
					'priority'		=> 'normal',
		    	'state' 			=> "doing",
					'weight'			=> 2,
				],
			)
		);

		DB::statement('SET FOREIGN_KEY_CHECKS=1;');
	}
}
