<?php

namespace App\Http\Controllers;

use App\Models\Masyarakat;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class MasyarakatController extends Controller
{
    public function index()
    {
        return view('main.konfigurasi.masyarakat.masyarakat', [
            'title' => 'Konfigurasi Profil',
        ]); 
    }

    public function edit(Masyarakat $masyarakat)
    {
        return view('main.konfigurasi.masyarakat.edit', [
            'title' => 'Konfigurasi Profil',
            'masyarakat' => $masyarakat
        ]); 
    }

    public function update(Request $request, Masyarakat $masyarakat)
    {
        $rules = [
            'nama' => 'required',
            'email' => 'required',
            'nik' => 'required|min:16',
            'telp' => 'required|min:11',
            'tgl_lahir' => '',
            'tmpt_lahir' => '',
            'username' => 'required',
            'password' => '',
            'gambar' => '',
            'alamat' => '',
            'remember_token' => Str::random(10)
        ];

        if($request->username != $masyarakat->username) {
            $rules['username'] = 'required';
        }

        $validatedData = $request->validate($rules);

        if ($request->file('gambar')) {
            if($masyarakat->gambar){
                Storage::delete($masyarakat->gambar);
            }
            $validatedData['gambar'] = $request->file('gambar')->store('post-images');
        }

        Masyarakat::where('id', $masyarakat->id)
            ->update($validatedData);

        if($validatedData) {
            return redirect('/konfigurasi/masyarakat');
        } else {
            return redirect('/konfigurasi/masyarakat');
        }
    }
}
