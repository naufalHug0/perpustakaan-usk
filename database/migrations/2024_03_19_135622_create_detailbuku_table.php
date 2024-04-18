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
        Schema::create('detailbuku', function (Blueprint $table) {
            $table->id();
            $table->enum('status',['Tersedia', 'Tidak Tersedia']);
            $table->foreignId('buku_id');
            $table->foreign('buku_id')->references('id')->on('buku')->onDelete('restrict')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detailbuku');
    }
};
