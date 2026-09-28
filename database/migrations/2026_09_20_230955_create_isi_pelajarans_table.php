<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('isi_pelajaran', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pelajaran_id')->constrained('pelajaran')->cascadeOnDelete();
            $table->string('jenis_isi');
            $table->string('judul')->nullable();
            $table->longText('isi')->nullable();
            $table->json('data_tambahan')->nullable();
            $table->integer('urutan')->default(0);
            $table->string('status')->default('aktif');
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('isi_pelajaran');
    }
};
