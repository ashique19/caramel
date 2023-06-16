<?php

use Illuminate\Database\Seeder;

class courierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('couriers')->insert([
            ['name' => 'Yours-courier', 'charge'=> '50', 'cod_percentage'=> '1'],
            ['name' => 'E-courier', 'charge'=> '60', 'cod_percentage'=> '1'],
            ['name' => 'Aramex', 'charge'=> '57', 'cod_percentage'=> '1'],
            ['name' => 'Pathao', 'charge'=> '60', 'cod_percentage'=> '1'],
        ]);
        
    }
}
