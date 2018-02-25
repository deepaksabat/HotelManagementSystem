<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'firstname' => 'Abdullah',
                'middlename' => 'Ashik',
                'lastname' => 'Arefin',
                'email' => 'root@email.com',
                'password' => bcrypt('123456'),
                'phone' => '1234567891011',
                'address' => 'Sample Address',
                'gender' => 'male',
                'active' => 1,
                'proof' => ''
            ],
            [
                'firstname' => 'Nasrin',
                'middlename' => 'Akter',
                'lastname' => 'Kona',
                'email' => 'kona@email.com',
                'password' => bcrypt('123456'),
                'phone' => '1234567891011',
                'address' => 'Sample Address',
                'gender' => 'female',
                'active' => 1,
                'proof' => ''
            ]
        ]);
    }
}
