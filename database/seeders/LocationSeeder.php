<?php

namespace Database\Seeders;

use App\Models\Block;
use App\Models\Location;
use App\Models\Wh;
use Illuminate\Database\Seeder;
use Faker;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $defaults = [
            [
                'name' => 'Уилмингтон (Северная Каролина)',
                'time_zone' => 'America/New_York'
            ],
            [
                'name' => 'Портленд (Орегон)',
                'time_zone' => 'America/Los_Angeles'
            ],
            [
                'name' => 'Торонто',
                'time_zone' => 'America/Toronto'
            ],
            [
                'name' => 'Варшава',
                'time_zone' => 'Europe/Warsaw'
            ],
            [
                'name' => 'Валенсия',
                'time_zone' => 'America/Caracas'
            ],
            [
                'name' => 'Шанхай',
                'time_zone' => 'Asia/Shanghai'
            ],
        ];
        $faker = Faker\Factory::create();
        foreach ($defaults as $default) {
            $location = Location::firstOrCreate($default);
            Wh::factory()->count($faker->numberBetween(5, 10))->create(['location_id' => $location->id]);
            $whs = Wh::where('location_id', $location->id)->get();
            foreach ($whs as $wh) {
                Block::factory()->count($faker->numberBetween(0, $wh->max_blocks))->create([
                    'wh_id' => $wh->id,
                ]);
            }
        }
    }
}
