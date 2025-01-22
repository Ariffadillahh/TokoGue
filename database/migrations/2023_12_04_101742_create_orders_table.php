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
        Schema::create('orders', function (Blueprint $table) {
            $table->id('id_orders');
            $table->integer('id_product');
            $table->integer('id_alamat');
            $table->integer('id_user');
            $table->string('qty_orders');
            $table->string('metode_pembayaran');
            $table->string('status_orders');
            $table->string('date_orders');
            $table->string('total_harga');
            $table->string('no_resi')->nullable();
            $table->string('jasa_antar')->nullable();
            $table->string('size');
            $table->string('harga_product');
            $table->string('waktu_nerimapesanan')->nullable();
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
        Schema::dropIfExists('orders');
    }
};
