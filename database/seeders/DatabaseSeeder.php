<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(KecamatanTableSeeder::class);
        $this->call(DesaKelurahanTableSeeder::class);
        $this->call(OpdTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(IndikatorTableSeeder::class);
        // $this->call(DokumenMonitoringTableSeeder::class);
        // $this->call(MonitoringTableSeeder::class);
        // $this->call(RiwayatMonitoringTableSeeder::class);
        // $this->call(WilayahMonitoringTableSeeder::class);
    }
}
