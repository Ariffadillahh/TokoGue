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
        Schema::create('ratings', function (Blueprint $table) {
            $table->id('id_ratings');
            $table->integer('id_orders')->constraint('orders')->onDelete('cascade');
            $table->string('komentar')->nullable();
            $table->string('start_rate')->nullable();
            $table->string('id_user')->nullable();
            $table->string('waktu_rate')->nullable();
            $table->string('status_rate')->nullable();
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
        Schema::dropIfExists('ratings');
    }
};
