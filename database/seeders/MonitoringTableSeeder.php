<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MonitoringTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('monitoring')->delete();
        
        \DB::table('monitoring')->insert(array (
            0 => 
            array (
                'id' => 'adaa4374-4807-4dbe-96c6-1580fc6c3418',
                'indikator_id' => 'c72b5a8e-a05c-4aa4-919d-8a28d908e287',
                'opd_id' => '918ddd62-1223-454f-8b7f-15c86928d191',
                'users_id' => '93ffd3b7-ab80-4181-a52f-cfb8f490ba5f',
                'status_konfirmasi' => 0,
                'tanggal_konfirmasi' => NULL,
                'admin_konfirmasi' => NULL,
                'created_at' => '2022-05-25 08:00:04',
                'updated_at' => '2022-05-25 08:00:04',
            ),
        ));
        
        
    }
}