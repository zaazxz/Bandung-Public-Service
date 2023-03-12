<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Laporan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('main.pengaduan.index', [
            'title' => 'Pengaduan',
            'reports' => Laporan::latest()->paginate(4)
        ]);
    }

    public function detail()
    {
        return view('main.pengaduan.detail', [
            'title' => 'Pengaduan',
            'reports' => Laporan::where('masyarakat_id', Auth::guard('masyarakat')->user()->id)->latest()->paginate(4)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'user_id' => '',
            'petugas_id' => '',
            'masyarakat_id' => 'required',
            'status' => 'required',
            'identitas' => '',
            'laporan' => 'required',
            'gambar' => 'image|file|mimes:jpeg,png,jpg,gif,svg|max:20000',
            'remember_token' => Str::random(10)
        ]);

        if ($request->file('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('post-images');
        }

        Laporan::create($data);

        if ($data) {
            return redirect('/laporan')->with(['success' => 'User baru berhasil ditambahkan!']);
        } else {
            return redirect('/')->with(['success' => 'User baru berhasil ditambahkan!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function show(Laporan $laporan)
    {
        return view('main.pengaduan.show', [
            'title' => 'Pengaduan',
            'laporan' => $laporan
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function edit(Laporan $laporan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Laporan $laporan)
    {
        $rules = [
            'user_id' => '',
            'petugas_id' => '',
            'masyarakat_id' => 'required',
            'status' => 'required',
            'identitas' => '',
            'laporan' => 'required',
            'gambar' => 'image|file|mimes:jpeg,png,jpg,gif,svg|max:20000',
            'remember_token' => Str::random(10)
        ];

        $validatedData = $request->validate($rules);

        if ($request->file('gambar')) {
            if($laporan->gambar){
                Storage::delete($laporan->gambar);
            }
            $validatedData['gambar'] = $request->file('gambar')->store('post-images');
        }

        Laporan::where('id', $laporan->id)
            ->update($validatedData);

        if($validatedData) {
            return redirect('/laporan/detail')->with(['success' => 'Data Berhasil Diubah!']);
        } else {
            return redirect('/laporan/detail')->with(['error' => 'Data Gagal Diubah!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Laporan $laporan)
    {
        if($laporan->gambar){
            Storage::delete($laporan->gambar);
        }
        Laporan::destroy($laporan->id);

        if($laporan) {
            return redirect('/laporan/detail')->with(['success' => 'Data Berhasil Dihapus!']);
        } else {
            return redirect('/laporan/detail')->with(['error' => 'Data Gagal Dihapus!']);
        }
    }
}
