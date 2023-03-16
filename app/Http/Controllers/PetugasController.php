<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use App\Models\Masyarakat;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.petugas.index', [
            'title' => 'List Petugas',
            'sub' => '',
            'petugass' => Petugas::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.petugas.create', [
            'title' => 'Pembuatan Akun',
            'sub' => 'Halaman Pembuatan Akun Petugas',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = $request->validate([
            'nama' => 'required',
            'username' => 'required|unique:petugas|unique:masyarakats',
            'email' => 'required|email|unique:petugas|unique:masyarakats',
            'password' => 'required',
            'telp' =>  '',
            'alamat' => '',
            'gambar' => '',
            'remember_token' => Str::random(10)
        ]);

        $data['password'] = Hash::make($data['password']);
        Petugas::create($data);

        if ($data) {
            return redirect('/dashboard/petugas');
        } else {
            return redirect('/dashboard/petugas');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Petugas  $petugas
     * @return \Illuminate\Http\Response
     */
    public function show(Petugas $petugas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Petugas  $petugas
     * @return \Illuminate\Http\Response
     */
    public function edit(Petugas $petugas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Petugas  $petugas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Petugas $petugas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Petugas  $petugas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Petugas $petugas)
    {
        if($petugas->gambar){
            Storage::delete($petugas->gambar);
        }
        Petugas::destroy($petugas->id);

        if($petugas) {
            return redirect('/dashboard/petugas')->with(['success' => 'Data Berhasil Dihapus!']);
        } else {
            return redirect('/dashboard/petugas')->with(['error' => 'Data Gagal Dihapus!']);
        }
    }
}
