<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(FloorsTableSeeder::class);
        $this->call(BlocksTableSeeder::class);
        $this->call(CheckTimesTaleSeeder::class);
        $this->call(RoomTypesTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(RoleUserTableSeeder::class);
        $this->call(CustomerSeeder::class);
    }
}
