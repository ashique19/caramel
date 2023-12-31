<?php

use Illuminate\Database\Seeder;

class seedUserTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'username'          => 'ashique',
                'email'             => 'ashique19@gmail.com',
                'password'          => bcrypt('9515'),
                'role'              => 1,
                'firstname'         => 'md ashiqul',
                'lastname'          => 'islam',
                'name'              => 'Md Ashiqul Islam',
                'contact'           => '01710123456',
                'address'           => 'Banasree',
                'city'              => 'Dhaka',
                'state'             => 'Dhaka',
                'postcode'          => '1219',
                'country_id'        => 10,
                'parmanent_address' => 'Brahmanbaria',
                'active'            => '1',
                'expiry_date'       => \Carbon::now()->addYear(1),
                'user_photo'        => '\public\img\users\1.png',
                'balance'           => '100.52',
            ],
            [
                'username'          => 'ashique',
                'email'             => 'ashique19@hotmail.com',
                'password'          => bcrypt('9515'),
                'role'              => 1,
                'firstname'         => 'md ashiqul',
                'lastname'          => 'islam',
                'name'              => 'Md Ashiqul Islam',
                'contact'           => '01710123456',
                'address'           => 'Banasree',
                'city'              => 'Dhaka',
                'state'             => 'Dhaka',
                'postcode'          => '1219',
                'country_id'        => 10,
                'parmanent_address' => 'Brahmanbaria',
                'active'            => '1',
                'expiry_date'       => \Carbon::now()->addYear(1),
                'user_photo'        => '\public\img\users\1.png',
                'balance'           => '100.52',
            ],
            [
                'username'          => 'admin',
                'email'             => 'admin@system.com',
                'password'          => bcrypt('1234'),
                'role'              => 2,
                'firstname'         => 'the admin',
                'lastname'          => 'of system',
                'name'              => 'The admin of system',
                'contact'           => '01710123457',
                'address'           => 'Mirpur 10',
                'city'              => 'Dhaka',
                'state'             => 'Dhaka',
                'postcode'          => '1219',
                'country_id'        =>  11,
                'parmanent_address' => 'Bangladesh',
                'active'            => '1',
                'expiry_date'       => null,
                'user_photo'        => '\public\img\users\1.png',
                'balance'           => '0',
            ],
            [
                'username'          => 'moderator',
                'email'             => 'moderator@system.com',
                'password'          => bcrypt('1234'),
                'role'              => 3,
                'firstname'         => 'the moderator',
                'lastname'          => 'of system',
                'name'              => 'The moderator of system',
                'contact'           => '01710123457',
                'address'           => 'Mirpur 10',
                'city'              => 'Dhaka',
                'state'             => 'Dhaka',
                'postcode'          => '1219',
                'country_id'        =>  11,
                'parmanent_address' => 'Bangladesh',
                'active'            => '1',
                'expiry_date'       => null,
                'user_photo'        => '\public\img\users\1.png',
                'balance'           => '0',
            ],
            [
                'username'          => 'client',
                'email'             => 'client@system.com',
                'password'          => bcrypt('1234'),
                'role'              => 4,
                'firstname'         => 'the client',
                'lastname'          => 'of system',
                'name'              => 'The client of system',
                'contact'           => '01710123457',
                'address'           => 'Mirpur 10',
                'city'              => 'Dhaka',
                'state'             => 'Dhaka',
                'postcode'          => '1219',
                'country_id'        =>  11,
                'parmanent_address' => 'Bangladesh',
                'active'            => '1',
                'expiry_date'       => null,
                'user_photo'        => '\public\img\users\1.png',
                'balance'           => '0',
            ],
            
        ]);
    }
}
