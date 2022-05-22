<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class KecamatanTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('kecamatan')->delete();

        \DB::table('kecamatan')->insert(array(
            0 =>
            array(
                'id' => 7210010,
                'nama' => 'PIPIKORO',
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => '2022-04-09 10:31:46',
            ),
            1 =>
            array(
                'id' => 7210020,
                'nama' => 'KULAWI SELATAN',
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => '2022-04-09 10:23:09',
            ),
            2 =>
            array(
                'id' => 7210030,
                'nama' => 'KULAWI',
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => '2022-04-09 10:20:07',
            ),
            3 =>
            array(
                'id' => 7210040,
                'nama' => 'LINDU',
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => '2022-04-09 09:56:56',
            ),
            4 =>
            array(
                'id' => 7210050,
                'nama' => 'NOKILALAKI',
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => '2022-04-09 10:07:29',
            ),
            5 =>
            array(
                'id' => 7210060,
                'nama' => 'PALOLO',
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => '2022-04-09 10:12:34',
            ),
            6 =>
            array(
                'id' => 7210070,
                'nama' => 'GUMBASA',
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => '2022-04-09 09:44:40',
            ),
            7 =>
            array(
                'id' => 7210080,
                'nama' => 'DOLO SELATAN',
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => '2022-04-09 09:38:48',
            ),
            8 =>
            array(
                'id' => 7210090,
                'nama' => 'DOLO BARAT',
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => '2022-04-08 22:26:19',
            ),
            9 =>
            array(
                'id' => 7210100,
                'nama' => 'TANAMBULAVA',
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => '2022-04-09 09:41:36',
            ),
            10 =>
            array(
                'id' => 7210110,
                'nama' => 'DOLO',
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => '2022-04-08 22:22:52',
            ),
            11 =>
            array(
                'id' => 7210120,
                'nama' => 'SIGI BIROMARU',
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => '2022-04-09 10:15:38',
            ),
            12 =>
            array(
                'id' => 7210130,
                'nama' => 'MARAWOLA',
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => '2022-04-09 10:02:08',
            ),
            13 =>
            array(
                'id' => 7210140,
                'nama' => 'MARAWOLA BARAT',
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => '2022-04-09 10:25:27',
            ),
            14 =>
            array(
                'id' => 7210150,
                'nama' => 'KINOVARO',
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => '2022-04-09 09:47:09',
            ),
        ));
    }
}
