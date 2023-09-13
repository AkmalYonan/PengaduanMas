<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePengaduanRequest;
use App\Models\Pengaduan;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengaduanController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        return view('dashboard', compact('user'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'alamat' => ['required'],
            'judulLaporan' => ['required'],
            'isiLaporan' => ['required'],
            'tgl_kejadian' => ['required'],
            'image' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:10240'],
        ]);

        $fileName = now()->timestamp . '.' . $request->file('image')->getClientOriginalExtension();

        Pengaduan::create([
            'nik_pengadu' => Auth::user()->nik,
            'username' => Auth::user()->username,
            'name' => Auth::user()->name,
            'email' => Auth::user()->email,
            'alamat' => $request->alamat,
            'tgl_kejadian' => $request->tgl_kejadian,
            'image' => $request->file('image')->storeAs('image', $fileName),
            'judulLaporan' => $request->judulLaporan,
            'isiLaporan' => $request->isiLaporan,
            'tgl_pengaduan' => now(),
        ]);

        return redirect()->route('history')->with('success', 'Laporan Berhasil di Buat!');
    }

    public function history()
    {
        $id_user = Auth::user()->nik;

        $history = Pengaduan::where('nik_pengadu', $id_user)->get();

        return view('masyarakat.history', compact('id_user', 'history'));
    }
}
