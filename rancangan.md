# MASTER PROMPT

# SMART LEARNING HUB

## Platform Pembelajaran Mandiri Semua Mata Pelajaran Berbasis AI

Anda adalah Senior Full-Stack Developer, Software Architect, UI/UX Designer, EdTech Specialist, Database Architect, AI Engineer, Security Engineer, dan Instructional Designer.

Bangun aplikasi bernama:

# SMART LEARNING HUB

### Tagline

**Belajar Mandiri. Pahami Materi. Kembangkan Potensi.**

Aplikasi merupakan platform pembelajaran mandiri untuk:

* SD
* SMP
* SMA
* SMK

dan dapat dikembangkan untuk jenjang lainnya.

Aplikasi mendukung seluruh mata pelajaran sekolah.

Aplikasi memiliki dua kecerdasan utama:

1. **AI Guru** untuk membantu murid belajar.
2. **AI Asisten Guru** untuk membantu guru membuat dan mengelola pembelajaran.

---

# ATURAN UTAMA BAHASA

## WAJIB

Seluruh komponen yang dibuat khusus untuk aplikasi harus menggunakan Bahasa Indonesia.

Gunakan Bahasa Indonesia untuk:

* Nama database.
* Nama tabel.
* Nama field.
* Nama model.
* Nama controller.
* Nama service.
* Nama repository.
* Nama request.
* Nama resource.
* Nama route.
* URL.
* Nama menu.
* Nama variabel.
* Nama fungsi/metode jika memungkinkan.
* Nama komponen Vue.
* Nama folder aplikasi.
* Komentar kode.
* Seeder.
* Data contoh.
* Pesan validasi.
* Pesan error.
* Notifikasi.
* Label form.
* Tombol.
* Dashboard.
* Dokumentasi.

Jangan menggunakan campuran Bahasa Indonesia dan Bahasa Inggris untuk nama fitur aplikasi tanpa alasan teknis.

---

# PENGECUALIAN

Nama berikut tetap mengikuti standar framework/library:

* Laravel
* Vue
* Inertia
* PHP
* MySQL
* Tailwind CSS
* Vite
* Pinia
* Composer
* npm
* Artisan
* JavaScript
* TypeScript
* HTML
* CSS

Syntax dan keyword bahasa pemrograman tetap menggunakan standar bahasa pemrogramannya.

Contoh:

```php
class MataPelajaranController extends Controller
{
}
```

Jangan mengubah keyword `class`, `extends`, `public`, `function`, `return`, dan sebagainya.

---

# 1. TEKNOLOGI

Gunakan:

* Laravel 12
* PHP 8.2+
* MySQL
* Vue 3
* Composition API
* Inertia.js
* Pinia
* Tailwind CSS
* Vite
* PWA
* Poppins
* Lucide Icons atau Tabler Icons

---

# 2. NAMA DATABASE

Gunakan:

```text
smart_learning_hub
```

Jangan menggunakan:

```text
smartlearninghub_db
learning_platform
school_learning
```

---

# 3. STRUKTUR DATABASE

Gunakan penamaan tabel Bahasa Indonesia dan konsisten.

Gunakan bentuk jamak untuk tabel.

Contoh:

```text
pengguna
peran
izin
sekolah
jenjang
kelas
mata_pelajaran
topik
kursus
modul
pelajaran
isi_pelajaran
tujuan_pembelajaran

pendaftaran_belajar
kemajuan_belajar
aktivitas_belajar
percobaan_kuis
jawaban_kuis

penguasaan_materi
rekomendasi_belajar

poin_pengalaman
lencana
lencana_pengguna
streak_belajar

refleksi

percakapan_ai
pesan_ai
penggunaan_ai

soal
pilihan_soal
bank_soal

tugas
pengumpulan_tugas
umpan_balik

sertifikat
notifikasi
log_aktivitas
```

---

# 4. ATURAN NAMA FIELD

Gunakan:

* lowercase
* snake_case
* Bahasa Indonesia
* konsisten

Contoh:

```text
id
nama
kode
deskripsi
status
aktif
urutan
tanggal_mulai
tanggal_selesai
dibuat_pada
diperbarui_pada
dihapus_pada
```

Untuk timestamp Laravel tetap boleh menggunakan:

```text
created_at
updated_at
deleted_at
```

jika diperlukan untuk kompatibilitas framework.

Namun jika menggunakan nama Bahasa Indonesia secara penuh, buat konfigurasi/model yang menangani:

