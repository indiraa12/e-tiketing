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
        Schema::create('pemesanans', function (Blueprint $table) {
            $table->id();
            $table->string('kode_pemesanan');
            $table->date('tgl_pemesanan');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('kode_kursi');
            $table->foreignId('rute_id')->constrained('rutes')->onDelete('cascade');
            $table->date('tgl_berangkat');
            $table->integer('total_bayar');
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
        Schema::dropIfExists('pemesanans');
    }
};
