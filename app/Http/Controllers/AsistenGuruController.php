<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Services\AI\AiManager;

class AsistenGuruController extends Controller
{
    public function index()
    {
        return Inertia::render('AsistenGuru/Index');
    }

    public function buatSoal(Request $request, AiManager $aiManager)
    {
        $request->validate([
            'materi' => 'required|string',
            'jumlah_soal' => 'required|integer|min:1|max:10'
        ]);

        $soal = $aiManager->buatSoal($request->materi, $request->jumlah_soal);

        return response()->json([
            'soal' => $soal
        ]);
    }
}
