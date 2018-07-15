<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $faker = Faker\Factory::create();

        for($i = 0; $i < 10; $i++) {
            $name = $faker->name;
            App\FilmModel::create([
                'name'          => $name,
                'slug'          => str_slug($name, '-'),
                'description'   => $faker->realText(rand(10,20)),
                'release_date'  => $faker->dateTimeBetween($startDate = '-30 years', $endDate = 'now', $timezone = null),
                'rating'        => $faker->numberBetween($min = 0, $max = 5),
                'ticket_price'  => $faker->randomNumber(2),
                'country'       => 'NG',
                'genre'         => 'action'
            ]);
        }
    }
}
