<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('kursus', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mata_pelajaran_id')->constrained('mata_pelajaran')->cascadeOnDelete();
            $table->foreignId('jenjang_id')->constrained('jenjang')->cascadeOnDelete();
            $table->foreignId('kelas_id')->nullable()->constrained('kelas')->nullOnDelete();
            $table->string('nama');
            $table->string('slug')->unique();
            $table->text('deskripsi')->nullable();
            $table->string('tingkat_kesulitan')->nullable();
            $table->integer('durasi_menit')->nullable();
            $table->string('gambar')->nullable();
            $table->string('ikon')->nullable();
            $table->string('status')->default('draft');
            $table->timestamp('dipublikasikan_pada')->nullable();
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('kursus');
    }
};
