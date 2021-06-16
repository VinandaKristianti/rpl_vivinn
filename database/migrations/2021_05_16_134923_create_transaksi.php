<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->increments('id_trx');
            $table->string ('nama_rek');
            $table->date ('tgl_kirim');
            $table->string ('bank');
            $table->string ('total');
            $table->string ('bukti_bayar');
            $table->string('link_tes');
            $table->string('status');
            $table->integer('id_daftar');
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
        Schema::dropIfExists('transaksi');
    }
}
