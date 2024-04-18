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
            $table->id();
            $table->date('tanggal_peminjaman');
            $table->date('expired_at');
            $table->foreignId('admin_id');
            $table->foreignId('anggota_id');
            $table->foreign('admin_id')->references('id')->on('admin')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('anggota_id')->references('id')->on('anggota')->onDelete('restrict')->onUpdate('cascade');
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
