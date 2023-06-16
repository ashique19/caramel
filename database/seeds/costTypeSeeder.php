<?php

use Illuminate\Database\Seeder;

class costTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('cost_types')->insert([
            ['name' => 'Fb Marketing'],
            ['name' => 'Stationary'],
            ['name' => 'Packaging'],
        ]);
        
    }
}
