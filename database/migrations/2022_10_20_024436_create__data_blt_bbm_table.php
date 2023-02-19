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
        Schema::create('Data_BLT_BBM', function (Blueprint $table) {
            $table->id();
            $table->string('Nokk',500)->unique();
            $table->string('Nik')->unique();
            $table->string('Nama_Penerima')->nullable();
            $table->text('Alamat')->nullable();
            $table->integer('Nomer_Rekening')->nullable();
            $table->string('penyalur')->nullable();
            $table->string('Status')->nullable();
            $table->string('Bansos')->nullable();
            $table->string('Periode')->nullable();
            $table->string('Kelurahan')->nullable();
            $table->string('Kecamatan')->nullable();
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
        Schema::dropIfExists('Data_BLT_BBM');
    }
};
