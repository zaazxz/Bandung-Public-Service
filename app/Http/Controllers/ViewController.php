<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function dashboard() {
        return view('dashboard.index', [
            'title' => 'Halaman Utama',
            'pengaduans' => Laporan::all(),
        ]);
    }
}
