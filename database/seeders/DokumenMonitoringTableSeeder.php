<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DokumenMonitoringTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('dokumen_monitoring')->delete();
        
        \DB::table('dokumen_monitoring')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nama_dokumen' => 'Tes Data 1',
                'dokumen' => 'tes-data-1-02022052508044765.pdf',
                'riwayat_monitoring_id' => '11724e56-e3b2-4a3c-8f02-01d69e81965d',
                'created_at' => '2022-05-25 08:00:04',
                'updated_at' => '2022-05-25 08:00:04',
            ),
            1 => 
            array (
                'id' => 2,
                'nama_dokumen' => 'Coba Aja',
                'dokumen' => 'coba-aja-02022052508049790.pdf',
                'riwayat_monitoring_id' => 'e7eb2af2-2850-4131-a075-ea443a43fc5a',
                'created_at' => '2022-05-25 08:21:04',
                'updated_at' => '2022-05-25 08:21:04',
            ),
        ));
        
        
    }
}