<?php

class BacklogSeeder extends Seeder{
	
	public function run()
	{
		$faker = Faker\Factory::create();
		
		for ($i=0; $i < 20; $i++)
		{
			$backlog = Backlog::create(array(
				'points' => $faker->randomNumber,
				'priority' => $faker->randomDigit,
				'title' => $faker->name
			));
		}
	}
	
}
