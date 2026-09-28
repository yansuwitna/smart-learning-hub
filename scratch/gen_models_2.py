import os
import glob
import subprocess
import time

models_spec = {
    "Soal": {
        "table": "soal",
        "fields": [
            "$table->id();",
            "$table->foreignId('mata_pelajaran_id')->constrained('mata_pelajaran')->cascadeOnDelete();",
            "$table->foreignId('topik_id')->nullable()->constrained('topik')->cascadeOnDelete();",
            "$table->foreignId('pelajaran_id')->nullable()->constrained('pelajaran')->cascadeOnDelete();",
            "$table->text('pertanyaan');",
            "$table->string('jenis_soal');",
            "$table->string('tingkat_kesulitan')->nullable();",
            "$table->string('tingkat_kognitif')->nullable();",
            "$table->text('pembahasan')->nullable();",
            "$table->integer('nilai')->default(10);",
            "$table->string('status')->default('aktif');",
            "$table->foreignId('dibuat_oleh')->nullable()->constrained('pengguna')->nullOnDelete();",
            "$table->timestamps();"
        ]
    },
    "PilihanSoal": {
        "table": "pilihan_soal",
        "fields": [
            "$table->id();",
            "$table->foreignId('soal_id')->constrained('soal')->cascadeOnDelete();",
            "$table->text('teks_pilihan');",
            "$table->string('kode_pilihan')->nullable();",
            "$table->boolean('benar')->default(false);",
            "$table->integer('urutan')->default(0);",
            "$table->timestamps();"
        ]
    },
    "PercobaanKuis": {
        "table": "percobaan_kuis",
        "fields": [
            "$table->id();",
            "$table->foreignId('pengguna_id')->constrained('pengguna')->cascadeOnDelete();",
            "$table->foreignId('pelajaran_id')->constrained('pelajaran')->cascadeOnDelete();",
            "$table->integer('jumlah_soal')->default(0);",
            "$table->integer('jumlah_benar')->default(0);",
            "$table->integer('nilai')->default(0);",
            "$table->timestamp('dimulai_pada')->nullable();",
            "$table->timestamp('selesai_pada')->nullable();",
            "$table->integer('durasi_detik')->default(0);",
            "$table->string('status')->default('berjalan');",
            "$table->timestamps();"
        ]
    },
    "JawabanKuis": {
        "table": "jawaban_kuis",
        "fields": [
            "$table->id();",
            "$table->foreignId('percobaan_kuis_id')->constrained('percobaan_kuis')->cascadeOnDelete();",
            "$table->foreignId('soal_id')->constrained('soal')->cascadeOnDelete();",
            "$table->foreignId('pilihan_soal_id')->nullable()->constrained('pilihan_soal')->cascadeOnDelete();",
            "$table->text('jawaban_teks')->nullable();",
            "$table->boolean('benar')->default(false);",
            "$table->integer('nilai')->default(0);",
            "$table->timestamp('dijawab_pada')->useCurrent();",
            "$table->timestamps();"
        ]
    },
    "PenguasaanMateri": {
        "table": "penguasaan_materi",
        "fields": [
            "$table->id();",
            "$table->foreignId('pengguna_id')->constrained('pengguna')->cascadeOnDelete();",
            "$table->foreignId('topik_id')->constrained('topik')->cascadeOnDelete();",
            "$table->string('tingkat_penguasaan')->default('belum_mulai');",
            "$table->integer('skor_penguasaan')->default(0);",
            "$table->integer('jumlah_latihan')->default(0);",
            "$table->integer('jumlah_benar')->default(0);",
            "$table->integer('jumlah_salah')->default(0);",
            "$table->timestamp('terakhir_diperbarui_pada')->nullable();",
            "$table->timestamps();"
        ]
    },
    "RekomendasiBelajar": {
        "table": "rekomendasi_belajar",
        "fields": [
            "$table->id();",
            "$table->foreignId('pengguna_id')->constrained('pengguna')->cascadeOnDelete();",
            "$table->foreignId('pelajaran_id')->constrained('pelajaran')->cascadeOnDelete();",
            "$table->text('alasan')->nullable();",
            "$table->integer('prioritas')->default(0);",
            "$table->string('sumber_rekomendasi')->nullable();",
            "$table->string('status')->default('aktif');",
            "$table->timestamps();"
        ]
    },
    "PoinPengalaman": {
        "table": "poin_pengalaman",
        "fields": [
            "$table->id();",
            "$table->foreignId('pengguna_id')->constrained('pengguna')->cascadeOnDelete();",
            "$table->integer('jumlah')->default(0);",
            "$table->string('sumber')->nullable();",
            "$table->string('referensi_id')->nullable();",
            "$table->text('keterangan')->nullable();",
            "$table->timestamp('diberikan_pada')->useCurrent();",
            "$table->timestamps();"
        ]
    },
    "Lencana": {
        "table": "lencana",
        "fields": [
            "$table->id();",
            "$table->string('nama');",
            "$table->string('slug')->unique();",
            "$table->text('deskripsi')->nullable();",
            "$table->string('ikon')->nullable();",
            "$table->text('syarat')->nullable();",
            "$table->string('status')->default('aktif');",
            "$table->timestamps();"
        ]
    },
    "LencanaPengguna": {
        "table": "lencana_pengguna",
        "fields": [
            "$table->id();",
            "$table->foreignId('pengguna_id')->constrained('pengguna')->cascadeOnDelete();",
            "$table->foreignId('lencana_id')->constrained('lencana')->cascadeOnDelete();",
            "$table->timestamp('diperoleh_pada')->useCurrent();",
            "$table->timestamps();"
        ]
    },
    "PercakapanAi": {
        "table": "percakapan_ai",
        "fields": [
            "$table->id();",
            "$table->foreignId('pengguna_id')->constrained('pengguna')->cascadeOnDelete();",
            "$table->foreignId('pelajaran_id')->nullable()->constrained('pelajaran')->cascadeOnDelete();",
            "$table->foreignId('topik_id')->nullable()->constrained('topik')->cascadeOnDelete();",
            "$table->string('judul')->nullable();",
            "$table->string('jenis_ai')->nullable();",
            "$table->timestamp('dimulai_pada')->useCurrent();",
            "$table->timestamp('terakhir_aktif_pada')->nullable();",
            "$table->timestamps();"
        ]
    },
    "PesanAi": {
        "table": "pesan_ai",
        "fields": [
            "$table->id();",
            "$table->foreignId('percakapan_ai_id')->constrained('percakapan_ai')->cascadeOnDelete();",
            "$table->string('pengirim');",
            "$table->longText('pesan');",
            "$table->string('model_ai')->nullable();",
            "$table->integer('jumlah_token')->nullable();",
            "$table->timestamps();"
        ]
    },
    "PenggunaanAi": {
        "table": "penggunaan_ai",
        "fields": [
            "$table->id();",
            "$table->foreignId('pengguna_id')->constrained('pengguna')->cascadeOnDelete();",
            "$table->string('jenis_fitur')->nullable();",
            "$table->string('penyedia_ai')->nullable();",
            "$table->string('model_ai')->nullable();",
            "$table->integer('jumlah_token_masuk')->nullable();",
            "$table->integer('jumlah_token_keluar')->nullable();",
            "$table->decimal('perkiraan_biaya', 10, 4)->nullable();",
            "$table->integer('waktu_proses_ms')->nullable();",
            "$table->string('status')->default('berhasil');",
            "$table->timestamps();"
        ]
    }
}

