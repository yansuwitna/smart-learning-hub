<?php

namespace Database\Seeders;

use App\Models\Pengguna;
use App\Models\Jenjang;
use App\Models\MataPelajaran;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Pengguna Admin
        Pengguna::create([
            'nama_lengkap' => 'Admin Utama',
            'nama_pengguna' => 'admin',
            'email' => 'admin@lms.com',
            'kata_sandi' => Hash::make('password'),
            'jenis_pengguna' => 'admin',
            'status' => 'aktif',
        ]);

        // 2. Pengguna Guru
        Pengguna::create([
            'nama_lengkap' => 'Budi Santoso',
            'nama_pengguna' => 'budiguru',
            'email' => 'budi@example.com',
            'kata_sandi' => Hash::make('password'),
            'jenis_pengguna' => 'guru',
            'status' => 'aktif',
        ]);

        // 3. Pengguna Murid (Andi Pratama - Sesuai Mockup)
        Pengguna::create([
            'nama_lengkap' => 'Andi Pratama',
            'nama_pengguna' => 'andipratama',
            'email' => 'andi@example.com',
            'kata_sandi' => Hash::make('password'),
            'jenis_pengguna' => 'murid',
            'status' => 'aktif',
        ]);

        // Jenjang
        $sd = Jenjang::create(['nama' => 'SD', 'kode' => 'SD', 'urutan' => 1]);
        $smp = Jenjang::create(['nama' => 'SMP', 'kode' => 'SMP', 'urutan' => 2]);
        $sma = Jenjang::create(['nama' => 'SMA', 'kode' => 'SMA', 'urutan' => 3]);
        $smk = Jenjang::create(['nama' => 'SMK', 'kode' => 'SMK', 'urutan' => 4]);

        // Mata Pelajaran (Sesuai Mockup Dashboard)
        $mapelList = [
            ['nama' => 'Matematika', 'kode' => 'MAT', 'warna' => 'blue'],
            ['nama' => 'Bahasa Indonesia', 'kode' => 'BIN', 'warna' => 'red'],
            ['nama' => 'Bahasa Inggris', 'kode' => 'ENG', 'warna' => 'purple'],
            ['nama' => 'Ilmu Pengetahuan Alam', 'kode' => 'IPA', 'warna' => 'green'],
            ['nama' => 'Ilmu Pengetahuan Sosial', 'kode' => 'IPS', 'warna' => 'orange'],
            ['nama' => 'Informatika', 'kode' => 'TIK', 'warna' => 'indigo'],
        ];

        foreach ($mapelList as $mapel) {
            MataPelajaran::create([
                'jenjang_id' => $smp->id,
                'nama' => $mapel['nama'],
                'kode' => $mapel['kode'] . '-SMP',
                'deskripsi' => 'Materi Pembelajaran ' . $mapel['nama'],
                'warna' => $mapel['warna'],
                'status' => 'aktif'
            ]);
        }
    }
}
