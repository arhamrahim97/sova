<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRiwayatMonitoringTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riwayat_monitoring', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('monitoring_id');
            $table->text('deskripsi');
            $table->integer('tw');
            $table->integer('total_wilayah_monitoring');
            $table->integer('total_seluruh_desa');
            $table->double('persentase');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('riwayat_monitoring');
    }
}
