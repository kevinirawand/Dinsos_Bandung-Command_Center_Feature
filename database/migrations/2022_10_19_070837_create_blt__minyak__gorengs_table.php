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
        Schema::create('Blt_Minyak_Gorengs', function (Blueprint $table) {
            $table->id();
            $table->string('Nokk',500)->unique();
            $table->string('Nik')->unique();
            $table->string('Nama')->nullable();
            $table->text('Alamat')->nullable();
            $table->text('Sk_Dtks')->nullable();
            $table->dateTime('Terakhir_Padan_Capil')->nullable();
            $table->string('Bpnt')->nullable();
            $table->string('Bst')->nullable();
            $table->string('Pkh')->nullable();
            $table->string('Pbi')->nullable();
            $table->string('Bpnt_Ppkm')->nullable();
            $table->string('Blt')->nullable();
            $table->String('Blt_Bbm')->nullable();
            $table->string('Rutilahu')->nullable();
            $table->string('Keterangan_Meninggal')->nullable();
            $table->string('Keterangan_Disabilitas')->nullable();
            $table->string('Kelurahan')->nullable();
            $table->string('Kecamatan')->nullable();
            $table->string('Keterangan_padan')->nullable();
            $table->string('CreateBy')->nullable();
            $table->string('UpdateBy')->nullable();
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
        Schema::dropIfExists('blt__minyak__gorengs');
    }
};
