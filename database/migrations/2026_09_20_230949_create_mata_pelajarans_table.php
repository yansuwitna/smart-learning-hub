<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('mata_pelajaran', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jenjang_id')->constrained('jenjang')->cascadeOnDelete();
            $table->string('nama');
            $table->string('kode')->unique();
            $table->text('deskripsi')->nullable();
            $table->string('ikon')->nullable();
            $table->string('gambar')->nullable();
            $table->string('warna')->nullable();
            $table->string('status')->default('aktif');
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('mata_pelajaran');
    }
};
