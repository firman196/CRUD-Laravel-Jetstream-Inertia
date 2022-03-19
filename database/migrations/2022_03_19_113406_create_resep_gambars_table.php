<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResepGambarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resep_gambars', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('resep_makanan_id');
            $table->string('gambar_makanan');
            $table->timestamps();
        });

        //relasi ke tabel resep_makanans
        Schema::table('resep_gambars',function (Blueprint $table){
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
        Schema::dropIfExists('resep_gambars');
    }
}
