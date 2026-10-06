<?php

namespace App\Http\Controllers;

use App\Models\Aksi;
use App\Models\Kegiatan;
use App\Models\Bidangcsr;
use App\Models\Perusahaan;
use App\Models\ProgramUnggulanBupati;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class KegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = Kegiatan::leftJoin('perusahaan', 'kegiatan.idperusahaan', '=', 'perusahaan.id')
            ->leftJoin('bidangcsr', 'kegiatan.idbidang', '=', 'bidangcsr.id')
            ->select('kegiatan.*', 'perusahaan.nama as namaPerusahaan', 'bidangcsr.nama as namaBidang');

        if (auth()->check() && auth()->user()->role === 'perusahaan') {
            $company = $this->resolveCurrentCompany();
            $datas->where('kegiatan.idperusahaan', $company->id);
        }

        $datas = $datas->get();

        return view('kegiatan.indexAdmin', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $perusahaan = auth()->check() && auth()->user()->role === 'superadmin'
            ? Perusahaan::where('status', '=', 'diterima')->get()
            : collect();

        $company = auth()->check() && auth()->user()->role === 'perusahaan'
            ? $this->resolveCurrentCompany()
            : null;

        return view('kegiatan.create', compact('perusahaan', 'company'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'perusahaan' => auth()->check() && auth()->user()->role === 'superadmin' ? 'required' : 'nullable',
        ]);

        $companyId = auth()->check() && auth()->user()->role === 'perusahaan'
            ? $this->resolveCurrentCompany()->id
            : $validated['perusahaan'];

        Kegiatan::create([
            'nama' => $validated['nama'],
            'nominalpagu' => 0,
            'idbidang' => '0',
            'idperusahaan' => $companyId,
            'output' => $validated['nama'],
            'deskripsi' => $validated['deskripsi'],
            'status' => 'tayang',
            'lokasi' => '-',
            'tahun' => (string) now()->year,
            'catatan' => '-',
            'lampiran' => '',
        ]);

        return redirect('/kegiatan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return redirect('kegiatan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kegiatan $kegiatan)
    {
        $this->authorizeCompanyKegiatan($kegiatan);

        $data = Kegiatan::leftJoin('perusahaan', 'kegiatan.idperusahaan', '=', 'perusahaan.id')
            ->leftJoin('bidangcsr', 'kegiatan.idbidang', '=', 'bidangcsr.id')
            ->select('kegiatan.*', 'perusahaan.nama as namaPerusahaan', 'bidangcsr.nama as namaBidang')
            ->where('kegiatan.id', $kegiatan['id'])
            ->firstOrFail();

        $programOptions = ProgramUnggulanBupati::with(['uraians' => function ($query) {
            $query->select('id', 'program_unggulan_bupati_id', 'uraian')->orderBy('id');
        }])
            ->orderBy('nama')
            ->get(['id', 'nama'])
            ->map(function ($program) {
                return [
                    'id' => $program->id,
                    'nama' => $program->nama,
                    'uraians' => $program->uraians->map(function ($uraian) {
                        return [
                            'id' => $uraian->id,
                            'uraian' => $uraian->uraian,
                        ];
                    })->values(),
                ];
            })
            ->values();

        $wilayahRows = collect();

        if (Schema::hasTable('wilayah_mahakam_ulu')) {
            $wilayahRows = DB::table('wilayah_mahakam_ulu')
                ->select('kecamatan', 'desa as kelurahan')
                ->orderBy('kecamatan')
                ->orderBy('desa')
                ->get();
        }

        if ($wilayahRows->isEmpty()) {
            $wilayahRows = Perusahaan::query()
                ->select('kecamatan', 'kelurahan')
                ->whereNotNull('kecamatan')
                ->where('kecamatan', '!=', '')
                ->whereNotNull('kelurahan')
                ->where('kelurahan', '!=', '')
                ->orderBy('kecamatan')
                ->orderBy('kelurahan')
                ->get();
        }

        $wilayahOptions = $wilayahRows
            ->groupBy('kecamatan')
            ->map(function ($rows) {
                return $rows->pluck('kelurahan')->unique()->values();
            })
            ->toArray();

        return view('kegiatan.edit', compact('data', 'programOptions', 'wilayahOptions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'status' => 'nullable|string',
        ]);

        $ubah = Kegiatan::findOrFail($id);
        $this->authorizeCompanyKegiatan($ubah);

        $payload = [
            'nama' => $validated['nama'],
            'output' => $validated['nama'],
            'deskripsi' => $validated['deskripsi'],
        ];

        if (auth()->check() && auth()->user()->role === 'superadmin' && $request->filled('status')) {
            $payload['status'] = $validated['status'];
        }

        $ubah->update($payload);

        return redirect('kegiatan');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kegiatan = Kegiatan::findOrFail($id);
        $this->authorizeCompanyKegiatan($kegiatan);
        $kegiatan->delete();

        return redirect('kegiatan');
    }

    public function recalculate($id)
    {
        $kegiatan = Kegiatan::findOrFail($id);
        $this->authorizeCompanyKegiatan($kegiatan);

        $total = Aksi::where('id_kegiatan', $id)->sum('nominalpagu');

        $kegiatan->update([
            'nominalpagu' => $total,
        ]);

        return response()->json([
            'nominal' => $total,
        ]);
    }

    private function resolveCurrentCompany(): Perusahaan
    {
        return Perusahaan::where('email', auth()->user()->email)->firstOrFail();
    }

    private function authorizeCompanyKegiatan(Kegiatan $kegiatan): void
    {
        if (auth()->check() && auth()->user()->role === 'perusahaan') {
            $company = $this->resolveCurrentCompany();

            abort_if((string) $kegiatan->idperusahaan !== (string) $company->id, 403);
        }
    }
}
