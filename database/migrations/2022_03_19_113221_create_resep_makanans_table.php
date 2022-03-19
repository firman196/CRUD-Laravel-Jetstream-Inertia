<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResepMakanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resep_makanans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_resep',100);
            $table->unsignedBigInteger('kategori_id');
            $table->text('deskripsi')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
        });

        //relasi ke tabel kategoris
        Schema::table('resep_makanans', function (Blueprint $table) {
            $table->foreign('kategori_id')->references('id')->on('resep_kategoris')->onUpdate('cascade')->onDelete('cascade');
        });

        //relasi ke tabel users
        Schema::table('resep_makanans',function (Blueprint $table){
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
        Schema::dropIfExists('resep_makanans');
    }
}
