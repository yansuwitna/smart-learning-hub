<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('percakapan_ai', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pengguna_id')->constrained('pengguna')->cascadeOnDelete();
            $table->foreignId('pelajaran_id')->nullable()->constrained('pelajaran')->cascadeOnDelete();
            $table->foreignId('topik_id')->nullable()->constrained('topik')->cascadeOnDelete();
            $table->string('judul')->nullable();
            $table->string('jenis_ai')->nullable();
            $table->timestamp('dimulai_pada')->useCurrent();
            $table->timestamp('terakhir_aktif_pada')->nullable();
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('percakapan_ai');
    }
};
