<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder {

	public function run()
	{
		$this->createNewUser();
		$this->createFakerUser();
	}

	protected function createNewUser()
	{
		$user = new User();
		$user->band_name = $_ENV['USER_BAND_NAME'];
		$user->email = $_ENV['USER_EMAIL'];
		$user->password = $_ENV['USER_PASS'];
		$user->genre = $_ENV['USER_GENRE'];
		$user->img = $_ENV['USER_IMG'];
		$user->about = $_ENV['USER_ABOUT'];
		$user->save(); 
	}

	protected function createFakerUser()
	{

		$faker = Faker::create();
        for($i=1; $i<=9; $i++)
        {
            $user = new User();
            $user->band_name = $faker->sentence($nbWords = 3);
			$user->email = $faker->email;
			$user->password = $faker->password;
			$user->genre = $faker->word;
			$user->img = $faker->imageUrl($width = 640, $height = 480);
			$user->about = $faker->realText;
			$user->save();
        }

	}

}