```text
dibuat_pada
diperbarui_pada
dihapus_pada
```

Pastikan perubahan tersebut benar-benar kompatibel dengan Laravel.

---

# 5. TABEL PENGGUNA

Tabel:

```text
pengguna
```

Field minimal:

```text
id
nama_lengkap
nama_pengguna
email
kata_sandi
foto
nomor_induk
jenis_pengguna
status
terakhir_masuk_pada
dibuat_pada
diperbarui_pada
```

Jangan menyimpan password plaintext.

Field:

```text
kata_sandi
```

harus menyimpan password yang sudah di-hash.

---

# 6. TABEL SEKOLAH

```text
sekolah
```

Field:

```text
id
nama
kode_sekolah
npsn
alamat
desa
kecamatan
kabupaten
provinsi
email
telepon
logo
status
dibuat_pada
diperbarui_pada
```

---

# 7. TABEL JENJANG

```text
jenjang
```

Field:

```text
id
nama
kode
urutan
status
dibuat_pada
diperbarui_pada
```

Contoh data:

```text
SD
SMP
SMA
SMK
```

Jangan hardcode jenjang pada kode program.

---

# 8. TABEL KELAS

```text
kelas
```

Field:

```text
id
jenjang_id
nama
tingkat
jurusan
keterangan
status
dibuat_pada
diperbarui_pada
```

Contoh:

```text
IV
VIII
XI TKJ
XII AKL
```

---

# 9. TABEL MATA PELAJARAN

```text
mata_pelajaran
```

Field:

```text
id
jenjang_id
nama
kode
deskripsi
ikon
gambar
warna
status
dibuat_pada
diperbarui_pada
```

Contoh:

```text
Matematika
Bahasa Indonesia
Bahasa Inggris
IPA
IPS
Biologi
Fisika
Kimia
Informatika
KKA
TKJ
dan lainnya
```

Guru/admin harus dapat menambahkan mata pelajaran baru melalui dashboard.

---

# 10. TABEL TOPIK

```text
topik
```

Field:

```text
id
mata_pelajaran_id
nama
kode
deskripsi
urutan
status
dibuat_pada
diperbarui_pada
```

---

# 11. TABEL KURSUS

```text
kursus
```

Field:

```text
id
mata_pelajaran_id
jenjang_id
kelas_id
nama
slug
deskripsi
tingkat_kesulitan
durasi_menit
gambar
ikon
status
dipublikasikan_pada
dibuat_pada
diperbarui_pada
```

---

# 12. TABEL MODUL

```text
modul
```

Field:

```text
id
kursus_id
nama
slug
deskripsi
urutan
status
dibuat_pada
diperbarui_pada
```

---

# 13. TABEL PELAJARAN

```text
pelajaran
```

Field:

```text
id
modul_id
topik_id
nama
slug
deskripsi
tujuan_pembelajaran
durasi_menit
tingkat_kesulitan
urutan
status
dibuat_pada
diperbarui_pada
```

---

# 14. TABEL ISI PELAJARAN

```text
isi_pelajaran
```

Field:

```text
id
pelajaran_id
jenis_isi
judul
isi
data_tambahan
urutan
status
dibuat_pada
diperbarui_pada
```

Jenis isi:

```text
teks
gambar
video
audio
contoh
kode
tabel
rumus
kuis
latihan
kartu
mencocokkan
seret_dan_lepas
simulasi
refleksi
tugas
aktivitas_ai
```

---

# 15. TABEL TUJUAN PEMBELAJARAN

```text
tujuan_pembelajaran
```

Field:

```text
id
mata_pelajaran_id
nama
deskripsi
tingkat_kognitif
urutan
status
dibuat_pada
diperbarui_pada
```

---

# 16. TABEL PENDAFTARAN BELAJAR

```text
pendaftaran_belajar
```

Field:

```text
id
pengguna_id
kursus_id
dimulai_pada
terakhir_belajar_pada
selesai_pada
persentase_kemajuan
status
dibuat_pada
diperbarui_pada
```

---

# 17. TABEL KEMAJUAN BELAJAR

```text
kemajuan_belajar
```

Field:

```text
id
pengguna_id
pelajaran_id
status
persentase
waktu_belajar_detik
pertama_diakses_pada
terakhir_diakses_pada
selesai_pada
dibuat_pada
diperbarui_pada
```

Gunakan unique constraint:

```text
pengguna_id + pelajaran_id
```

agar tidak terjadi duplikasi progres.

---

# 18. TABEL SOAL

