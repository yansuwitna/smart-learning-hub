<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('soal', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mata_pelajaran_id')->constrained('mata_pelajaran')->cascadeOnDelete();
            $table->foreignId('topik_id')->nullable()->constrained('topik')->cascadeOnDelete();
            $table->foreignId('pelajaran_id')->nullable()->constrained('pelajaran')->cascadeOnDelete();
            $table->text('pertanyaan');
            $table->string('jenis_soal');
            $table->string('tingkat_kesulitan')->nullable();
            $table->string('tingkat_kognitif')->nullable();
            $table->text('pembahasan')->nullable();
            $table->integer('nilai')->default(10);
            $table->string('status')->default('aktif');
            $table->foreignId('dibuat_oleh')->nullable()->constrained('pengguna')->nullOnDelete();
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('soal');
    }
};
