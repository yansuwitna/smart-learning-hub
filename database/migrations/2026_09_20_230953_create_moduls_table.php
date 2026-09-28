<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('modul', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kursus_id')->constrained('kursus')->cascadeOnDelete();
            $table->string('nama');
            $table->string('slug')->unique();
            $table->text('deskripsi')->nullable();
            $table->integer('urutan')->default(0);
            $table->string('status')->default('draft');
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('modul');
    }
};
