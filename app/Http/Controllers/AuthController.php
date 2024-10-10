<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Dukuh;
use App\Models\InformasiDesa;
use App\Models\Penduduk;
use App\Models\Perpustakaan;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        $user = User::all();
        return view('admin.auth.register', compact('user'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'username' => 'required|string|max:100|unique:users,username',
                'password' => 'required|string|min:8|regex:/[A-Z]/',
            ]);
    
            $user = new User;
            $user->username = $request->username;
            $user->password = Hash::make($request->password);
            $user->save();
    
            return redirect('/login')->with('sukses', 'Registrasi berhasil');
        } catch (\Exception $e) {
            return redirect('/register')->with('gagal', 'Registrasi gagal ' . $e->getMessage());
        }
    }

    public function login(Request $request)
    {
        if(Auth::attempt($request->only('username', 'password'))) {
            return redirect('admin/dashboard');
        } else {
            return back()->with('gagal', 'Username atau password salah');
        }
    }

    public function logout() {
        Auth::logout();
        return redirect('/login');
    }

    public function dashboard() {
        $berita = Berita::all();
        $user = User::all();
        $penduduk = Penduduk::all();
        $totalLakiLaki = Penduduk::sum('laki_laki');
        $totalPerempuan = Penduduk::sum('perempuan');
        $totalJiwa = $totalLakiLaki + $totalPerempuan;
        $informasiDesa = InformasiDesa::all();
        $buku = Perpustakaan::all();
        $dukuh = Dukuh::all();

        return view('admin.auth.dashboard', compact('berita', 'user', 'penduduk', 'totalLakiLaki', 'totalPerempuan', 'informasiDesa', 'totalJiwa', 'buku', 'dukuh'));
    }

    public function profile($id) {
        $user = User::findOrFail($id);

        return view('admin.auth.profile', compact('user'));
    }

    public function edit_profile(Request $request, $id) {
        try {
            $user = User::findOrFail($id);

            if ($request->password === null) {
                $user->username = $request->username;
                $user->update();
            } else {
                $user->username = $request->username;
                $user->password = Hash::make($request->password);
                $user->update();
            }

            return redirect("/admin/profile/{$id}")->with('sukses', 'Data berhasil diupdate');
        } catch (\Exception $e) {
            return redirect("/admin/profile{$id}")->with('gagal', 'Data gagal diupdate ' . $e->getMessage());
        }
    }
}