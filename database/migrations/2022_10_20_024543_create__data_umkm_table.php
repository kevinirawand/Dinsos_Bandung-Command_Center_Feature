<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_umkm', function (Blueprint $table) {
            $table->id();
            $table->string('Nik')->unique();
            $table->string('Nama_Depan')->nullable();
            $table->text('Alamat')->nullable();
            $table->string('RT')->nullable();
            $table->string('RW')->nullable();
            $table->string('Kelurahan')->nullable();
            $table->string('Kecamatan')->nullable();
            $table->string('Nama_Usaha')->nullable();
            $table->string('Jenis_Usaha')->nullable();
            $table->string('Bentuk_Usaha')->nullable();
            $table->string('Produk_1')->nullable();
            $table->string('Jenis_aset')->nullable();
            $table->string('Jumlah_Aset')->nullable();
            $table->string('Jenis_Omset')->nullable();
            $table->string('Jumlah_Omset')->nullable();
            $table->string('Nama_DTKS')->nullable();
            $table->string('DTKS')->nullable();
            $table->string('KPM_Bansos')->nullable();
            $table->string('BLT_BBM')->nullable();
            $table->string('Periode')->nullable();
           
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
        Schema::dropIfExists('_data_umkm');
    }
};
