<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

class BerandaController extends Controller
{
    public function index()
    {
        $pengguna = Auth::user();
        return Inertia::render('Dashboard', [
            'pengguna' => $pengguna,
            'pesan' => 'Selamat datang kembali!'
        ]);
    }

    public function belajar()
    {
        return Inertia::render('Belajar/Index');
    }
}