migration_template = """<?php
use Illuminate\\Database\\Migrations\\Migration;
use Illuminate\\Database\\Schema\\Blueprint;
use Illuminate\\Support\\Facades\\Schema;

return new class extends Migration {{
    public function up(): void {{
        Schema::create('{table}', function (Blueprint $table) {{
            {fields}
        }});
    }}
    public function down(): void {{
        Schema::dropIfExists('{table}');
    }}
}};
"""

model_template = """<?php
namespace App\\Models;
use Illuminate\\Database\\Eloquent\\Factories\\HasFactory;
use Illuminate\\Database\\Eloquent\\Model;

class {model} extends Model {{
    use HasFactory;
    protected $table = '{table}';
    protected $guarded = ['id'];
}}
"""

for model_name, spec in models_spec.items():
    print(f"Creating {model_name}...")
    subprocess.run(["php", "artisan", "make:model", model_name, "-m"], check=True)
    time.sleep(1)
    
    migrations = sorted(glob.glob('database/migrations/*.php'), key=os.path.getmtime)
    latest_migration = migrations[-1]
    
    fields_str = "\n            ".join(spec['fields'])
    mig_content = migration_template.format(table=spec['table'], fields=fields_str)
    
    with open(latest_migration, 'w') as f:
        f.write(mig_content)
        
    mod_content = model_template.format(model=model_name, table=spec['table'])
    with open(f"app/Models/{model_name}.php", 'w') as f:
        f.write(mod_content)

print("Batch 2 completed!")
