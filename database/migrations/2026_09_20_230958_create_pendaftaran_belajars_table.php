<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('pendaftaran_belajar', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pengguna_id')->constrained('pengguna')->cascadeOnDelete();
            $table->foreignId('kursus_id')->constrained('kursus')->cascadeOnDelete();
            $table->timestamp('dimulai_pada')->nullable();
            $table->timestamp('terakhir_belajar_pada')->nullable();
            $table->timestamp('selesai_pada')->nullable();
            $table->integer('persentase_kemajuan')->default(0);
            $table->string('status')->default('aktif');
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('pendaftaran_belajar');
    }
};
