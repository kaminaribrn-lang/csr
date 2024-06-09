<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\Bidangcsr;
use Illuminate\Http\Request;

class KegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(\Auth::user()->role == "superadmin"){
            $datas = Kegiatan::
                join('perusahaan','kegiatan.idperusahaan','=','perusahaan.id')
                ->join('bidangcsr','kegiatan.idbidang','=','bidangcsr.id')
                ->select('kegiatan.*','perusahaan.nama as namaPerusahaan','bidangcsr.nama as namaBidang')
                ->get();

            return view('kegiatan.indexAdmin', compact('datas'));

        } else if(\Auth::user()->role == "perusahaan"){
            $datas = Kegiatan::
                join('perusahaan','kegiatan.idperusahaan','=','perusahaan.id')
                ->join('bidangcsr','kegiatan.idbidang','=','bidangcsr.id')
                ->select('kegiatan.*','perusahaan.nama as namaPerusahaan','bidangcsr.nama as namaBidang')
                ->where('idperusahaan','=',\Auth::user()->id)->get();

            return view('kegiatan.indexAdmin', compact('datas'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $bidangs = Bidangcsr::get();

        return view('kegiatan.create', compact('bidangs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->post());
        $nominal = (float) str_replace(['.', ','], ['', '.'], $request->nominalpagu);

        $file = $request->lampiran;

        $filename = time() . '.' . $file->getClientOriginalExtension();
        $request->lampiran->move('lampiran', $filename);

        Kegiatan::create([
            'nama' => $request->nama,
            'nominalpagu' => $nominal,
            'idbidang' => $request->idbidang,
            'idperusahaan' => $request->idperusahaan,
            'output' => $request->output,
            'deskripsi' => $request->deskripsi,
            'status' => 'tayang',
            'lokasi' => $request->lokasi,
            'tahun' => $request->tahun,
            'catatan' => $request->catatan,
            'lampiran' => $filename,
        ]);

        return redirect('/kegiatan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kegiatan $kegiatan)
    {
        $data = Kegiatan::join('perusahaan','kegiatan.idperusahaan','=','perusahaan.id')
        ->select('kegiatan.*','perusahaan.nama as namaPerusahaan')->get();
        $data = $data[0];
        $bidangs = Bidangcsr::get();
        // dd($data);
        return view('kegiatan.edit', compact('data', 'bidangs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $nominal = (float) str_replace(['.', ','], ['', '.'], $request->nominalpagu);

        // $file = $request->lampiran;

        // $filename = time() . '.' . $file->getClientOriginalExtension();
        // $request->lampiran->move('lampiran', $filename);

        $ubah = Kegiatan::findOrFail($id);
        $ubah->update([
             'nama' => $request->nama,
            'nominalpagu' => $nominal,
            'idbidang' => $request->idbidang,
            'idperusahaan' => $request->idperusahaan,
            'output' => $request->output,
            'deskripsi' => $request->deskripsi,
            'status' => $request->status,
            'lokasi' => $request->lokasi,
            'tahun' => $request->tahun,
            'catatan' => $request->catatan,
            // 'lampiran' => $filename,
        ]);

        return redirect('kegiatan');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
