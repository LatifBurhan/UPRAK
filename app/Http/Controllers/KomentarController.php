<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Komentar;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KomentarController extends Controller
{
    public function index($id)
    {
        $foto = Album::find($id);
        $komentar = $foto->komentar()->get();
        return view('komentar', compact('foto', 'komentar'));
    }

    public function post(Request $request)
    {
        $validate = $request->validate([
            'komentar' => 'required',
            'foto_id' => 'required|exists:albums,id'
        ]);

        $komen = new Komentar([
            'user_id' => auth()->user()->id,
            'foto_id' => $validate['foto_id'],
            'komentar' => $validate['komentar'],
        ]);

        $komen->save();

        return redirect()->back();
    }
}

