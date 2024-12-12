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
        Schema::create('log_angka_kredits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('data_pegawai_id')->constrained();
            $table->decimal('angka_kredit', 9, 3);
            $table->enum('keterangan', ['nilai_awal', 'bulanan']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('log_angka_kredits');
    }
};
