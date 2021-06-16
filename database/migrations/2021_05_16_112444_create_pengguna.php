<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengguna extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengguna', function (Blueprint $table) {
            $table->increments('id_user');
            $table->string ('nik');
            $table->string ('nama');
            $table->string ('jk');
            $table->date ('tgl_lahir');
            $table->string ('tempat_lahir');
            $table->string ('alamat');
            $table->string ('hp');
            $table->longtext ('minat');
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
        Schema::dropIfExists('pengguna');
    }
}
