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
        Schema::create('aspek_kinerjas', function (Blueprint $table) {
            $table->id();
            $table->string('aspek_kinerja');
            $table->integer('bobot');
            $table->text('cukup');
            $table->text('baik');
            $table->text('sangat_baik');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aspek_kinerjas');
    }
};
