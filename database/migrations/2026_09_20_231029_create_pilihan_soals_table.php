<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('pilihan_soal', function (Blueprint $table) {
            $table->id();
            $table->foreignId('soal_id')->constrained('soal')->cascadeOnDelete();
            $table->text('teks_pilihan');
            $table->string('kode_pilihan')->nullable();
            $table->boolean('benar')->default(false);
            $table->integer('urutan')->default(0);
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('pilihan_soal');
    }
};
