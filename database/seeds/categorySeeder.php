<?php

use Illuminate\Database\Seeder;

class categorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('categories')->insert([
            ['name'=> 'Necklace', 'name_slug'=> 'necklace'],
            ['name'=> 'Earring', 'name_slug'=> 'earring'],
            ['name'=> 'Finger Ring', 'name_slug'=> 'fingerring'],
            ['name'=> 'Nose Pin', 'name_slug'=> 'nosepin'],
            ['name'=> 'Mirror', 'name_slug'=> 'mirror'],
            ['name'=> 'Purse', 'name_slug'=> 'purse'],
            ['name'=> 'Jewelry Box', 'name_slug'=> 'jewelrybox'],
            ['name'=> 'Sharee', 'name_slug'=> 'sharee'],
            ['name'=> 'Others', 'name_slug'=> 'others'],
        ]);
        
    }
}
