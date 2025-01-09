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
        Schema::create('penyedias', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('status')->nullable();
            $table->string('alamat')->nullable();
            $table->string('tahun_berdiri')->nullable();
            $table->string('nohp')->nullable();
            $table->string('email')->nullable();
            $table->string('jenis_usaha')->nullable();
            $table->string('no_identitas')->nullable();
            $table->string('pengurus')->nullable();
            $table->string('jabatan')->nullable();
            $table->string('no_akta')->nullable();
            $table->date('tanggal')->nullable();
            $table->string('notaris')->nullable();
            $table->string('no_tgl')->nullable();
            $table->string('masa_berlaku')->nullable();
            $table->string('instansi_pemberi')->nullable();
            $table->string('npwp')->nullable();
            $table->string('nama_narahubung')->nullable();
            $table->string('nohp_narahubung')->nullable();
            $table->string('jabatan_narahubung')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penyedias');
    }
};
