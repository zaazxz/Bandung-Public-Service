<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        return view('main.konfigurasi.user.index', [
            'title' => 'Profil Administrator',
            'sub' => 'Konfigurasi Profil Administrator',
            'users' => $user
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        // dd($request->all());
        $rules = [
            'nama' => 'required',
            'username' => 'required',
            'email' => 'required',
            'password' => '',
            'telp' => 'required',
            'alamat' => 'required',
            'gambar' => 'image|file|mimes:jpeg,png,jpg,gif,svg|max:20000',
            'remember_token' => Str::random(10)
        ]; 

        $validatedData = $request->validate($rules);

        if ($request->file('gambar')) {
            if($user->gambar){
                Storage::delete($user->gambar);
            }
            $validatedData['gambar'] = $request->file('gambar')->store('post-images');
        }

        User::where('id', $user->id)
            ->update($validatedData);


        if($validatedData) {
            return redirect('dashboard/konfigurasi/user')->with(['success' => 'Data Berhasil Diubah!']);
        } else {
            return redirect('dashboard/konfigurasi/user')->with(['error' => 'Data Gagal Diubah!']);
        } 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
