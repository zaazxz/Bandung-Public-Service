<?php

namespace App\Models;

use App\Models\Masyarakat;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Laporan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function masyarakat() {
        return $this->belongsTo(Masyarakat::class);
    }
}
