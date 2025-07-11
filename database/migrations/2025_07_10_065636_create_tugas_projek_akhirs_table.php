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
        Schema::create('tugas_projek_akhirs', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->text('deskripsi')->nullable();
            $table->foreignId('pembimbing_id')->constrained('users')->onDelete('cascade');
            $table->dateTime('deadline');
            $table->enum('status', ['perencanaan', 'berjalan', 'presentasi', 'selesai'])->default('perencanaan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tugas_projek_akhirs');
    }
};