```text
soal
```

Field:

```text
id
mata_pelajaran_id
topik_id
pelajaran_id
pertanyaan
jenis_soal
tingkat_kesulitan
tingkat_kognitif
pembahasan
nilai
status
dibuat_oleh
dibuat_pada
diperbarui_pada
```

---

# 19. TABEL PILIHAN SOAL

```text
pilihan_soal
```

Field:

```text
id
soal_id
teks_pilihan
kode_pilihan
benar
urutan
dibuat_pada
diperbarui_pada
```

---

# 20. TABEL PERCOBAAN KUIS

```text
percobaan_kuis
```

Field:

```text
id
pengguna_id
pelajaran_id
jumlah_soal
jumlah_benar
nilai
dimulai_pada
selesai_pada
durasi_detik
status
dibuat_pada
diperbarui_pada
```

---

# 21. TABEL JAWABAN KUIS

```text
jawaban_kuis
```

Field:

```text
id
percobaan_kuis_id
soal_id
pilihan_soal_id
jawaban_teks
benar
nilai
dijawab_pada
```

---

# 22. TABEL PENGUASAAN MATERI

```text
penguasaan_materi
```

Field:

```text
id
pengguna_id
topik_id
tingkat_penguasaan
skor_penguasaan
jumlah_latihan
jumlah_benar
jumlah_salah
terakhir_diperbarui_pada
dibuat_pada
diperbarui_pada
```

Status:

```text
belum_mulai
sedang_belajar
perlu_penguatan
mulai_menguasai
menguasai
```

---

# 23. TABEL REKOMENDASI BELAJAR

```text
rekomendasi_belajar
```

Field:

```text
id
pengguna_id
pelajaran_id
alasan
prioritas
sumber_rekomendasi
status
dibuat_pada
diperbarui_pada
```

---

# 24. GAMIFIKASI

## Poin pengalaman

Tabel:

```text
poin_pengalaman
```

Field:

```text
id
pengguna_id
jumlah
sumber
referensi_id
keterangan
diberikan_pada
```

## Lencana

```text
lencana
```

Field:

```text
id
nama
slug
deskripsi
ikon
syarat
status
```

## Lencana pengguna

```text
lencana_pengguna
```

Field:

```text
id
pengguna_id
lencana_id
diperoleh_pada
```

---

# 25. AI MURID

## Percakapan AI

Tabel:

```text
percakapan_ai
```

Field:

```text
id
pengguna_id
pelajaran_id
topik_id
judul
jenis_ai
dimulai_pada
terakhir_aktif_pada
```

## Pesan AI

```text
pesan_ai
```

Field:

```text
id
percakapan_ai_id
pengirim
pesan
model_ai
jumlah_token
dibuat_pada
```

Jenis AI:

```text
penjelasan
contoh
petunjuk
kuis
ringkasan
analogi
tanya_jawab
socratic
```

---

# 26. AI GURU

Buat fitur:

```text
AI Asisten Guru
```

Kemampuan:

* Membuat materi.
* Membuat tujuan pembelajaran.
* Membuat soal.
* Membuat kuis.
* Membuat LKPD.
* Membuat rangkuman.
* Membuat variasi soal.
* Menganalisis hasil belajar.
* Membuat rekomendasi remedial.
* Membantu membuat aktivitas.

AI hanya menghasilkan DRAFT.

Guru harus dapat:

```text
Tinjau
Edit
Simpan
Publikasikan
```

AI tidak boleh otomatis mempublikasikan konten.

---

# 27. TABEL PENGGUNAAN AI

```text
penggunaan_ai
```

Field:

```text
id
pengguna_id
jenis_fitur
penyedia_ai
model_ai
jumlah_token_masuk
jumlah_token_keluar
perkiraan_biaya
waktu_proses_ms
status
dibuat_pada
```

---

# 28. CONTROLLER

Gunakan Bahasa Indonesia.

Contoh:

```text
BerandaController
MataPelajaranController
KursusController
ModulController
PelajaranController
IsiPelajaranController
KuisController
SoalController
KemajuanBelajarController
PenguasaanMateriController
RekomendasiBelajarController
LencanaController
PoinPengalamanController
RefleksiController
PercakapanAiController
AsistenAiController
AsistenGuruController
LaporanBelajarController
SertifikatController
PenggunaController
SekolahController
JenjangController
KelasController
```

Jangan menggunakan:

```text
CourseController
LessonController
QuizController
StudentController
```

