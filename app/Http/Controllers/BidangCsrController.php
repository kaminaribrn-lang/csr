<?php

namespace App\Http\Controllers;

use App\Models\Bidangcsr;
use Illuminate\Http\Request;

class BidangCsrController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = Bidangcsr::get();

        return view('bidangCsr.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('bidangCsr.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $tambah = Bidangcsr::create([
            'nama' => $request->nama,
            'urut' => $request->urut,
            'deskripsi' => $request->deskripsi,
            ]);

        if ($tambah) {
            return redirect('/bidang-csr');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Bidangcsr $bidangcsr)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Bidangcsr::findOrFail($id);
        return view('bidangCsr.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
         // dd($request->post() );
        $ubah = Bidangcsr::findOrFail($id);

        $ubah->update([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect('bidang-csr');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $delete = Bidangcsr::findOrFail($id);
        $delete->delete();
        // $bidangcsr->delete();
        return redirect('bidang-csr');
    }
}
