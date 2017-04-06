<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            array('name' => 'In Ear', 'description' => 'In Ear Headphone', 'slug' => 'in-ear', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
            array('name' => 'On Ear', 'description' => 'On Ear Headphone', 'slug' => 'on-ear', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
            array('name' => 'Clip On', 'description' => 'Clip On Headphone', 'slug' => 'clip-on', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
            array('name' => 'DJ', 'description' => 'DJ Headphone', 'slug' => 'dj', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
            array('name' => 'Gaming', 'description' => 'Gaming Headphone', 'slug' => 'gaming', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
            array('name' => 'Ear Bud', 'description' => 'Ear Bud Headphone', 'slug' => 'ear-bud', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
            array('name' => 'Over Ear', 'description' => 'Over Ear Headphone', 'slug' => 'over-ear', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
            array('name' => 'Custom', 'description' => 'Custom Headphone', 'slug' => 'custom', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
            array('name' => 'Lineless', 'description' => 'Lineless Headphone', 'slug' => 'lineless', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
            array('name' => 'Sports', 'description' => 'Sports Headphone', 'slug' => 'sports', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
            array('name' => 'Microable', 'description' => 'Microable Headphone', 'slug' => 'microable', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now())
        ]);
    }
}

