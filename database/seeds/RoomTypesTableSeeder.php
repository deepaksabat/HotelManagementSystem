<?php

use Illuminate\Database\Seeder;

class RoomTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('room_types')->insert([
            [
                'name' => 'Single',
                'description' => 'Description about single economy room',
                'capacity' => 1,
                'rent' => 700,
                'active' => 1
            ],
            [
                'name' => 'Double',
                'description' => 'Description about double economy room',
                'capacity' => 2,
                'rent' => 1200,
                'active' => 1
            ],
            [
                'name' => 'Single AC',
                'description' => 'Description about single AC economy room',
                'capacity' => 1,
                'rent' => 1000,
                'active' => 1
            ],
            [
                'name' => 'Double AC',
                'description' => 'Description about double ac room',
                'capacity' => 2,
                'rent' => 1500,
                'active' => 1
            ],
            [
                'name' => 'VIP',
                'description' => 'Description about vip economy room',
                'capacity' => 2,
                'rent' => 1800,
                'active' => 1
            ]
        ]);
    }
}
