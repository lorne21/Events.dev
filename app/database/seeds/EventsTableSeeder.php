<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class EventsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		for($i=1; $i<=10; $i++)
        {
            $event = new CalendarEvent();
            $event->title = $faker->catchPhrase;
            $event->description = $faker->realText;
            $event->date = $faker->dateTime;
            $event->price = $faker->numberBetween($min = 1, $max = 100);
            $event->start_time = $faker->time($format = 'H:i:s');
            $event->location = $faker->country;
            $event->address = $faker->streetAddress;
            $event->city = $faker->city;
            $event->state = $faker->state;
            $event->zip = $faker->postcode;
            $event->img = $faker->imageUrl($width = 640, $height = 480); // 'http://lorempixel.com/640/480/'
            $event->user_id = User::all()->random(1)->id;
            $event->save();
        }
	}

}

