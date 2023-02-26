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
        Schema::create('Data_Pkh', function (Blueprint $table) {
            $table->id();
            $table->string('Nik')->unique();
            $table->string('Nama_Penerima')->nullable();
            $table->text('Alamat')->nullable();
            $table->integer('Nomer_Rekening')->nullable();
            $table->string('penyalur')->nullable();
            $table->string('Bansos')->nullable();
            $table->string('Status')->nullable();
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
        Schema::dropIfExists('Data_PKH ');
    }
};