kecuali memang diperlukan oleh package pihak ketiga.

---

# 29. SERVICE

Gunakan:

```text
KemajuanBelajarService
PenguasaanMateriService
PenilaianKuisService
RekomendasiBelajarService
PoinPengalamanService
LencanaService
StreakBelajarService
AiTutorService
AiAsistenGuruService
PembuatanMateriAiService
PembuatanSoalAiService
AnalisisBelajarAiService
```

---

# 30. MODEL

Gunakan:

```text
Pengguna
Sekolah
Jenjang
Kelas
MataPelajaran
Topik
Kursus
Modul
Pelajaran
IsiPelajaran
TujuanPembelajaran
PendaftaranBelajar
KemajuanBelajar
Soal
PilihanSoal
PercobaanKuis
JawabanKuis
PenguasaanMateri
RekomendasiBelajar
PoinPengalaman
Lencana
LencanaPengguna
PercakapanAi
PesanAi
PenggunaanAi
Refleksi
Tugas
PengumpulanTugas
UmpanBalik
Sertifikat
Notifikasi
LogAktivitas
```

---

# 31. ROUTE / URL

URL juga menggunakan Bahasa Indonesia.

Gunakan:

```text
/
```

```text
/masuk
/daftar
/keluar
```

Dashboard:

```text
/dashboard
/belajar
/mata-pelajaran
/kursus
/progres
/pencapaian
/profil
```

Mata pelajaran:

```text
/mata-pelajaran
/mata-pelajaran/{slug}
```

Kursus:

```text
/kursus
/kursus/{slug}
/kursus/{slug}/belajar
```

Modul:

```text
/kursus/{kursus}/modul/{modul}
```

Pelajaran:

```text
/pelajaran/{pelajaran}
/pelajaran/{pelajaran}/mulai
/pelajaran/{pelajaran}/selesai
```

Kuis:

```text
/kuis/{kuis}
/kuis/{kuis}/mulai
/kuis/{kuis}/jawab
/kuis/{kuis}/selesai
```

AI murid:

```text
/ai-guru
/ai-guru/percakapan
/ai-guru/percakapan/{percakapan}
```

Guru:

```text
/guru
/guru/materi
/guru/soal
/guru/kuis
/guru/laporan
/guru/ai
```

Admin:

```text
/admin
/admin/pengguna
/admin/sekolah
/admin/jenjang
/admin/kelas
/admin/mata-pelajaran
/admin/topik
/admin/kursus
/admin/modul
/admin/pelajaran
/admin/soal
/admin/lencana
/admin/pengaturan
/admin/log-aktivitas
```

Gunakan route name Bahasa Indonesia:

```text
dashboard
mata-pelajaran.index
mata-pelajaran.tampil
kursus.index
kursus.tampil
pelajaran.tampil
kuis.mulai
kuis.selesai
ai-guru.index
```

---

# 32. MENU APLIKASI

## Murid

```text
Beranda
Belajar
Mata Pelajaran
Rekomendasi
AI Guru
Progress Belajar
Pencapaian
Profil
```

## Guru

```text
Beranda
Materi Saya
Mata Pelajaran
Bank Soal
Tugas
AI Asisten Guru
Analisis Pembelajaran
Profil
```

## Admin

```text
Dashboard
Pengguna
Sekolah
Jenjang
Kelas
Mata Pelajaran
Topik
Kursus
Modul
Pelajaran
Bank Soal
Lencana
Laporan
Pengaturan
Log Aktivitas
```

---

# 33. KOMPONEN VUE

Gunakan Bahasa Indonesia.

Contoh:

```text
TombolUtama.vue
KartuMataPelajaran.vue
KartuKursus.vue
KemajuanBelajar.vue
NavigasiBelajar.vue
KartuPelajaran.vue
KartuPencapaian.vue
KartuRekomendasi.vue
JendelaAiGuru.vue
PesanAi.vue
PembuatKuis.vue
PembuatMateri.vue
TabelSoal.vue
ModalKonfirmasi.vue
Notifikasi.vue
PemuatData.vue
```

Jangan:

```text
SubjectCard.vue
CourseCard.vue
LessonCard.vue
```

---

# 34. VARIABEL DAN FUNGSI

Gunakan Bahasa Indonesia jika tidak bertentangan dengan konvensi framework.

Contoh:

```javascript
const mataPelajaran = ref([])
const kursusAktif = ref(null)
const persentaseKemajuan = ref(0)
const sedangMemuat = ref(false)

function mulaiBelajar() {
}

function tandaiSelesai() {
}

function kirimJawaban() {
}

function tanyaAi() {
}
```

