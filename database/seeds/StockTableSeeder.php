<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class StockTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('stocks')->insert([
            array('import_price' => '700000',
                'quantity'           => 100,
                'product_id'         => 1,
                'created_at'         => Carbon::now(),
                'updated_at'         => Carbon::now(),
            ),
           array('import_price' => '700000',
                'quantity'           => 100,
                'product_id'         => 2,
                'created_at'         => Carbon::now(),
                'updated_at'         => Carbon::now(),
            )
        ]);
    }
}
