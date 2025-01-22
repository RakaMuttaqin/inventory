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
        Schema::create('peminjaman', function (Blueprint $table) {
            $table->string('pb_id', 20)->primary();
            $table->string('user_id', 10);
            $table->dateTime('pb_tgl');
            $table->string('siswa_id');
            $table->dateTime('pb_harus_kembali_tgl');
            $table->string('pb_stat', 2);

            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
            $table->foreign('siswa_id')->references('nis')->on('siswa')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjaman');
    }
};
