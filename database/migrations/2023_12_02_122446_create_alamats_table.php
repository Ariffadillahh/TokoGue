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
        Schema::create('alamats', function (Blueprint $table) {
            $table->id("id_alamat");
            $table->string('name_penerima');
            $table->string('no_hp');
            $table->string('name_provinsi');
            $table->string('name_kota');
            $table->string('name_kecamatan');
            $table->string('name_kelurahan');
            $table->string('alamat_detail');
            $table->integer('id_user');
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
        Schema::dropIfExists('alamats');
    }
};
