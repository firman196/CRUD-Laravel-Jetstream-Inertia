<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResepBahansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resep_bahans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('resep_makanan_id');
            $table->string('nama_bahan',100);
            $table->string('takaran',20)->nullable();
            $table->timestamps();
        });

         //relasi ke tabel resep_makanans
         Schema::table('resep_bahans',function (Blueprint $table){
            $table->foreign('resep_makanan_id')->references('id')->on('resep_makanans')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resep_bahans');
    }
}
