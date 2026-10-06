<?php

namespace App\Http\Controllers;

use App\Models\Aksi;
use App\Models\Kegiatan;
use App\Models\Perusahaan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class AksiController extends Controller
{
    public function verificationPage(Request $request)
    {
        abort_unless(auth()->check() && auth()->user()->role === 'superadmin', 403);

        $status = $request->get('status', 'menunggu');
        $keyword = trim((string) $request->get('q', ''));
        $perusahaanId = $request->get('perusahaan_id');
        $tanggalMulai = $request->get('tanggal_mulai');
        $tanggalSelesai = $request->get('tanggal_selesai');

        $query = Aksi::query()
            ->from('aksi as a')
            ->leftJoin('kegiatan as k', 'k.id', '=', 'a.id_kegiatan')
            ->leftJoin('perusahaan as p', 'p.id', '=', 'a.idperusahaan')
            ->leftJoin('program_unggulan_bupati as pub', 'pub.id', '=', 'a.program_unggulan_bupati_id')
            ->leftJoin('uraian_program_unggulan_bupati as upub', 'upub.id', '=', 'a.uraian_program_unggulan_bupati_id')
            ->select([
                'a.id',
                'a.id_kegiatan',
                'a.nama as nama_aksi',
                'a.target',
                'a.realisasi_uang',
                'a.tanggal',
                'a.kecamatan',
                'a.desa',
                'a.lampiran',
                'a.status_verifikasi',
                'a.catatan_verifikasi',
                'k.nama as nama_kegiatan',
                'p.nama as nama_perusahaan',
                'pub.nama as nama_program',
                'upub.uraian as nama_uraian',
            ]);

        if (in_array($status, ['menunggu', 'disetujui', 'ditolak'], true)) {
            $query->where('a.status_verifikasi', $status);
        }

        if ($keyword !== '') {
            $query->where(function ($subQuery) use ($keyword) {
                $subQuery->where('a.nama', 'like', '%' . $keyword . '%')
                    ->orWhere('k.nama', 'like', '%' . $keyword . '%')
                    ->orWhere('p.nama', 'like', '%' . $keyword . '%')
                    ->orWhere('pub.nama', 'like', '%' . $keyword . '%')
                    ->orWhere('upub.uraian', 'like', '%' . $keyword . '%');
            });
        }

        if ($perusahaanId !== null && $perusahaanId !== '') {
            $query->where('a.idperusahaan', $perusahaanId);
        }

        if (! empty($tanggalMulai)) {
            $query->whereDate('a.tanggal', '>=', $tanggalMulai);
        }

        if (! empty($tanggalSelesai)) {
            $query->whereDate('a.tanggal', '<=', $tanggalSelesai);
        }

        $laporans = $query
            ->orderByDesc('a.id')
            ->paginate(20);

        $counts = [
            'menunggu' => Aksi::where('status_verifikasi', 'menunggu')->count(),
            'disetujui' => Aksi::where('status_verifikasi', 'disetujui')->count(),
            'ditolak' => Aksi::where('status_verifikasi', 'ditolak')->count(),
        ];

        $perusahaanOptions = Perusahaan::query()
            ->orderBy('nama')
            ->get(['id', 'nama']);

        return view('aksi.verifikasi', [
            'laporans' => $laporans,
            'status' => $status,
            'keyword' => $keyword,
            'perusahaanId' => (string) $perusahaanId,
            'tanggalMulai' => $tanggalMulai,
            'tanggalSelesai' => $tanggalSelesai,
            'perusahaanOptions' => $perusahaanOptions,
            'counts' => $counts,
        ]);
    }

    /**
     * LIST AKSI PER KEGIATAN (AJAX)
     */
    public function list($id)
    {
        $kegiatan = Kegiatan::findOrFail($id);
        $this->authorizeCompanyKegiatan($kegiatan);

        $aksi = Aksi::where('id_kegiatan', $id)
            ->with(['programUnggulan:id,nama', 'uraianProgram:id,uraian'])
            ->orderBy('id', 'desc')
            ->get()
            ->map(function ($item) {
                return [
                    'id' => $item->id,
                    'id_kegiatan' => $item->id_kegiatan,
                    'program_unggulan_bupati_id' => $item->program_unggulan_bupati_id,
                    'uraian_program_unggulan_bupati_id' => $item->uraian_program_unggulan_bupati_id,
                    'program_unggulan_nama' => optional($item->programUnggulan)->nama,
                    'uraian_program_nama' => optional($item->uraianProgram)->uraian,
                    'nama' => $item->nama,
                    'target' => $item->target,
                    'realisasi_fisik' => $item->realisasi_fisik,
                    'realisasi_uang' => $item->realisasi_uang,
                    'tanggal' => $item->tanggal,
                    'kecamatan' => $item->kecamatan,
                    'desa' => $item->desa,
                    'nominalpagu' => $item->nominalpagu,
                    'output' => $item->output,
                    'deskripsi' => $item->deskripsi,
                    'lokasi' => $item->lokasi,
                    'tahun' => $item->tahun,
                    'catatan' => $item->catatan,
                    'status_verifikasi' => $item->status_verifikasi ?? 'disetujui',
                    'lampiran' => $item->lampiran,
                    'lampiran_url' => ($item->lampiran && $item->lampiran !== '-') ? asset('lampiran/' . $item->lampiran) : null,
                ];
            });

        return response()->json([
            'data' => $aksi
        ]);
    }

    /**
     * STORE & UPDATE (1 METHOD)
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_kegiatan' => 'required',
            'program_unggulan_bupati_id' => 'required|integer|exists:program_unggulan_bupati,id',
            'uraian_program_unggulan_bupati_id' => [
                'required',
                'integer',
                Rule::exists('uraian_program_unggulan_bupati', 'id')->where(function ($query) use ($request) {
                    $query->where('program_unggulan_bupati_id', $request->program_unggulan_bupati_id);
                }),
            ],
            'nama' => 'nullable',
            'nominalpagu' => 'nullable|numeric',
            'kecamatan' => 'required|string|max:255',
            'desa' => 'nullable|string|max:255',
            'lampiran' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx,xls,xlsx|max:5120',
        ]);

        $kegiatan = Kegiatan::findOrFail($request->id_kegiatan);
        $this->authorizeCompanyKegiatan($kegiatan);
        $aksiNama = $request->nama ?: $kegiatan->nama;
        $lampiran = null;
        $nominalPagu = $request->nominalpagu ?? 0;
        $realisasiUang = $request->filled('realisasi_uang') ? $request->realisasi_uang : $nominalPagu;

        if ($request->hasFile('lampiran')) {
            $lampiranDirectory = public_path('lampiran');

            if (! is_dir($lampiranDirectory)) {
                mkdir($lampiranDirectory, 0755, true);
            }

            $lampiran = Str::uuid()->toString() . '.' . $request->file('lampiran')->getClientOriginalExtension();
            $request->file('lampiran')->move($lampiranDirectory, $lampiran);
        }

        // jika ada id berarti update
        if ($request->id) {

            $aksi = Aksi::findOrFail($request->id);

            $statusVerifikasi = $aksi->status_verifikasi ?: 'disetujui';
            if (auth()->check() && auth()->user()->role === 'perusahaan') {
                $statusVerifikasi = 'menunggu';
            }

            $aksi->update([
                'program_unggulan_bupati_id' => $request->program_unggulan_bupati_id,
                'uraian_program_unggulan_bupati_id' => $request->uraian_program_unggulan_bupati_id,
                'nama' => $aksiNama,
                'target' => $request->target,
                'realisasi_fisik' => $request->realisasi_fisik,
                'realisasi_uang' => $realisasiUang,
                'nominalpagu' => $nominalPagu,
                'tanggal' => $request->tanggal,
                'kecamatan' => $request->kecamatan,
                'desa' => $request->desa,
                'idbidang' => $kegiatan->idbidang,
                'idperusahaan' => $kegiatan->idperusahaan,
                'output' => $request->output ?: $kegiatan->output,
                'deskripsi' => $request->deskripsi ?: $kegiatan->deskripsi,
                'lokasi' => $request->lokasi ?: $kegiatan->lokasi,
                'tahun' => $request->tahun ?: $kegiatan->tahun,
                'catatan' => $request->catatan ?: $kegiatan->catatan,
                'lampiran' => $lampiran ?: ($aksi->lampiran ?: '-'),
                'status' => $kegiatan->status ?: 'tayang',
                'status_verifikasi' => $statusVerifikasi,
            ]);

        } else {

            $statusVerifikasi = 'disetujui';
            if (auth()->check() && auth()->user()->role === 'perusahaan') {
                $statusVerifikasi = 'menunggu';
            }

            $aksi = Aksi::create([
                'id_kegiatan' => $request->id_kegiatan,
                'program_unggulan_bupati_id' => $request->program_unggulan_bupati_id,
                'uraian_program_unggulan_bupati_id' => $request->uraian_program_unggulan_bupati_id,
                'nama' => $aksiNama,
                'target' => $request->target,
                'realisasi_fisik' => $request->realisasi_fisik,
                'realisasi_uang' => $realisasiUang,
                'nominalpagu' => $nominalPagu,
                'tanggal' => $request->tanggal,
                'kecamatan' => $request->kecamatan,
                'desa' => $request->desa,
                'idbidang' => $kegiatan->idbidang,
                'idperusahaan' => $kegiatan->idperusahaan,
                'output' => $request->output ?: $kegiatan->output,
                'deskripsi' => $request->deskripsi ?: $kegiatan->deskripsi,
                'lokasi' => $request->lokasi ?: $kegiatan->lokasi,
                'tahun' => $request->tahun ?: $kegiatan->tahun,
                'catatan' => $request->catatan ?: $kegiatan->catatan,
                'lampiran' => $lampiran ?: '-',
                'status' => $kegiatan->status ?: 'tayang',
                'status_verifikasi' => $statusVerifikasi,
            ]);
        }

        // 🔥 Update Nominal Kegiatan Otomatis
        $this->recalculateNominal($request->id_kegiatan);

        return response()->json([
            'success' => true,
            'message' => 'Data aksi berhasil disimpan'
        ]);
    }

    /**
     * DELETE AKSI
     */
    public function destroy($id)
    {
        $aksi = Aksi::findOrFail($id);
        $kegiatanId = $aksi->id_kegiatan;
        $kegiatan = Kegiatan::findOrFail($kegiatanId);
        $this->authorizeCompanyKegiatan($kegiatan);

        $aksi->delete();

        // 🔥 Update Nominal Kegiatan setelah delete
        $this->recalculateNominal($kegiatanId);

        return response()->json([
            'success' => true,
            'message' => 'Data aksi berhasil dihapus'
        ]);
    }

    public function verify(Request $request, $id)
    {
        abort_unless(auth()->check() && auth()->user()->role === 'superadmin', 403);

        $validated = $request->validate([
            'status_verifikasi' => 'required|in:menunggu,disetujui,ditolak',
            'catatan_verifikasi' => 'nullable|string|max:1000',
        ]);

        $catatanVerifikasi = trim((string) ($validated['catatan_verifikasi'] ?? ''));

        if ($validated['status_verifikasi'] === 'ditolak' && $catatanVerifikasi === '') {
            if ($request->expectsJson()) {
                return response()->json([
                    'message' => 'Alasan penolakan wajib diisi saat status ditolak.',
                    'errors' => [
                        'catatan_verifikasi' => ['Alasan penolakan wajib diisi saat status ditolak.'],
                    ],
                ], 422);
            }

            return back()->withErrors([
                'catatan_verifikasi' => 'Alasan penolakan wajib diisi saat status ditolak.',
            ])->withInput();
        }

        $aksi = Aksi::findOrFail($id);
        $nilaiCatatan = null;
        if ($validated['status_verifikasi'] === 'ditolak') {
            $nilaiCatatan = $catatanVerifikasi;
        }

        $aksi->update([
            'status_verifikasi' => $validated['status_verifikasi'],
            'catatan_verifikasi' => $nilaiCatatan,
        ]);

        if (! $request->expectsJson()) {
            return back()->with('success', 'Status verifikasi aksi berhasil diperbarui.');
        }

        return response()->json([
            'success' => true,
            'message' => 'Status verifikasi aksi berhasil diperbarui.',
        ]);
    }

    /**
     * PRIVATE: RECALCULATE NOMINAL KEGIATAN
     */
    private function recalculateNominal($kegiatanId)
    {
        $total = Aksi::where('id_kegiatan', $kegiatanId)
            ->sum('nominalpagu');

        Kegiatan::where('id', $kegiatanId)
            ->update([
                'nominalpagu' => $total
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