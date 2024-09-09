<?php

namespace App\Http\Controllers;

use App\Models\Berita;
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
                'nama' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|string|min:8',
            ]);
    
            $user = new User;
            $user->nama = $request->nama;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();
    
            return redirect('/login')->with('sukses', 'Registrasi berhasil');
        } catch (\Exception $e) {
            return redirect('/register')->with('gagal', 'Registrasi gagal ' . $e->getMessage());
        }
    }

    public function login(Request $request)
    {
        if(Auth::attempt($request->only('email', 'password'))) {
            return redirect('admin/dashboard');
        } else {
            return back()->with('gagal', 'Email atau password salah');
        }
    }

    public function logout() {
        Auth::logout();
        return redirect('/login');
    }

    public function dashboard() {
        $berita = Berita::all();
        $date = Carbon::now();
        $user = User::all();
        
        return view('admin.auth.dashboard', compact('berita', 'date', 'user'));
    }
}