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
        Schema::create('dtks', function (Blueprint $table) {
            $table->id();
            $table->string('Id_DTKS',500)->unique();
            $table->string('Provinsi')->nullable();
            $table->string('Kabupaten_Kota')->nullable();
            $table->string('Kecamatan')->nullable();
            $table->text('Desa_Kelurahan')->nullable();
            $table->string('Alamat')->nullable();
            $table->string('Dusun')->nullable();
            $table->string('RT')->nullable();
            $table->string('RW')->nullable();
            $table->string('Nokk')->nullable();
            $table->string('Nik')->nullable();
            $table->string('Nama')->nullable();
            $table->date('Tanggal_Lahir')->nullable();
            $table->string('Tempat_Lahir')->nullable();
            $table->string('Jenis_Kelamin')->nullable();
            $table->string('Pekerjaan')->nullable();
            $table->string('Nama_Ibu_Kandung')->nullable();
            $table->string('Hub_Keluarga')->nullable();
            $table->string('Keterangan_padan')->nullable();
            $table->string('Bansos_Bpnt')->nullable();
            $table->string('Bansos_Pkh')->nullable();
            $table->string('Bansos_Bnpnt_Ppkm')->nullable();
            $table->string('Pbi_Jni')->nullable();
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
        Schema::dropIfExists('dtks');
    }
};
