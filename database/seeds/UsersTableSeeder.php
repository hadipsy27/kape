<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		DB::statement('SET FOREIGN_KEY_CHECKS=0;');

		DB::table('users')->truncate();
		DB::table('users')->insert(
		    array([
					'full_name' 		=>	'Hadi Prasetyo',
					'nim'					=> 2016150036,
		    	'email' 			=> 	'hadipsy27@gmail.com',
		    	'password'			=>	Hash::make('123123123'),
		    	'tasks_created' 	=> 	1,
				],
				[	'full_name' 		=>	'administrator',
					'nim'					=> 123456789,
		    	'email' 			=> 	'admin@admin.com',
		    	'password'			=>	Hash::make('123123123'),
					'tasks_created' 	=> 	'',
				],
				[	'full_name' 		=>	$faker->name,
					'nim'					=> 123123123,
		    	'email' 			=> 	'dosen@email.com',
		    	'password'			=>	Hash::make('123123123'),
					'tasks_created' 	=> 	'',
					]
				)
		);

		DB::statement('SET FOREIGN_KEY_CHECKS=1;');
	}
}
