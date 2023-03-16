<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Laporan;
use App\Models\Masyarakat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ViewController extends Controller
{
    public function dashboard() {
        return view('dashboard.index', [
            'title' => 'Halaman Utama',
            'sub' => '',
            'pengaduans' => Laporan::all(),
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
}
