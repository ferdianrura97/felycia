<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangPenjualansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang_penjualans', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('penjualan_id');
            $table->foreign('penjualan_id')->references('id')->on('penjualans');

            $table->unsignedInteger('barang_id');
            $table->foreign('barang_id')->references('id')->on('barangs');
            $table->integer('jumlah');
            $table->integer('harga');
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
        Schema::dropIfExists('barang_penjualans');
    }
}
