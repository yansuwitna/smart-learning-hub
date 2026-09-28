<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\MataPelajaran;

class MataPelajaranController extends Controller
{
    public function index()
    {
        $mataPelajaran = MataPelajaran::where('status', 'aktif')->get();
        return Inertia::render('MataPelajaran/Index', [
            'mataPelajaran' => $mataPelajaran
        ]);
    }
}
