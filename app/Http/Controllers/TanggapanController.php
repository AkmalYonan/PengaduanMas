<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use App\Models\Tanggapan;
use Illuminate\Http\Request;

class TanggapanController extends Controller
{
    public function store(Request $request, $id)
    {
        $komentar = Pengaduan::find($id);

        $request->validate([
            'tanggapan' => ['required'],
        ]);

        Tanggapan::create([
            'id_pengaduan' => $komentar->id,
            'tgl_tanggapan' => now(),
            'tanggapan' => $request->tanggapan
        ]);

        return redirect()->back()->with('success', 'Komentar Berhasil di Tambahkan!');
    }
}
