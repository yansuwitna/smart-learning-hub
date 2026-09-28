import os
import glob
import subprocess

models_spec = {
    "MataPelajaran": {
        "table": "mata_pelajaran",
        "fields": [
            "$table->id();",
            "$table->foreignId('jenjang_id')->constrained('jenjang')->cascadeOnDelete();",
            "$table->string('nama');",
            "$table->string('kode')->unique();",
            "$table->text('deskripsi')->nullable();",
            "$table->string('ikon')->nullable();",
            "$table->string('gambar')->nullable();",
            "$table->string('warna')->nullable();",
            "$table->string('status')->default('aktif');",
            "$table->timestamps();"
        ]
    },
    "Topik": {
        "table": "topik",
        "fields": [
            "$table->id();",
            "$table->foreignId('mata_pelajaran_id')->constrained('mata_pelajaran')->cascadeOnDelete();",
            "$table->string('nama');",
            "$table->string('kode')->unique();",
            "$table->text('deskripsi')->nullable();",
            "$table->integer('urutan')->default(0);",
            "$table->string('status')->default('aktif');",
            "$table->timestamps();"
        ]
    },
    "Kursus": {
        "table": "kursus",
        "fields": [
            "$table->id();",
            "$table->foreignId('mata_pelajaran_id')->constrained('mata_pelajaran')->cascadeOnDelete();",
            "$table->foreignId('jenjang_id')->constrained('jenjang')->cascadeOnDelete();",
            "$table->foreignId('kelas_id')->nullable()->constrained('kelas')->nullOnDelete();",
            "$table->string('nama');",
            "$table->string('slug')->unique();",
            "$table->text('deskripsi')->nullable();",
            "$table->string('tingkat_kesulitan')->nullable();",
            "$table->integer('durasi_menit')->nullable();",
            "$table->string('gambar')->nullable();",
            "$table->string('ikon')->nullable();",
            "$table->string('status')->default('draft');",
            "$table->timestamp('dipublikasikan_pada')->nullable();",
            "$table->timestamps();"
        ]
    },
    "Modul": {
        "table": "modul",
        "fields": [
            "$table->id();",
            "$table->foreignId('kursus_id')->constrained('kursus')->cascadeOnDelete();",
            "$table->string('nama');",
            "$table->string('slug')->unique();",
            "$table->text('deskripsi')->nullable();",
            "$table->integer('urutan')->default(0);",
            "$table->string('status')->default('draft');",
            "$table->timestamps();"
        ]
    },
    "Pelajaran": {
        "table": "pelajaran",
        "fields": [
            "$table->id();",
            "$table->foreignId('modul_id')->constrained('modul')->cascadeOnDelete();",
            "$table->foreignId('topik_id')->nullable()->constrained('topik')->nullOnDelete();",
            "$table->string('nama');",
            "$table->string('slug')->unique();",
            "$table->text('deskripsi')->nullable();",
            "$table->text('tujuan_pembelajaran')->nullable();",
            "$table->integer('durasi_menit')->nullable();",
            "$table->string('tingkat_kesulitan')->nullable();",
            "$table->integer('urutan')->default(0);",
            "$table->string('status')->default('draft');",
            "$table->timestamps();"
        ]
    },
    "IsiPelajaran": {
        "table": "isi_pelajaran",
        "fields": [
            "$table->id();",
            "$table->foreignId('pelajaran_id')->constrained('pelajaran')->cascadeOnDelete();",
            "$table->string('jenis_isi');",
            "$table->string('judul')->nullable();",
            "$table->longText('isi')->nullable();",
            "$table->json('data_tambahan')->nullable();",
            "$table->integer('urutan')->default(0);",
            "$table->string('status')->default('aktif');",
            "$table->timestamps();"
        ]
    },
    "TujuanPembelajaran": {
        "table": "tujuan_pembelajaran",
        "fields": [
            "$table->id();",
            "$table->foreignId('mata_pelajaran_id')->constrained('mata_pelajaran')->cascadeOnDelete();",
            "$table->string('nama');",
            "$table->text('deskripsi')->nullable();",
            "$table->string('tingkat_kognitif')->nullable();",
            "$table->integer('urutan')->default(0);",
            "$table->string('status')->default('aktif');",
            "$table->timestamps();"
        ]
    },
    "PendaftaranBelajar": {
        "table": "pendaftaran_belajar",
        "fields": [
            "$table->id();",
            "$table->foreignId('pengguna_id')->constrained('pengguna')->cascadeOnDelete();",
            "$table->foreignId('kursus_id')->constrained('kursus')->cascadeOnDelete();",
            "$table->timestamp('dimulai_pada')->nullable();",
            "$table->timestamp('terakhir_belajar_pada')->nullable();",
            "$table->timestamp('selesai_pada')->nullable();",
            "$table->integer('persentase_kemajuan')->default(0);",
            "$table->string('status')->default('aktif');",
            "$table->timestamps();"
        ]
    },
    "KemajuanBelajar": {
        "table": "kemajuan_belajar",
        "fields": [
            "$table->id();",
            "$table->foreignId('pengguna_id')->constrained('pengguna')->cascadeOnDelete();",
            "$table->foreignId('pelajaran_id')->constrained('pelajaran')->cascadeOnDelete();",
            "$table->string('status')->default('belum_mulai');",
            "$table->integer('persentase')->default(0);",
            "$table->integer('waktu_belajar_detik')->default(0);",
            "$table->timestamp('pertama_diakses_pada')->nullable();",
            "$table->timestamp('terakhir_diakses_pada')->nullable();",
            "$table->timestamp('selesai_pada')->nullable();",
            "$table->timestamps();",
            "$table->unique(['pengguna_id', 'pelajaran_id']);"
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
    
    # Find migration
    search_pattern = f"database/migrations/*_create_{spec['table']}_table.php"
    if model_name.endswith('s'): # artisan sometimes pluralizes weirdly, we just find by the latest migration or use a generic glob
        pass
    
    # Actually, artisan make:model Pluralizes the table in the migration filename (e.g. MataPelajaran -> mata_pelajarans)
    # Let's just find the newest migration file that contains the model name conceptually, or just the newest migration file overall.
    import time
    time.sleep(1) # ensure timestamp difference if necessary, though artisan creates them in order
    
    migrations = sorted(glob.glob('database/migrations/*.php'), key=os.path.getmtime)
    latest_migration = migrations[-1]
    
    fields_str = "\n            ".join(spec['fields'])
    mig_content = migration_template.format(table=spec['table'], fields=fields_str)
    
    with open(latest_migration, 'w') as f:
        f.write(mig_content)
        
    mod_content = model_template.format(model=model_name, table=spec['table'])
    with open(f"app/Models/{model_name}.php", 'w') as f:
        f.write(mod_content)

print("Batch 1 completed!")
