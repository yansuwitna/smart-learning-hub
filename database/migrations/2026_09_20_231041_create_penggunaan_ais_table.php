<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('penggunaan_ai', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pengguna_id')->constrained('pengguna')->cascadeOnDelete();
            $table->string('jenis_fitur')->nullable();
            $table->string('penyedia_ai')->nullable();
            $table->string('model_ai')->nullable();
            $table->integer('jumlah_token_masuk')->nullable();
            $table->integer('jumlah_token_keluar')->nullable();
            $table->decimal('perkiraan_biaya', 10, 4)->nullable();
            $table->integer('waktu_proses_ms')->nullable();
            $table->string('status')->default('berhasil');
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('penggunaan_ai');
    }
};
