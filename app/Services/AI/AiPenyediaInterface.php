<?php

namespace App\Services\AI;

interface AiPenyediaInterface
{
    /**
     * Mengirim pesan ke AI dan menerima respons.
     */
    public function tanya(string $pesan, array $konteks = []): string;

    /**
     * Menghasilkan kuis berdasarkan materi.
     */
    public function buatKuis(string $materi, int $jumlah_soal): array;

    /**
     * Mendapatkan estimasi jumlah token yang digunakan.
     */
    public function getPenggunaanToken(): array;
}
