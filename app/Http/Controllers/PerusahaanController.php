<?php

namespace App\Http\Controllers;

use App\Models\Perusahaan;
use Illuminate\Http\Request;
use PHPUnit\Framework\MockObject\Stub\ReturnReference;

class PerusahaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = Perusahaan::where('status','=','diterima')->get();

        return view('perusahaan.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('perusahaan.create');

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
            'status' => 'diterima',
            'email' => $request->email,
            'password' => bcrypt($request->password),
            ]);

        if ($tambah) {
            return redirect('/perusahaan');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Perusahaan $perusahaan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Perusahaan $perusahaan)
    {
        $data = $perusahaan;
        return view('perusahaan.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // dd($request->post() );
        $ubah = Perusahaan::findOrFail($id);

        if($request->password == null){
            $ubah->update([
                'nama' => $request->nama,
                'direktur' => $request->direktur,
                'kecamatan' => $request->kecamatan,
                'kelurahan' => $request->kelurahan,
                'alamat' => $request->alamat,
                'kodepos' => $request->kodepos,
                'website' => $request->website,
                'nomorhp' => $request->nomorhp,
                'email' => $request->email,
            ]);
        } else {
            $ubah->update([
                'nama' => $request->nama,
                'direktur' => $request->direktur,
                'kecamatan' => $request->kecamatan,
                'kelurahan' => $request->kelurahan,
                'alamat' => $request->alamat,
                'kodepos' => $request->kodepos,
                'website' => $request->website,
                'nomorhp' => $request->nomorhp,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ]);
        }

        return redirect('perusahaan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Perusahaan $perusahaan)
    {
        $perusahaan->delete();
        return redirect('perusahaan');
    }
}
