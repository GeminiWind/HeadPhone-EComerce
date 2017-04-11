<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class EventTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('events')->insert([
             array('rate'=>10, 'began_at'=>'2016-10-10','ended_at'=>'2017-12-12','product_id'=>1,'created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('rate'=>10, 'began_at'=>'2016-10-10','ended_at'=>'2017-12-12','product_id'=>2,'created_at' => Carbon::now(),'updated_at' => Carbon::now()),
        ]);
    }
}
