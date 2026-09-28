<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('rekomendasi_belajar', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pengguna_id')->constrained('pengguna')->cascadeOnDelete();
            $table->foreignId('pelajaran_id')->constrained('pelajaran')->cascadeOnDelete();
            $table->text('alasan')->nullable();
            $table->integer('prioritas')->default(0);
            $table->string('sumber_rekomendasi')->nullable();
            $table->string('status')->default('aktif');
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('rekomendasi_belajar');
    }
};
