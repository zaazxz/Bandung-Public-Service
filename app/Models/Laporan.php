<?php

namespace App\Models;

use App\Models\Masyarakat;
use App\Models\Petugas;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Laporan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function masyarakat() {
        return $this->belongsTo(Masyarakat::class);
    }

    public function petugas() {
        return $this->belongsTo(Petugas::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

}
