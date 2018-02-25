<?php

use Illuminate\Database\Seeder;

class FloorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('floors')->insert([
            [
                'name' => 'Economy Class Floor',
                'floor_code' => 'F101',
                'level_no' => 2,
                'active' => 1,
                'created_at'=>\Carbon\Carbon::now(),
                'updated_at'=>\Carbon\Carbon::now(),
                'description' => 'This room is specially designed for economy class. Every Rooms available here will be only
                rented to the economy class people, Which will provide the perfect match for the people with less money and seeking more facilities. We care for everyone!'
            ],
            [
                'name' => 'Economy VIP Class Floor',
                'floor_code' => 'F102',
                'level_no' => 3,
                'active' => 1,
                'description' => 'This room is specially designed for economy vip class. Every Rooms available here will be only
                rented to the economy class people, Which will provide the perfect match for the people with less money and seeking more facilities. We care for everyone!',
                'created_at'=>\Carbon\Carbon::now(),
                'updated_at'=>\Carbon\Carbon::now()
            ]
            ,
            [
                'name' => 'Family Floor',
                'floor_code' => 'F103',
                'level_no' => 4,
                'active' => 1,
                'created_at'=>\Carbon\Carbon::now(),
                'updated_at'=>\Carbon\Carbon::now(),
                'description' => 'This room is specially designed for family class. Every Rooms available here will be only
                rented to the families, Which will provide the perfect match for the people with less money and seeking more facilities. We care for everyone!'
            ]
            ,
            [
                'name' => 'Honeymoon Floor',
                'floor_code' => 'F104',
                'level_no' => 5,
                'active' => 1,
                'created_at'=>\Carbon\Carbon::now(),
                'updated_at'=>\Carbon\Carbon::now(),
                'description' => 'This room is specially designed for honeymoon class. Every Rooms available here will be only
                rented to people who came to spend their honeymoon time, Which will provide the perfect match for the people with less money and seeking more facilities. We care for everyone!'
            ],
            [
                'name' => 'Business Class Floor',
                'floor_code' => 'F105',
                'level_no' => 6,
                'active' => 1,
                'created_at'=>\Carbon\Carbon::now(),
                'updated_at'=>\Carbon\Carbon::now(),
                'description' => 'This room is specially designed for business class. Every Rooms available here will be only
                rented to the business class people, Which will provide the perfect match for the people with less money and seeking more facilities. We care for everyone!'
            ]
        ]);
    }
}
