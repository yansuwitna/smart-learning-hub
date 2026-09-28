<?php

namespace App\Services\AI;

class AiManager
{
    protected AiPenyediaInterface $provider;

    public function __construct()
    {
        // Secara default menggunakan Gemini
        $this->provider = new AiGeminiService();
    }

    public function setProvider(AiPenyediaInterface $provider)
    {
        $this->provider = $provider;
    }

    public function tanyaGuru(string $pesan, array $konteks = []): string
    {
        // Tambahkan instruksi sistem untuk bertindak sebagai guru
        $prompt = "Kamu adalah Guru yang sabar dan pintar. " . $pesan;
        return $this->provider->tanya($prompt, $konteks);
    }
    
    public function buatSoal(string $materi, int $jumlah_soal = 5): array
    {
        return $this->provider->buatKuis($materi, $jumlah_soal);
    }
}
