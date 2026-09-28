<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('sekolah', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('kode_sekolah')->unique();
            $table->string('npsn')->nullable();
            $table->text('alamat')->nullable();
            $table->string('desa')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('kabupaten')->nullable();
            $table->string('provinsi')->nullable();
            $table->string('email')->nullable();
            $table->string('telepon')->nullable();
            $table->string('logo')->nullable();
            $table->string('status')->default('aktif');
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('sekolah');
    }
};
