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
        Schema::create('detailpeminjaman', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_kembali');
            $table->foreignId('peminjaman_id');
            $table->foreignId('detailbuku_id');
            $table->foreign('peminjaman_id')->references('id')->on('peminjaman')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('detailbuku_id')->references('id')->on('detailbuku')->onDelete('restrict')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detailpeminjaman');
    }
};
