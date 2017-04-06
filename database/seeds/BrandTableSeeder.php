<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class BrandTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('brands')->insert([
            array('name' => 'Sony', 'description' => 'Sony', 'slug' => 'sony', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
            array('name' => 'AAW', 'description' => 'AAW', 'slug' => 'aaw', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
            array('name' => 'AKG', 'description' => 'AKG', 'slug' => 'akg', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
            array('name' => 'Audio Technica', 'description' => 'Audio-Technica', 'slug' => 'audio-technica', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
            array('name' => 'Aurisonics', 'description' => 'Aurisonics', 'slug' => 'aurisonics', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
            array('name' => 'Beats', 'description' => 'Beats', 'slug' => 'beats', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
            array('name' => 'Bluedio', 'description' => 'Bluedio', 'slug' => 'bluedio', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
            array('name' => 'Campfire', 'description' => 'Campfire', 'slug' => 'campfire', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
            array('name' => 'Denon', 'description' => 'Denon', 'slug' => 'denon', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
            array('name' => 'Hifiman', 'description' => 'Hifiman', 'slug' => 'hifiman', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
            array('name' => 'Shennheiser', 'description' => 'Shennheiser', 'slug' => 'shennheiser', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
            array('name' => 'Shure', 'description' => 'Shure', 'slug' => 'shure', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
            array('name' => 'Soundmagic', 'description' => 'Soundmagic', 'slug' => 'soundmagic', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
            array('name' => 'TFZ', 'description' => 'TFZ', 'slug' => 'tfz', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
            array('name' => 'Westone', 'description' => 'Westone', 'slug' => 'westone', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now())
        ]);
    }
}

