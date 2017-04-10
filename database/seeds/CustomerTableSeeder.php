<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CustomerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            array('name' => 'SandBox',
                'email'      => 'customer@example.com',
                'password'   => bcrypt('123456'),
                'address'    => 'Ha Noi',
                'telephone'  => '01633451995',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()),
        ]);
    }
}
