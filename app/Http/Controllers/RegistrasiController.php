<?php

namespace App\Http\Controllers;

use App\Models\Perusahaan;
use App\Models\User;
use Illuminate\Http\Request;

class RegistrasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = Perusahaan::where('status','=','registrasi')->get();

        return view('registrasiPerusahaan.index', compact('datas'));
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

    }

    /**
     * Display the specified resource.
     */
    public function show(Perusahaan $registrasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Perusahaan $registrasi)
    {
        $data = $registrasi;
        // dd($datas);
        return view('registrasiPerusahaan.detail', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $ubah = Perusahaan::findOrFail($id);
        $ubah->update([
            'status' => $request->status
        ]);

        // dd($ubah);

         User::updateOrCreate(
            ['email' => $ubah->email],
            [
                'name' => $ubah->nama,
                'email' => $ubah->email,
                'role' => 'perusahaan',
                'password' => $ubah->password,
            ]
        );

        return redirect('registrasi');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Perusahaan $registrasi)
    {
        //
    }
}
