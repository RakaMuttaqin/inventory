<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('peminjaman_barang', function (Blueprint $table) {
            $table->string('pbd_id', 20)->primary();
            $table->string('pb_id', 20);
            $table->string('br_kode', 12);
            $table->dateTime('pbd_tgl');
            $table->string('pbd_sts', 2);

            $table->foreign('pb_id')->references('pb_id')->on('peminjaman')->onDelete('cascade');
            $table->foreign('br_kode')->references('br_kode')->on('barang')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjaman_barang');
    }
};
