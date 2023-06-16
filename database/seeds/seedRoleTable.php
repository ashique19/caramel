<?php

use Illuminate\Database\Seeder;

class seedRoleTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert(
            
            [
                ['id'=> 1, 'name'=>'dev'],
                ['id'=> 2, 'name'=>'admin'],
                ['id'=> 3, 'name'=>'client'],
                ['id'=> 4, 'name'=>'vendor'],
            ]
        
        );
        
        
    }
}
