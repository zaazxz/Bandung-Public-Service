<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Petugas;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        User::create([
            'nama' => 'Administrator',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123'),
            'telp' =>  '089681238317',
            'alamat' => 'Jl. Buah Dua, No. 13, Kec. Rancaekek, Kab. Bandung',
            'remember_token' => Str::random(10)
        ]);

        Petugas::create([
            'nama' => 'Petugas',
            'username' => 'petugas',
            'email' => 'petugas@gmail.com',
            'password' => Hash::make('123'),
            'telp' =>  '089681238317',
            'alamat' => 'Jl. Buah Dua, No. 13, Kec. Rancaekek, Kab. Bandung',
            'remember_token' => Str::random(10)
        ]);
    }
}
