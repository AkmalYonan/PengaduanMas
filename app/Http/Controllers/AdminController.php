<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    public function index()
    {
        $pengaduan = Pengaduan::where('status', 'belum')->get();
        $pengaduanProses = Pengaduan::where('status', 'proses')->get();

        return view('admin.index', compact('pengaduan', 'pengaduanProses'));
    }

    public function archive()
    {
        $pengaduan = Pengaduan::where('status', 'selesai')->get();

        return view('admin.archive', compact('pengaduan'));
    }
}
