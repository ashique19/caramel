<?php

use Illuminate\Database\Seeder;

class productSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('products')->insert([
            ['name'=> 'N1', 'category_id'=> 1],
            ['name'=> 'N2', 'category_id'=> 1],
            ['name'=> 'N3', 'category_id'=> 1],
            ['name'=> 'N4', 'category_id'=> 1],
            ['name'=> 'N5', 'category_id'=> 2],
            ['name'=> 'N6', 'category_id'=> 2],
        ]);
        
    }
}
