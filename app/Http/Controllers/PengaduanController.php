<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePengaduanRequest;
use App\Models\Pengaduan;
use App\Models\Tanggapan;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

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

        if ($request->hasFile('image')) {
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
        } else {
            Pengaduan::create([
                'nik_pengadu' => Auth::user()->nik,
                'username' => Auth::user()->username,
                'name' => Auth::user()->name,
                'email' => Auth::user()->email,
                'alamat' => $request->alamat,
                'tgl_kejadian' => $request->tgl_kejadian,
                'judulLaporan' => $request->judulLaporan,
                'isiLaporan' => $request->isiLaporan,
                'tgl_pengaduan' => now(),
            ]);
        }
        return redirect()->route('history')->with('success', 'Laporan Berhasil di Buat!');
    }

    public function history()
    {
        $id_user = Auth::user()->nik;

        $history = Pengaduan::where('nik_pengadu', $id_user)->get();

        return view('masyarakat.history', compact('id_user', 'history'));
    }

    public function downloadIMG($id)
    {
        $download = Pengaduan::find($id);

        $filePath = Storage::path($download->image);

        if (!Storage::exists($download->image) || !file_exists($filePath)) {
            return redirect()->back()->with('error', 'File tidak ditemukan di penyimpanan.');
        }

        return response()->download($filePath, 'PengaduanMasImage_Laporan');
    }

    public function show($id)
    {
        $history = Pengaduan::find($id);
        $komentar = Tanggapan::where('id_pengaduan', $id)->get();
        // dd($history);

        $filePath = Storage::path($history->image);
        $fileSizeBytes = Storage::size($history->image);
        $fileSizeKB = round($fileSizeBytes / 1024, 2);
        $fileSizeMB = round($fileSizeBytes / (1024 * 1024), 2);

        return view('masyarakat.history-detail', compact('history', 'fileSizeKB', 'fileSizeMB', 'komentar'));
    }

    public function edit(Request $request, $id)
    {
        $request->validate([
            'alamat' => ['required'],
            'judulLaporan' => ['required'],
            'isiLaporan' => ['required'],
            'tgl_kejadian' => ['required'],
        ]);

        if ($request->hasFile('image')) {
            $dataLama = Pengaduan::where('id', $id)->get()[0];
            Storage::delete([
                $dataLama->image,
            ]);

            $request->validate([
                'image' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:10240'],
            ]);
            $fileName = now()->timestamp . '.' . $request->file('image')->getClientOriginalExtension();

            Pengaduan::where('id', $id)->update([
                'image' => $request->file('image')->storeAs('image', $fileName),
            ]);
        }

        Pengaduan::where('id', $id)->update([
            'alamat' => $request->alamat,
            'tgl_kejadian' => $request->tgl_kejadian,
            'judulLaporan' => $request->judulLaporan,
            'isiLaporan' => $request->isiLaporan,
        ]);

        return redirect()->back()->with('success', 'Laporan Berhasil diEdit');
    }

    public function proses($id)
    {
        $history = Pengaduan::where('id', $id)->update([
            'status' => 'proses',
        ]);
        // dd($history);

        return Redirect::route('admin.index')->with('success', 'Laporan lanjut ke Tahap Proses');
    }

    public function selesai($id)
    {
        $history = Pengaduan::where('id', $id)->update([
            'status' => 'selesai',
        ]);

        return redirect()->route('admin.index')->with('success', 'Laporan Berhasil diselesaikan!');
    }
}
