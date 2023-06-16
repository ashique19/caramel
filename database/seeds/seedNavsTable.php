
<?php

use Illuminate\Database\Seeder;

class seedNavsTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('navs')->insert([
            ['id'=> 1, 'name'=> 'Users', 'type'=>'1', 'parent_id'=> null, 'route'=>'', 'location'=> '1'],
            ['id'=> 2, 'name'=> 'Role', 'type'=>'1', 'parent_id'=> null, 'route'=>'', 'location'=> '1'],
            ['id'=> 3, 'name'=> 'Navs', 'type'=>'1', 'parent_id'=> null, 'route'=>'', 'location'=> '1'],
            ['id'=> 4, 'name'=> 'Permissions', 'type'=>'1', 'parent_id'=> null, 'route'=>'', 'location'=> '1'],
            ['id'=> 5, 'name'=> 'Currencies', 'type'=>'1', 'parent_id'=> null, 'route'=>'', 'location'=> '1'],
            ['id'=> 6, 'name'=> 'Settings', 'type'=>'1', 'parent_id'=> null, 'route'=>'', 'location'=> '1'],
            ['id'=> 7, 'name'=> 'Pages', 'type'=>'1', 'parent_id'=> null, 'route'=>'', 'location'=> '1'],
            ['id'=> 8, 'name'=> 'Social', 'type'=>'1', 'parent_id'=> null, 'route'=>'', 'location'=> '1'],
            ['id'=> 9, 'name'=> 'Gateways', 'type'=>'1', 'parent_id'=> null, 'route'=>'', 'location'=> '1'],
            ['id'=> 10,'name'=> 'HRM', 'type'=>'1', 'parent_id'=> null, 'route'=>'', 'location'=> '1'],
            ['id'=> 11,'name'=> 'Courier', 'type'=>'1', 'parent_id'=> null, 'route'=>'', 'location'=> '1'],
        ]);
        
        DB::table('navs')->insert([
            
            ['name'=> 'View all users', 'type'=>'2', 'parent_id'=>1, 'route'=>'admin/users', 'location'=> '1'],
            ['name'=> 'Create new user', 'type'=>'2', 'parent_id'=>1, 'route'=>'admin/users/create', 'location'=> '1'],
            
            ['name'=> 'View all roles', 'type'=>'2', 'parent_id'=>2, 'route'=>'admin/roles', 'location'=> '1'],
            ['name'=> 'Create new role', 'type'=>'2', 'parent_id'=>2, 'route'=>'admin/roles/create', 'location'=> '1'],
            
            ['name'=> 'View all navs', 'type'=>'2', 'parent_id'=>3, 'route'=>'admin/navs', 'location'=> '1'],
            ['name'=> 'Create new nav', 'type'=>'2', 'parent_id'=>3, 'route'=>'admin/navs/create', 'location'=> '1'],
            
            ['name'=> 'View all Permissions', 'type'=>'2', 'parent_id'=>4, 'route'=>'admin/permissions', 'location'=> '1'],
            ['name'=> 'Create new Permission', 'type'=>'2', 'parent_id'=>4, 'route'=>'admin/permissions/create', 'location'=> '1'],
            
            ['name'=> 'View all Currencies', 'type'=>'2', 'parent_id'=>5, 'route'=>'admin/currencies', 'location'=> '1'],
            ['name'=> 'Create new Currency', 'type'=>'2', 'parent_id'=>5, 'route'=>'admin/currencies/create', 'location'=> '1'],
            
            ['name'=> 'App settings', 'type'=>'2', 'parent_id'=>6, 'route'=>'admin/settings/1', 'location'=> '1'],
            
            ['name'=> 'View all pages', 'type'=>'2', 'parent_id'=>7, 'route'=>'admin/pages', 'location'=> '1'],
            ['name'=> 'Create new page', 'type'=>'2', 'parent_id'=>7, 'route'=>'admin/pages/create', 'location'=> '1'],
            
            ['name'=> 'View all Socials', 'type'=>'2', 'parent_id'=>8, 'route'=>'admin/socials', 'location'=> '1'],
            ['name'=> 'Create new Social', 'type'=>'2', 'parent_id'=>8, 'route'=>'admin/socials/create', 'location'=> '1'],
            
            ['name'=> 'View all gateways', 'type'=>'2', 'parent_id'=>9, 'route'=>'admin/gateways', 'location'=> '1'],
            ['name'=> 'Create new gateway', 'type'=>'2', 'parent_id'=>9, 'route'=>'admin/gateways/create', 'location'=> '1'],
            
            ['name'=> 'Job Circulars', 'type'=>'2', 'parent_id'=>10, 'route'=>'admin/circulars', 'location'=> '1'],
            
            ['name'=> 'Courier Settings', 'type'=>'2', 'parent_id'=>11, 'route'=>'admin/couriers', 'location'=> '1'],
            ['name'=> 'Courier Reports', 'type'=>'2', 'parent_id'=>11, 'route'=>'admin/couriers/report', 'location'=> '1'],
            
        ]);
    }
}

        