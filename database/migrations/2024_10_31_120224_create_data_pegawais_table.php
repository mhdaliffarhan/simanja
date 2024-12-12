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
        Schema::create('data_pegawais', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->foreignId('jabatan_id')->constrained();
            $table->string('golongan_id');
            $table->string('status');
            $table->string('pendidikan');
            $table->decimal('angka_kredit', 9, 3);
            $table->foreignId('satker_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_pegawais');
    }
};
