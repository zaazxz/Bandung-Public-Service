<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Laporan;
use App\Models\Masyarakat;
use App\Models\Petugas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ViewController extends Controller
{
    public function dashboard() {
        return view('dashboard.index', [
            'title' => 'Halaman Utama',
            'sub' => '',
            'pengaduans' => Laporan::all(),
            'masyarakats' => Masyarakat::all(),
            'petugass' => Petugas::all(),
        ]);
    }

    public function masyarakat() {
        return view('dashboard.masyarakat.index', [
            'title' => 'List Masyarakat',
            'sub' => '',
            'masyarakats' => Masyarakat::all(),
        ]);
    }

    public function landing() {
        return view('main.index', [
            'title' => 'Halaman Utama',
            'data' => Laporan::all()
        ]);
    }

    public function about() {
        return view('main.about.about', [
            'title' => 'Tentang Kami'
        ]);
    }

    public function pengaduanBaru() {
        return view('dashboard.pengaduan.index', [
            'title' => 'Pengaduan',
            'sub' => 'List Pengaduan yang baru dibuat',
            'pengaduans' => Laporan::where('status', 'Menunggu')->get(),
        ]);
    }

    public function pengaduanDiproses() {
        return view('dashboard.pengaduan.diproses', [
            'title' => 'Pengaduan',
            'sub' => 'List Pengaduan yang sedang diproses',
            'pengaduans' => Laporan::where('status', 'Diproses')->get(),
        ]);
    }


    public function pengaduanSelesai() {
        return view('dashboard.pengaduan.selesai', [
            'title' => 'Pengaduan',
            'sub' => 'List Pengaduan yang telah selesai ditanggapi',
            'pengaduans' => Laporan::all(),
        ]);
    }

    public function pengaduanDetail(Laporan $laporan) {
        return view('dashboard.pengaduan.detail', [
            'title' => 'Pengaduan',
            'sub' => 'Detail Pengaduan',
            'laporan' => $laporan
        ]);
    }
}
