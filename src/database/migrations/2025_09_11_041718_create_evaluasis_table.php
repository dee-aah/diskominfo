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
        Schema::create('evaluasis', function (Blueprint $table) {
            $table->id();
            $table->text('nama');
            $table->text('link');
            $table->string('img_pdf');
            $table->timestamps();
        });
        Schema::create('evaluasi_conts', function (Blueprint $table) {
            $table->id();
            $table->text('des_singkat');
            $table->string('img_konten');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluasis');
        Schema::dropIfExists('evaluasi_conts');
    }
};
