<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('percobaan_kuis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pengguna_id')->constrained('pengguna')->cascadeOnDelete();
            $table->foreignId('pelajaran_id')->constrained('pelajaran')->cascadeOnDelete();
            $table->integer('jumlah_soal')->default(0);
            $table->integer('jumlah_benar')->default(0);
            $table->integer('nilai')->default(0);
            $table->timestamp('dimulai_pada')->nullable();
            $table->timestamp('selesai_pada')->nullable();
            $table->integer('durasi_detik')->default(0);
            $table->string('status')->default('berjalan');
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('percobaan_kuis');
    }
};
