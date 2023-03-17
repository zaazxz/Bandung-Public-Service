<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Laporan;
use App\Models\Masyarakat;
use App\Models\Petugas;

class CetakController extends Controller
{

	public function cetakPDF() {
		$data = Laporan::all();
		return view('main.cetak', compact('data'));
	}

	public function cetakPertanggal($tglAwal, $tglAkhir) {
        // dd(["Tanggal Awal : " . $tglAwal, "Tanggal Akhir : " . $tglAkhir]);
        $data = Laporan::all()->whereBetween('created_at',[$tglAwal, $tglAkhir]);
        return view('main.cetak', [
            'data' => $data,
            'dari' => $tglAwal,
            'sampai' => $tglAkhir
        ]);
	}

}
