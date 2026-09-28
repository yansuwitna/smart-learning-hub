<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('kemajuan_belajar', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pengguna_id')->constrained('pengguna')->cascadeOnDelete();
            $table->foreignId('pelajaran_id')->constrained('pelajaran')->cascadeOnDelete();
            $table->string('status')->default('belum_mulai');
            $table->integer('persentase')->default(0);
            $table->integer('waktu_belajar_detik')->default(0);
            $table->timestamp('pertama_diakses_pada')->nullable();
            $table->timestamp('terakhir_diakses_pada')->nullable();
            $table->timestamp('selesai_pada')->nullable();
            $table->timestamps();
            $table->unique(['pengguna_id', 'pelajaran_id']);
        });
    }
    public function down(): void {
        Schema::dropIfExists('kemajuan_belajar');
    }
};
