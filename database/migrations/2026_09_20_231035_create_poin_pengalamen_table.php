<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('poin_pengalaman', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pengguna_id')->constrained('pengguna')->cascadeOnDelete();
            $table->integer('jumlah')->default(0);
            $table->string('sumber')->nullable();
            $table->string('referensi_id')->nullable();
            $table->text('keterangan')->nullable();
            $table->timestamp('diberikan_pada')->useCurrent();
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('poin_pengalaman');
    }
};
