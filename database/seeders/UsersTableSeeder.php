<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => '1c376c70-6b6c-49f2-8336-eb146e415887',
                'email' => 'admin@gmail.com',
                'email_verified_at' => NULL,
                'opd_id' => '918ddd62-1223-454f-8b7f-15c86928d191',
                'password' => '$2y$10$5oEPf4qmMz3os99GikJtPO3Aa1kT4TgPto9EE1LJf0OpPO4l.5n9a',
                'role' => 'Admin',
                'remember_token' => NULL,
                'created_at' => '2022-05-19 08:33:01',
                'updated_at' => '2022-05-19 08:33:01',
            ),
            1 => 
            array (
                'id' => '6025dd6a-7c45-4167-b155-f3e32249f9d8',
                'email' => 'disnakertrans@gmail.com',
                'email_verified_at' => NULL,
                'opd_id' => '054d0915-6ab4-425a-bcb2-07c9032aac5b',
                'password' => '$2y$10$Z5uDfVye4iYFrzn2dFxBFuNkN1jnUpQXp3cX1K3PcufPYDR5Rfbpm',
                'role' => 'OPD',
                'remember_token' => NULL,
                'created_at' => '2022-05-19 08:36:16',
                'updated_at' => '2022-05-19 08:36:16',
            ),
            2 => 
            array (
                'id' => '75b9ee18-b21d-4825-994d-afcc48a0a414',
                'email' => 'pariwisata@gmail.com',
                'email_verified_at' => NULL,
                'opd_id' => 'e44d2535-8ded-411f-aaca-5ccd2b616a33',
                'password' => '$2y$10$JN.ob9CIlXyGqi8UIGBcXuKmFzqD360oMZeGou6Zzc/zpka.w7JFi',
                'role' => 'OPD',
                'remember_token' => NULL,
                'created_at' => '2022-05-19 08:36:49',
                'updated_at' => '2022-05-19 08:36:49',
            ),
            3 => 
            array (
                'id' => '93ffd3b7-ab80-4181-a52f-cfb8f490ba5f',
                'email' => 'dinkes@gmail.com',
                'email_verified_at' => NULL,
                'opd_id' => '918ddd62-1223-454f-8b7f-15c86928d191',
                'password' => '$2y$10$f8VWfPsEkn5GrUBh2tw9Fe2pRXVtGwyhs1TLIIj8YjPQ/hwQxYH8i',
                'role' => 'OPD',
                'remember_token' => NULL,
                'created_at' => '2022-05-19 08:35:42',
                'updated_at' => '2022-05-19 08:35:42',
            ),
        ));
        
        
    }
}