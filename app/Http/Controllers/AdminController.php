<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use App\Models\Petugas;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rules;


class AdminController extends Controller
{
    public function index()
    {
        $pengaduan = Pengaduan::where('status', 'belum')->get();
        $pengaduanProses = Pengaduan::where('status', 'proses')->get();
        $role = Auth::user()->level;

        return view('admin.index', compact('pengaduan', 'pengaduanProses', 'role'));
    }

    public function viewAccount()
    {
        $user = User::paginate(10);

        return view('admin.viewAcc', compact('user'));
    }

    public function detailAccount($id)
    {
        $user = User::find($id);

        return view('admin.detailAcc', compact('user'));
    }

    public function archive()
    {
        $pengaduan = Pengaduan::where('status', 'selesai')->get();

        return view('admin.archive', compact('pengaduan'));
    }

    public function createPetugas(Request $request)
    {
        $request->validate([
            'username' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'telp' => ['required', 'integer'],
            'role' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . Petugas::class],
            'password' => ['required', Rules\Password::defaults()],
        ]);

        $user = Petugas::create([
            'username' => $request->username,
            'name' => $request->name,
            'role' => $request->role,
            'telp' => $request->telp,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        return redirect()->back()->with('success', 'Akun telah Berhasil dibuat');
    }
}
