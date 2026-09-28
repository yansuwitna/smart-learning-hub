<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('pelajaran', function (Blueprint $table) {
            $table->id();
            $table->foreignId('modul_id')->constrained('modul')->cascadeOnDelete();
            $table->foreignId('topik_id')->nullable()->constrained('topik')->nullOnDelete();
            $table->string('nama');
            $table->string('slug')->unique();
            $table->text('deskripsi')->nullable();
            $table->text('tujuan_pembelajaran')->nullable();
            $table->integer('durasi_menit')->nullable();
            $table->string('tingkat_kesulitan')->nullable();
            $table->integer('urutan')->default(0);
            $table->string('status')->default('draft');
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('pelajaran');
    }
};
