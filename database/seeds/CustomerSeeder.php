<?php

use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customers')->insert([
            [
                'name' => 'Test User 1',
                'address' => 'Test Sample Address',
                'email' => 'test@email.com',
                'phone' => '123456798',
                'gender' => 'male',
                'occupation' => 'test occupaton',
                'designation' => 'test designation',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Test User 2',
                'address' => 'Test Sample Address',
                'email' => 'test@email.com',
                'phone' => '123456798',
                'gender' => 'male',
                'occupation' => 'test occupaton',
                'designation' => 'test designation',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Test User 3',
                'address' => 'Test Sample Address',
                'email' => 'test@email.com',
                'phone' => '123456798',
                'gender' => 'male',
                'occupation' => 'test occupaton',
                'designation' => 'test designation',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Test User 4',
                'address' => 'Test Sample Address',
                'email' => 'test@email.com',
                'phone' => '123456798',
                'gender' => 'male',
                'occupation' => 'test occupaton',
                'designation' => 'test designation',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Test User 5',
                'address' => 'Test Sample Address',
                'email' => 'test@email.com',
                'phone' => '123456798',
                'gender' => 'male',
                'occupation' => 'test occupaton',
                'designation' => 'test designation',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Test User 6',
                'address' => 'Test Sample Address',
                'email' => 'test@email.com',
                'phone' => '123456798',
                'gender' => 'male',
                'occupation' => 'test occupaton',
                'designation' => 'test designation',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Test User 7',
                'address' => 'Test Sample Address',
                'email' => 'test@email.com',
                'phone' => '123456798',
                'gender' => 'male',
                'occupation' => 'test occupaton',
                'designation' => 'test designation',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Test User 8',
                'address' => 'Test Sample Address',
                'email' => 'test@email.com',
                'phone' => '123456798',
                'gender' => 'male',
                'occupation' => 'test occupaton',
                'designation' => 'test designation',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Test User 9',
                'address' => 'Test Sample Address',
                'email' => 'test@email.com',
                'phone' => '123456798',
                'gender' => 'male',
                'occupation' => 'test occupaton',
                'designation' => 'test designation',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Test User 10',
                'address' => 'Test Sample Address',
                'email' => 'test@email.com',
                'phone' => '123456798',
                'gender' => 'male',
                'occupation' => 'test occupaton',
                'designation' => 'test designation',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Test User 11',
                'address' => 'Test Sample Address',
                'email' => 'test@email.com',
                'phone' => '123456798',
                'gender' => 'male',
                'occupation' => 'test occupaton',
                'designation' => 'test designation',
                'password' => bcrypt('123456')
            ]
        ]);
    }
}
