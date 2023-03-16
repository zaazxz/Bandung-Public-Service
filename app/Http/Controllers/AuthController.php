<?php

namespace App\Http\Controllers;

use App\Models\Masyarakat;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function masuk() {
        return view('auth.login');
    }

    public function daftar() {
        return view('auth.register');
    }

    public function login(Request $request) {

        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        // User
        if (Auth::guard('user')->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/dashboard');
        }

        // Petugas
        elseif (Auth::guard('petugas')->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        // Masyarakat
        elseif (Auth::guard('masyarakat')->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/dashboard');
        }

        return back();
    }

    public function register(Request $request) {

        $data = $request->validate([
            'nama' => 'required',
            'email' => 'required|unique:masyarakats|unique:petugas',
            'nik' => 'required|min:16',
            'telp' => 'required|min:11',
            'tgl_lahir' => '',
            'tmpt_lahir' => '',
            'username' => 'required|unique:masyarakats|unique:petugas',
            'password' => 'required',
            'province' => '',
            'regency' => '',
            'district' => '',
            'village' => '',
            'gambar' => '',
            'status' => '',
            'jenis_kelamin' => '',
            'remember_token' => Str::random(10)
        ]);

        $data['password'] = Hash::make($data['password']);
        Masyarakat::create($data);

        if ($data) {
            return redirect('/masuk');
        } else {
            return redirect('/masuk');
        }
    }

    public function logout(Request $request)
    {

        // Admin
        if (Auth::guard('user')->check()) {

            Auth::guard('user')->logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();

            return redirect('/');
        }

        // Petugas
        elseif (Auth::guard('petugas')->check()) {

            Auth::guard('petugas')->logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();

            return redirect('/');
        }

        // Masyarakat
        elseif (Auth::guard('masyarakat')->check()) {

            Auth::guard('masyarakat')->logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();

            return redirect('/');
        }
    }

}
