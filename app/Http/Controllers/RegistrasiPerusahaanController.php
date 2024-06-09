<?php

namespace App\Http\Controllers;

use App\Models\Perusahaan;
use Illuminate\Http\Request;

class RegistrasiPerusahaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('registrasiPerusahaan.daftar');

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $tambah = Perusahaan::create([
            'nama' => $request->nama,
            'direktur' => $request->direktur,
            'kecamatan' => $request->kecamatan,
            'kelurahan' => $request->kelurahan,
            'alamat' => $request->alamat,
            'kodepos' => $request->kodepos,
            'website' => $request->website,
            'nomorhp' => $request->nomorhp,
            'status' => 'registrasi',
            'email' => $request->email,
            'password' => bcrypt($request->password),
            ]);

        if ($tambah) {
            return redirect('/');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Registrasiperusahaan $registrasiperusahaan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Registrasiperusahaan $registrasiperusahaan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Registrasiperusahaan $registrasiperusahaan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Registrasiperusahaan $registrasiperusahaan)
    {
        //
    }
}
