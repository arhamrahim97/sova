<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class IndikatorTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('indikator')->delete();
        
        \DB::table('indikator')->insert(array (
            0 => 
            array (
                'id' => '50957899-4fe5-456e-9e62-a5573d85f59b',
                'nama' => 'Memberikan bantuan sembako',
                'deleted_at' => NULL,
                'created_at' => '2022-05-19 13:57:18',
                'updated_at' => '2022-05-19 13:57:18',
            ),
            1 => 
            array (
                'id' => '5ad88039-728b-4ea9-b3c9-b724d3dcbdb8',
                'nama' => 'Pemasangan Rambu-rambu jalur evakuasi',
                'deleted_at' => NULL,
                'created_at' => '2022-05-19 13:58:09',
                'updated_at' => '2022-05-19 13:58:09',
            ),
            2 => 
            array (
                'id' => 'a8b0edf8-2437-427f-9075-97d8a9fb6ce5',
                'nama' => 'Pembangunan MCK',
                'deleted_at' => NULL,
                'created_at' => '2022-05-19 13:57:39',
                'updated_at' => '2022-05-19 13:57:39',
            ),
            3 => 
            array (
                'id' => 'c72b5a8e-a05c-4aa4-919d-8a28d908e287',
                'nama' => 'Edukasi Cara Membayar Pajak Via Sosial Media',
                'deleted_at' => NULL,
                'created_at' => '2022-05-19 13:56:14',
                'updated_at' => '2022-05-19 13:56:14',
            ),
            4 => 
            array (
                'id' => 'ef25a5b2-43ee-4689-bc3a-f2c830da197c',
                'nama' => 'Pembagian Masker',
                'deleted_at' => NULL,
                'created_at' => '2022-05-19 13:56:29',
                'updated_at' => '2022-05-19 13:56:29',
            ),
        ));
        
        
    }
}