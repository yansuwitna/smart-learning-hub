<?php

namespace App\Services\AI;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class AiGeminiService implements AiPenyediaInterface
{
    protected string $apiKey;
    protected string $baseUrl = 'https://generativelanguage.googleapis.com/v1beta/models/gemini-pro:generateContent';

    public function __construct()
    {
        $this->apiKey = env('GEMINI_API_KEY', '');
    }

    public function tanya(string $pesan, array $konteks = []): string
    {
        if (empty($this->apiKey)) {
            return "Kunci API Gemini belum dikonfigurasi.";
        }

        try {
            $response = Http::post($this->baseUrl . '?key=' . $this->apiKey, [
                'contents' => [
                    [
                        'parts' => [
                            ['text' => $pesan]
                        ]
                    ]
                ]
            ]);

            if ($response->successful()) {
                $data = $response->json();
                return $data['candidates'][0]['content']['parts'][0]['text'] ?? "Maaf, saya tidak mengerti.";
            }

            Log::error('Gemini API Error', ['response' => $response->body()]);
            return "Maaf, terjadi kesalahan saat menghubungi AI Guru.";
            
        } catch (\Exception $e) {
            Log::error('Gemini Exception', ['message' => $e->getMessage()]);
            return "Terjadi kesalahan internal pada layanan AI.";
        }
    }

    public function buatKuis(string $materi, int $jumlah_soal): array
    {
        $prompt = "Buat {$jumlah_soal} soal pilihan ganda tentang materi: {$materi}. Kembalikan dalam format JSON.";
        $response = $this->tanya($prompt);
        // Implementasi parsing JSON akan ditambahkan nanti
        return [];
    }

    public function getPenggunaanToken(): array
    {
        return ['masuk' => 0, 'keluar' => 0];
    }
}
