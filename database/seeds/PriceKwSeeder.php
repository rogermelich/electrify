<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PriceKwSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('price_kw')->insert([
            'price_kw' => 0.14767,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s'),
        ]);
    }
}