---

# 35. PESAN VALIDASI

Gunakan Bahasa Indonesia.

Contoh:

```text
Nama wajib diisi.
Email tidak valid.
Kata sandi minimal 8 karakter.
Mata pelajaran wajib dipilih.
Judul pelajaran wajib diisi.
Soal wajib memiliki jawaban.
```

---

# 36. NOTIFIKASI

Contoh:

```text
Materi berhasil disimpan.
Pelajaran berhasil diselesaikan.
Jawaban berhasil dikirim.
Kursus berhasil ditambahkan.
Materi berhasil dipublikasikan.
Lencana baru diperoleh.
```

---

# 37. DASHBOARD MURID

Gunakan istilah:

```text
Selamat datang kembali!

Lanjutkan Belajar

Mata Pelajaran Saya

Rekomendasi Untukmu

Kemajuan Belajar

Pencapaian

Streak Belajar

Tanya AI Guru
```

---

# 38. DASHBOARD AI GURU

Judul:

```text
AI Asisten Guru
```

Menu:

```text
Buat Materi
Buat Soal
Buat Kuis
Buat LKPD
Buat Rangkuman
Analisis Hasil Belajar
Buat Remedial
Buat Variasi Soal
```

---

# 39. AI TUTOR MURID

Tampilan:

```text
AI Guru

Apa yang ingin kamu pahami?

[ Jelaskan ]
[ Berikan Contoh ]
[ Berikan Petunjuk ]
[ Uji Saya ]
[ Ringkas Materi ]
```

AI harus mengetahui konteks:

```text
Jenjang
Kelas
Mata Pelajaran
Topik
Pelajaran
Tujuan Pembelajaran
```

---

# 40. PEMBELAJARAN MANDIRI

Tidak perlu sistem kelas sebagai mekanisme utama.

Murid dapat:

```text
Memilih Mata Pelajaran
↓
Memilih Topik
↓
Memilih Pelajaran
↓
Belajar
↓
Latihan
↓
Kuis
↓
Feedback
↓
Refleksi
↓
Penguasaan
↓
Rekomendasi
```

Guru berfungsi terutama sebagai:

* Pengembang konten.
* Pembimbing.
* Pemberi feedback.
* Pemantau perkembangan.

---

# 41. SISTEM REKOMENDASI

Sistem harus dapat memberikan:

```text
Belajar Lagi
Materi Berikutnya
Materi Penguatan
Latihan Tambahan
Tantangan
```

Contoh:

> Kamu masih perlu memperkuat materi "Operasi Pecahan".

> Coba pelajari kembali materi berikut.

Jangan menggunakan label yang merendahkan murid.

---

# 42. GAMIFIKASI

Gunakan:

```text
Poin
Level
Lencana
Pencapaian
Streak
Progress
```

Hindari leaderboard sebagai fitur utama.

Fokus pada perkembangan diri murid.

---

# 43. STRUKTUR FOLDER

Gunakan struktur yang mudah dipahami.

Contoh:

```text
app/
├── Http/
│   ├── Controllers/
│   │   ├── BerandaController.php
│   │   ├── MataPelajaranController.php
│   │   ├── KursusController.php
│   │   ├── PelajaranController.php
│   │   ├── KuisController.php
│   │   ├── AiGuruController.php
│   │   └── Admin/
│   │
│   └── Requests/
│       ├── SimpanMataPelajaranRequest.php
│       ├── SimpanKursusRequest.php
│       └── SimpanPelajaranRequest.php
│
├── Models/
│   ├── Pengguna.php
│   ├── MataPelajaran.php
│   ├── Kursus.php
│   ├── Modul.php
│   └── Pelajaran.php
│
└── Services/
    ├── KemajuanBelajarService.php
    ├── PenguasaanMateriService.php
    ├── AiTutorService.php
    └── AiAsistenGuruService.php
```

---

# 44. ROUTE FILE

Gunakan pemisahan route agar mudah dirawat.

Contoh:

```text
routes/
├── web.php
├── autentikasi.php
├── belajar.php
├── ai.php
├── guru.php
└── admin.php
```

Semua route harus menggunakan middleware dan authorization yang sesuai.

---

# 45. AI PROVIDER

Buat abstraction:

```text
AiPenyediaInterface
```

Implementasi:

```text
AiGeminiService
AiOpenAiService
AiAnthropicService
```

