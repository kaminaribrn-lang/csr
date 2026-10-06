<?php

namespace App\Http\Controllers;

use App\Models\Dasarhukum;
use App\Models\Bidangcsr;
use App\Models\Kegiatan;
use App\Models\Perusahaan;
use App\Models\Slider;
use App\Models\Informasi;
use App\Models\Berita;
use App\Models\ProgramUnggulanBupati;
use App\Models\Aksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WebController extends Controller
{
    public function welcome(){

        if (array_key_exists("tahun", $_GET)){

        } else {
            return redirect('/?tahun=2026');
            // return redirect('/?tahun='.date('Y'));
        }

        $bidangCsr = Bidangcsr::get();
        $slider = Slider::get();
        $dasarhukum = Dasarhukum::get();
        $tentang = Informasi::where('nama','=','tentang')->get();
        $tentang = $tentang[0];
        $nominalpagu = Kegiatan::where('status','=','tayang')->get()->sum('nominalpagu');
        $totalkegiatan = Kegiatan::where('status','=','tayang')->get()->count();
        $totalperusahaan = Perusahaan::where('status','=','diterima')->get()->count();
        
        $berita = Berita::select('id','headline','kategori','berita','gambar','tanggal','slug')->get();

        // $berita = json($berita);
        // $berita = json_encode($berita);
        // dd($bidangCsr);    

        return view('welcome', compact('bidangCsr', 'nominalpagu','totalkegiatan','totalperusahaan','dasarhukum','slider','tentang','berita'));
    }   
    
    public function getDetail($id)
    {
        // Mengambil data bidang beserta kegiatannya dan relasi perusahaan
        $bidang = BidangCsr::findOrFail($id);
        $kegiatan = Kegiatan::where('idbidang', $id)
                    ->with('perusahaan') // pastikan relasi ada di model
                    ->get();

        return response()->json([
            'nama_bidang' => $bidang->nama,
            'total_kegiatan' => $kegiatan->count(),
            'total_anggaran' => $kegiatan->sum('nominalpagu'),
            'kegiatan' => $kegiatan,
            'logo' => $bidang->logo // pastikan kolom logo ada di tabel bidang_csr
        ]);
    }

    public function home2(){

        if (array_key_exists("tahun", $_GET)){

        } else {
            return redirect('/?tahun=2026');
            // return redirect('/?tahun='.date('Y'));
        }

        $selectedYear = (string) request()->query('tahun', '2026');
        $kunjunganWaktu = now();
        DB::table('kunjungan')->insert([
            'created_at' => $kunjunganWaktu,
        ]);

        $kunjunganHari = DB::table('kunjungan')
            ->where('created_at', '>=', $kunjunganWaktu->copy()->startOfDay())
            ->where('created_at', '<', $kunjunganWaktu->copy()->addDay()->startOfDay())
            ->count();
        $kunjunganBulan = DB::table('kunjungan')
            ->where('created_at', '>=', $kunjunganWaktu->copy()->startOfMonth())
            ->where('created_at', '<', $kunjunganWaktu->copy()->addMonth()->startOfMonth())
            ->count();
        $kunjunganTahun = DB::table('kunjungan')
            ->where('created_at', '>=', $kunjunganWaktu->copy()->startOfYear())
            ->where('created_at', '<', $kunjunganWaktu->copy()->addYear()->startOfYear())
            ->count();
        $totalKunjungan = DB::table('kunjungan')->count();

        $bidangCsr = Bidangcsr::get();
        $slider = Slider::get();
        $dasarhukum = Dasarhukum::get();
        $tentang = Informasi::where('nama','=','tentang')->get();
        $tentang = $tentang[0];
        $nominalpagu = Kegiatan::where('status','=','tayang')->get()->sum('nominalpagu');
        $totalkegiatan = Kegiatan::where('status','=','tayang')->get()->count();
        $totalperusahaan = Perusahaan::where('status','=','diterima')->get()->count();
        $perusahaan = Perusahaan::withCount('kegiatans') // Akan menghasilkan kolom kegiatans_count
            ->withSum('kegiatans as total_pagu', 'nominalpagu') // Akan menghasilkan kolom total_pagu
            ->get();
        $perusahaanStatsByYear = Kegiatan::query()
            ->select('idperusahaan', 'tahun')
            ->selectRaw('COUNT(*) as kegiatan_count, SUM(nominalpagu) as total_pagu')
            ->groupBy('idperusahaan', 'tahun')
            ->get()
            ->groupBy('idperusahaan')
            ->map(function ($companyActivities) {
                return $companyActivities->keyBy('tahun')->map(function ($activity) {
                    return [
                        'count' => (int) $activity->kegiatan_count,
                        'total' => (float) $activity->total_pagu,
                    ];
                });
            });
        $perusahaanYears = Kegiatan::query()
            ->whereNotNull('tahun')
            ->where('tahun', '!=', '')
            ->distinct()
            ->orderByDesc('tahun')
            ->pluck('tahun');
        $datax = Kegiatan::join('perusahaan', 'kegiatan.idperusahaan', '=', 'perusahaan.id')
            ->join('bidangcsr', 'kegiatan.idbidang', '=', 'bidangcsr.id')
            ->leftJoin('aksi as ax', function ($join) {
                $join->on('ax.id_kegiatan', '=', 'kegiatan.id')
                    ->where('ax.status_verifikasi', '=', 'disetujui')
                    ->whereRaw("ax.id = (select max(a2.id) from aksi as a2 where a2.id_kegiatan = kegiatan.id and a2.status_verifikasi = 'disetujui')");
            })
            ->select(
                'kegiatan.*',
                'perusahaan.nama as namaPerusahaan',
                'bidangcsr.nama as namaBidang',
                DB::raw("COALESCE(ax.tanggal, DATE(kegiatan.created_at)) as waktuKegiatanAksi"),
                DB::raw("COALESCE(NULLIF(NULLIF(ax.lokasi, ''), '-'), NULLIF(NULLIF(kegiatan.lokasi, ''), '-'), '-') as lokasiAksi"),
                DB::raw("COALESCE(NULLIF(NULLIF(ax.kecamatan, ''), '-'), NULLIF(NULLIF(kegiatan.kecamatan, ''), '-'), '-') as kecamatanAksi"),
                DB::raw("COALESCE(NULLIF(NULLIF(ax.desa, ''), '-'), NULLIF(NULLIF(kegiatan.desa, ''), '-'), '-') as desaAksi")
            )
            ->get();

        $berita = Berita::select('id','headline','kategori','berita','gambar','tanggal','slug')->get();
        $programUnggulanBupati = ProgramUnggulanBupati::with('uraians')->get();
        $aksiProgram = Aksi::query()
            ->whereNotNull('program_unggulan_bupati_id')
            ->where('status_verifikasi', 'disetujui')
            ->get([
                'program_unggulan_bupati_id',
                'uraian_program_unggulan_bupati_id',
                'nominalpagu',
                'tahun',
                'tanggal',
            ]);

        $programNominalMap = [];
        $uraianNominalMap = [];
        $programUnggulanYears = [];

        foreach ($aksiProgram as $aksi) {
            $nominal = (float) ($aksi->nominalpagu ?? 0);
            $programId = (string) $aksi->program_unggulan_bupati_id;

            $year = null;
            if (!empty($aksi->tanggal)) {
                $year = substr((string) $aksi->tanggal, 0, 4);
            }
            if (!$year && !empty($aksi->tahun)) {
                $year = (string) $aksi->tahun;
            }

            if ($year) {
                $programUnggulanYears[$year] = true;
            }

            if (!isset($programNominalMap[$programId])) {
                $programNominalMap[$programId] = [
                    'all' => 0,
                    'years' => [],
                ];
            }

            $programNominalMap[$programId]['all'] += $nominal;

            if ($year) {
                $programNominalMap[$programId]['years'][$year] =
                    ($programNominalMap[$programId]['years'][$year] ?? 0) + $nominal;
            }

            if (!empty($aksi->uraian_program_unggulan_bupati_id)) {
                $uraianId = (string) $aksi->uraian_program_unggulan_bupati_id;

                if (!isset($uraianNominalMap[$uraianId])) {
                    $uraianNominalMap[$uraianId] = [
                        'all' => 0,
                        'years' => [],
                    ];
                }

                $uraianNominalMap[$uraianId]['all'] += $nominal;

                if ($year) {
                    $uraianNominalMap[$uraianId]['years'][$year] =
                        ($uraianNominalMap[$uraianId]['years'][$year] ?? 0) + $nominal;
                }
            }
        }

        $programUnggulanYears = array_keys($programUnggulanYears);
        sort($programUnggulanYears);

        $monthlyRealization = array_fill(1, 12, 0.0);
        $monthlyRealizationYears = [];

        $aksiRealisasi = Aksi::query()
            ->select('nominalpagu', 'tanggal', 'tahun', 'created_at')
            ->whereNotNull('nominalpagu')
            ->where('nominalpagu', '>', 0)
            ->where('status_verifikasi', 'disetujui')
            ->get();

        foreach ($aksiRealisasi as $aksi) {
            $year = null;
            $month = null;

            if (!empty($aksi->tanggal)) {
                $year = substr((string) $aksi->tanggal, 0, 4);
                $month = (int) substr((string) $aksi->tanggal, 5, 2);
            }

            if (!$year && !empty($aksi->tahun)) {
                $year = (string) $aksi->tahun;
            }

            if (!$year && !empty($aksi->created_at)) {
                $year = $aksi->created_at->format('Y');
            }

            if ($year) {
                $monthlyRealizationYears[$year] = true;
            }

            if (!$month && !empty($aksi->created_at)) {
                $month = (int) $aksi->created_at->format('m');
            }

            if ($year !== $selectedYear || !$month || $month < 1 || $month > 12) {
                continue;
            }

            $monthlyRealization[$month] += (float) $aksi->nominalpagu;
        }

        $monthlyCumulativeRealization = [];
        $runningTotal = 0.0;

        for ($m = 1; $m <= 12; $m++) {
            $runningTotal += $monthlyRealization[$m] ?? 0;
            $monthlyCumulativeRealization[] = $runningTotal;
        }

        $monthlyRealizationYears = array_keys($monthlyRealizationYears);
        $monthlyRealizationYears = array_map('strval', $monthlyRealizationYears);
        $monthlyRealizationYears = array_unique(array_merge($monthlyRealizationYears, ['2026', '2026']));
        sort($monthlyRealizationYears);

        $monthlyLabels = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
        // dd($berita);

        

        return view('home2', compact(
            'datax',
            'bidangCsr',
            'perusahaan',
            'perusahaanStatsByYear',
            'perusahaanYears',
            'nominalpagu',
            'totalkegiatan',
            'totalperusahaan',
            'dasarhukum',
            'slider',
            'tentang',
            'berita',
            'programUnggulanBupati',
            'programNominalMap',
            'uraianNominalMap',
            'programUnggulanYears',
            'selectedYear',
            'monthlyLabels',
            'monthlyCumulativeRealization',
            'monthlyRealizationYears',
            'kunjunganHari',
            'kunjunganBulan',
            'kunjunganTahun',
            'totalKunjungan'
        ));
    }

    public function beritas(){
        // Get all published news, ordered by latest
        $berita = Berita::where('status', 'publish')
                    ->orderBy('tanggal', 'desc')
                    ->get();

        // Get most visited news
        $beritaTerpopuler = Berita::where('status', 'publish')
                            ->orderBy('dilihat', 'desc')
                            ->limit(5)
                            ->get();

        return view('beritas', compact('berita', 'beritaTerpopuler'));
    }

    
}
