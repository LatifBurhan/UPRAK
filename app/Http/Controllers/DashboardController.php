<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $albums = Album::all();
        $gambar = []; // Inisialisasi array untuk menyimpan path gambar

        foreach ($albums as $album) {
            $gambar[] = public_path('storage/' . $album->image);
        }

        return view('welcome', compact('albums', 'gambar'));
    }

    public function login()
    {
        return view('');
    }

}