Namun seluruh kode aplikasi menggunakan:

```text
AiManager
```

sehingga provider dapat diganti.

API key hanya berada di server.

---

# 46. PERINTAH ARTISAN

Perintah Laravel tetap menggunakan Artisan.

Contoh:

```bash
php artisan migrate
php artisan db:seed
php artisan serve
```

Nama migration/table tetap menggunakan Bahasa Indonesia.

Contoh:

```bash
php artisan make:model MataPelajaran -m
php artisan make:controller MataPelajaranController
php artisan make:request SimpanMataPelajaranRequest
```

---

# 47. DOKUMENTASI

Buat:

```text
README.md
DOKUMENTASI_INSTALASI.md
DOKUMENTASI_DATABASE.md
DOKUMENTASI_AI.md
DOKUMENTASI_PENGGUNA.md
```

Isi dokumentasi menggunakan Bahasa Indonesia.

---

# 48. KOMENTAR KODE

Komentar kode menggunakan Bahasa Indonesia.

Contoh:

```php
// Mengambil mata pelajaran aktif yang tersedia
// untuk jenjang yang dipilih oleh murid.
```

Jangan membuat komentar terlalu banyak.

Komentar hanya digunakan ketika membantu pemeliharaan kode.

---

# 49. ATURAN KONSISTENSI

WAJIB menggunakan istilah:

```text
Murid
Guru
Mata Pelajaran
Pelajaran
Modul
Topik
Kursus
Kemajuan Belajar
Penguasaan Materi
AI Guru
AI Asisten Guru
Pencapaian
Poin Pengalaman
```

Jangan berganti-ganti menjadi:

```text
Siswa
Student
Course
Lesson
Progress
Mastery
Teacher
```

di bagian aplikasi yang dibuat sendiri.

---

# 50. IMPLEMENTASI

Bangun secara bertahap.

## Tahap 1

Fondasi:

* Laravel
* Vue
* Inertia
* Tailwind
* Database
* Authentication
* Role

## Tahap 2

Struktur akademik:

* Sekolah
* Jenjang
* Kelas
* Mata Pelajaran
* Topik

## Tahap 3

Learning Engine:

* Kursus
* Modul
* Pelajaran
* Isi Pelajaran
* Kemajuan Belajar

## Tahap 4

Assessment Engine:

* Soal
* Bank Soal
* Kuis
* Penilaian
* Feedback

## Tahap 5

Gamifikasi:

* Poin
* Lencana
* Pencapaian
* Streak

## Tahap 6

AI Murid:

* AI Guru
* Konteks pembelajaran
* Hint
* Penjelasan
* Contoh
* Quiz
* Refleksi

## Tahap 7

AI Guru:

* Generator materi
* Generator soal
* Generator kuis
* Generator LKPD
* Analisis hasil belajar

## Tahap 8

Personalized Learning:

* Penguasaan materi
* Rekomendasi
* Jalur belajar
* Rencana belajar

## Tahap 9

PWA:

* Install
* Offline
* Sinkronisasi

## Tahap 10

Production:

* Security
* Performance
* Testing
* Logging
* Backup
* Monitoring

---

# 51. ATURAN TERAKHIR

Sebelum menulis kode:

1. Analisis proyek.
2. Periksa struktur yang sudah ada.
3. Jangan menghapus fitur yang sudah berfungsi.
4. Buat rancangan database.
5. Buat relasi.
6. Buat migration.
7. Buat model.
8. Buat controller.
9. Buat service.
10. Buat route.
11. Buat halaman Vue.
12. Buat testing.

Setiap fitur harus benar-benar terhubung:

```text
Database
↓
Model
↓
Service
↓
Controller
↓
Route
↓
Inertia
↓
Vue
↓
Database
```

Jangan membuat tombol atau halaman palsu.

Jangan menggunakan data hardcode untuk fitur yang seharusnya berasal dari database.

Jangan mengklaim fitur selesai jika belum diuji.

Setelah setiap tahap selesai, tampilkan:

```text
STATUS
✓ Selesai
⚠ Perlu perhatian
✗ Belum selesai

FILE YANG DIBUAT

DATABASE YANG BERUBAH

FITUR YANG SELESAI

HASIL TEST

ERROR YANG DITEMUKAN

LANGKAH BERIKUTNYA
```

Mulai implementasi dari:

**TAHAP 1 — Analisis arsitektur + ERD database + struktur folder + rancangan route.**

Jangan langsung membuat seluruh aplikasi sekaligus.
