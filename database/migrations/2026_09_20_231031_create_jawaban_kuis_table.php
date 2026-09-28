<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('jawaban_kuis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('percobaan_kuis_id')->constrained('percobaan_kuis')->cascadeOnDelete();
            $table->foreignId('soal_id')->constrained('soal')->cascadeOnDelete();
            $table->foreignId('pilihan_soal_id')->nullable()->constrained('pilihan_soal')->cascadeOnDelete();
            $table->text('jawaban_teks')->nullable();
            $table->boolean('benar')->default(false);
            $table->integer('nilai')->default(0);
            $table->timestamp('dijawab_pada')->useCurrent();
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('jawaban_kuis');
    }
};
