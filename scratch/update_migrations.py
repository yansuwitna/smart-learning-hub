import os
import glob

migrations_sekolah = glob.glob('database/migrations/*_create_sekolahs_table.php')[0]
migrations_jenjang = glob.glob('database/migrations/*_create_jenjangs_table.php')[0]
migrations_kelas = glob.glob('database/migrations/*_create_kelas_table.php')[0]

content_sekolah = """<?php
use Illuminate\\Database\\Migrations\\Migration;
use Illuminate\\Database\\Schema\\Blueprint;
use Illuminate\\Support\\Facades\\Schema;

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
"""

content_jenjang = """<?php
use Illuminate\\Database\\Migrations\\Migration;
use Illuminate\\Database\\Schema\\Blueprint;
use Illuminate\\Support\\Facades\\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('jenjang', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('kode')->unique();
            $table->integer('urutan')->default(0);
            $table->string('status')->default('aktif');
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('jenjang');
    }
};
"""

content_kelas = """<?php
use Illuminate\\Database\\Migrations\\Migration;
use Illuminate\\Database\\Schema\\Blueprint;
use Illuminate\\Support\\Facades\\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('kelas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jenjang_id')->constrained('jenjang')->cascadeOnDelete();
            $table->string('nama');
            $table->string('tingkat');
            $table->string('jurusan')->nullable();
            $table->text('keterangan')->nullable();
            $table->string('status')->default('aktif');
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('kelas');
    }
};
"""

with open(migrations_sekolah, 'w') as f: f.write(content_sekolah)
with open(migrations_jenjang, 'w') as f: f.write(content_jenjang)
with open(migrations_kelas, 'w') as f: f.write(content_kelas)
