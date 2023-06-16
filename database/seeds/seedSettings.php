
<?php

use Illuminate\Database\Seeder;

class seedSettings extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('settings')->insert([
            [
                'application_name'      =>'Caramel.com.bd',
                'application_slogan'    =>'Exclusive collection of woman accessories',
                'business_name'         =>'detail', 
                'owners_name'           =>'POKA LTD', 
                'address'               =>'H-36, R-9/A, Dhanmondi', 
                'city'                  =>'Dhaka', 
                'country'               =>'Bangladesh', 
                'postcode'              =>'1217', 
                'contact'               =>'01704262500', 
                'helpline'              =>'01704262500', 
                'helpmail'              =>'info@caramel.com.bd', 
                'email'                 =>'info@caramel.com.bd', 
                'logo_photo'            => '/public/img/settings/logo.png',
                'icon_photo'            => '/public/img/settings/favicon.png',
                'google_plus'           => 'http://plus.google.com',
                'facebook'              => 'http://facebook.com',
                'twitter'               => 'http://twitter.com',
                'is_controlled_access'  => '2',
            ],
        ]);
        
    }
}

        