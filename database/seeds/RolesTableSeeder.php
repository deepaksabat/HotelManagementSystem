<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            [
                'name' => 'root',
                'display_name' => 'Super User',
                'description' => 'ability to everything'
            ],
            [
                'name' => 'admin',
                'display_name' => 'Administrator',
                'description' => 'ability to admin thing'
            ],
            [
                'name' => 'manager',
                'display_name' => 'Manager',
                'description' => 'ability to do manager thing'
            ],
            [
                'name' => 'editor',
                'display_name' => 'Editor',
                'description' => 'ability to do editor thing'
            ]
        ]);
    }
}
