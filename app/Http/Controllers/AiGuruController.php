<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Services\AI\AiManager;

class AiGuruController extends Controller
{
    public function index()
    {
        return Inertia::render('AiGuru/JendelaAiGuru');
    }

    public function tanya(Request $request, AiManager $aiManager)
    {
        $request->validate([
            'pesan' => 'required|string'
        ]);

        $jawaban = $aiManager->tanyaGuru($request->pesan);

        return response()->json([
            'jawaban' => $jawaban
        ]);
    }
}
