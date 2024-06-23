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
        Schema::create('penghunis', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->string('foto_ktp')->nullable();
            $table->enum('status', ['tetap', 'kontrak']);
            $table->string('nomor_telepon');
            $table->boolean('sudah_menikah');
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
        Schema::dropIfExists('penghunis');
    }
};
