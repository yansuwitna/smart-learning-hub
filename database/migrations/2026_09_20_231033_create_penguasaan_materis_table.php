<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('penguasaan_materi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pengguna_id')->constrained('pengguna')->cascadeOnDelete();
            $table->foreignId('topik_id')->constrained('topik')->cascadeOnDelete();
            $table->string('tingkat_penguasaan')->default('belum_mulai');
            $table->integer('skor_penguasaan')->default(0);
            $table->integer('jumlah_latihan')->default(0);
            $table->integer('jumlah_benar')->default(0);
            $table->integer('jumlah_salah')->default(0);
            $table->timestamp('terakhir_diperbarui_pada')->nullable();
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('penguasaan_materi');
    }
};
