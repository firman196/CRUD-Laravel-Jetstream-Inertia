<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResepLikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resep_likes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('resep_makanan_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
        });

        //relasi ke tabel resep_makanans
        Schema::table('resep_likes',function (Blueprint $table){
            $table->foreign('resep_makanan_id')->references('id')->on('resep_makanans')->onUpdate('cascade')->onDelete('cascade');
        });

        //relasi ke tabel users
        Schema::table('resep_likes',function (Blueprint $table){
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resep_likes');
    }
}
