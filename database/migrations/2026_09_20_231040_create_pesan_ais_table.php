<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('pesan_ai', function (Blueprint $table) {
            $table->id();
            $table->foreignId('percakapan_ai_id')->constrained('percakapan_ai')->cascadeOnDelete();
            $table->string('pengirim');
            $table->longText('pesan');
            $table->string('model_ai')->nullable();
            $table->integer('jumlah_token')->nullable();
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('pesan_ai');
    }
};
