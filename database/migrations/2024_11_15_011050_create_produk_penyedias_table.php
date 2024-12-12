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
        Schema::create('produk_penyedias', function (Blueprint $table) {
            $table->id();
            $table->foreignId('penyedia_id')->constrained();
            $table->foreignId('produk_id')->constrained();
            $table->integer('harga');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produk_penyedias');
    }
};
