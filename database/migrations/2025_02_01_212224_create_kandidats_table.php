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
        Schema::create('kandidats', function (Blueprint $table) {
            $table->id();
            $table->string('no_urut');
            $table->foreignId('ketua_id')->constrained('tabel_siswas')->onDelete('cascade');
            $table->foreignId('wakil1_id')->constrained('tabel_siswas')->onDelete('cascade');
            $table->foreignId('wakil2_id')->constrained('tabel_siswas')->onDelete('cascade');
            $table->string('image')->nullable();
            $table->string('visimisi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kandidats');
    }
};
