<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Location;
use Faker\Factory as Faker;
use App\Target;
use App\Experiment;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->call(UserTableSeeder::class);

        factory(Location::class, 100)->create();

        $faker = Faker::create();

        for ($i=0; $i<3; $i++) {
            $location = Location::pickUnused(1);
            $target = \App\Target::fromLocationWithCoordinates($location->id, $faker->randomNumber(8));
            $decoys = Location::pickUnused(4);
            $experiment = \App\Experiment::fromTargetAndDecoys($target, $decoys);
            $experiment->start_date = Carbon\Carbon::now()->addDays(7);
            $experiment->save();
        }

        User::create([
            'name' => 'Anthony',
            'email'     => 'acuccia@gmail.com',
            'password'  => bcrypt('password'),
            'is_admin'  => true
        ]);

        Model::reguard();
    }
}
