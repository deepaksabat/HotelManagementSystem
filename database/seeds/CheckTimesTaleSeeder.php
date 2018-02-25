<?php

use Illuminate\Database\Seeder;

class CheckTimesTaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('check_times')->insert([
            [
                'check_in' => '12:00:00',
                'check_out' => '14:00:00',
                'active' => 1
            ]
        ]);
    }
}
