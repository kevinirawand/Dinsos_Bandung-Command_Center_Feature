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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('Id_DTKS')->unique();
            $table->string('Provinsi');
            $table->string('Kabupaten_Kota');
            $table->string('Kecamatan');
            $table->text('Desa_Kelurahan');
            $table->integer('RT');
            $table->integer('RW');
            $table->integer('NOKK')->unique();
            $table->integer('NIK')->unique();
            $table->date('Tanggal_Lahir');
            $table->string('Tempat_Lahir');
            $table->string('Jenis_Kelamin');
            $table->string('Pekerjaan');
            $table->string('Nama_Ibu_Kandung');
            $table->string('Hub_Keluarga');
            $table->string('Keterangan_padan');
            $table->string('Bansos_BPNT');
            $table->string('Bansos_PKH');
            $table->string('Bansos_BNPNT_PPKM');
            $table->string('PBI_BPNT_PPKM');
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
        Schema::dropIfExists('products');
    }
};
