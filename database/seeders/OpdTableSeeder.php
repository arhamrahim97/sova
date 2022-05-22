<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class OpdTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('opd')->delete();
        
        \DB::table('opd')->insert(array (
            0 => 
            array (
                'id' => '04525a97-adda-422b-a4c1-33fe75b1f3ed',
                'nama' => 'DINAS PENDIDIKAN DAN KEBUDAYAAN',
                'deleted_at' => NULL,
                'created_at' => '2022-05-19 08:19:15',
                'updated_at' => '2022-05-19 08:19:15',
            ),
            1 => 
            array (
                'id' => '054d0915-6ab4-425a-bcb2-07c9032aac5b',
                'nama' => 'DINAS KETENAGAKERJAAN DAN TRANSMIGRASI',
                'deleted_at' => NULL,
                'created_at' => '2022-05-19 08:19:42',
                'updated_at' => '2022-05-19 08:19:42',
            ),
            2 => 
            array (
                'id' => '3bd513e1-9952-482c-b2b3-083a42a1eb92',
                'nama' => 'DINAS SOSIAL',
                'deleted_at' => NULL,
                'created_at' => '2022-05-19 08:19:35',
                'updated_at' => '2022-05-19 08:19:35',
            ),
            3 => 
            array (
                'id' => '918ddd62-1223-454f-8b7f-15c86928d191',
                'nama' => 'DINAS KESEHATAN',
                'deleted_at' => NULL,
                'created_at' => '2022-05-19 08:19:21',
                'updated_at' => '2022-05-19 08:19:21',
            ),
            4 => 
            array (
                'id' => 'e44d2535-8ded-411f-aaca-5ccd2b616a33',
                'nama' => 'DINAS PARIWISATA',
                'deleted_at' => NULL,
                'created_at' => '2022-05-19 08:19:30',
                'updated_at' => '2022-05-19 08:19:30',
            ),
        ));
        
        
    }
}