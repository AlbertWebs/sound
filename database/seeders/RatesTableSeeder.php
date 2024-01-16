<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RatesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('rates')->delete();
        
        \DB::table('rates')->insert(array (
            0 => 
            array (
                'id' => 1,
                'currency' => 'USD',
                'symbol' => '$',
                'rates' => '0.008821',
                'created_at' => '2021-12-15 09:28:49',
                'updated_at' => '2021-12-15 09:28:59',
            ),
            1 => 
            array (
                'id' => 2,
                'currency' => 'EUR',
                'symbol' => '€',
                'rates' => '0.007824',
                'created_at' => '2021-12-15 09:28:54',
                'updated_at' => '2021-12-15 09:29:03',
            ),
            2 => 
            array (
                'id' => 3,
                'currency' => 'GBP',
                'symbol' => '£',
                'rates' => '0.006662',
                'created_at' => '2021-12-15 09:29:12',
                'updated_at' => '2021-12-15 09:29:08',
            ),
            3 => 
            array (
                'id' => 4,
                'currency' => 'KES',
                'symbol' => 'Ksh',
                'rates' => '1',
                'created_at' => '2021-12-15 10:06:30',
                'updated_at' => '2021-12-15 10:06:30',
            ),
        ));
        
        
    }
}