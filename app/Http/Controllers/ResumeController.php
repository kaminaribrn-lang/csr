<?php

namespace App\Http\Controllers;

use App\Models\Bidangcsr;
use App\Models\Kegiatan;
use App\Models\Perusahaan;
use App\Models\ProgramUnggulanBupati;
use App\Models\Resume;
use App\Models\UraianProgramUnggulanBupati;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ResumeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kegiatanCount = $this->buildKegiatanQuery()->count();

        $perusahaanCount = $this->buildPerusahaanQuery()->count();

        $bidangCount = Bidangcsr::query()->count();
        $programPrioritasCount = ProgramUnggulanBupati::query()->count();
        $uraianProgramCount = UraianProgramUnggulanBupati::query()->count();

        return view('resume', compact(
            'kegiatanCount',
            'perusahaanCount',
            'bidangCount',
            'programPrioritasCount',
            'uraianProgramCount'
        ));
    }

    public function kegiatan()
    {
        return $this->showSection('kegiatan');
    }

    public function perusahaan()
    {
        return $this->showSection('perusahaan');
    }

    public function bidang()
    {
        return $this->showSection('bidang');
    }

    public function programPrioritas()
    {
        return $this->showSection('program-prioritas');
    }

    public function exportExcel(string $jenis)
    {
        $payload = $this->resolveExportPayload($jenis);

        if (! class_exists('ZipArchive')) {
            return response()->streamDownload(function () use ($payload) {
                $handle = fopen('php://output', 'w');

                fputcsv($handle, $payload['headers']);

                foreach ($payload['rows'] as $row) {
                    fputcsv($handle, $row);
                }

                fclose($handle);
            }, 'resume_' . $payload['slug'] . '_' . now()->format('Ymd_His') . '.csv', [
                'Content-Type' => 'text/csv; charset=UTF-8',
            ]);
        }

        $filename = 'resume_' . $payload['slug'] . '_' . now()->format('Ymd_His') . '.xlsx';
        $tempPath = storage_path('app/temp/' . $filename);

        if (! is_dir(dirname($tempPath))) {
            mkdir(dirname($tempPath), 0755, true);
        }

        $rows = array_merge([$payload['headers']], $payload['rows']);
        $this->buildNativeXlsx($tempPath, $rows);

        return response()->download($tempPath, $filename)->deleteFileAfterSend(true);
    }

    public function exportPdf(string $jenis)
    {
        $payload = $this->resolveExportPayload($jenis);

        return view('resume.export-print', [
            'title' => $payload['title'],
            'headers' => $payload['headers'],
            'rows' => $payload['rows'],
            'printedAt' => now()->format('d-m-Y H:i'),
        ]);
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Resume $resume)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Resume $resume)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Resume $resume)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Resume $resume)
    {
        //
    }

    private function resolveExportPayload(string $jenis): array
    {
        if ($jenis === 'kegiatan') {
            $datas = $this->buildKegiatanQuery()->get();

            $rows = $datas->map(function ($item) {
                return [
                    $item->nama,
                    $item->namaPerusahaan,
                    $item->namaBidang,
                    $item->lokasi,
                    $item->tahun,
                    (float) ($item->nominalpagu ?? 0),
                    $item->status === 'tayang' ? 'Tayang' : 'Tidak Tayang',
                ];
            })->all();

            return [
                'slug' => 'kegiatan',
                'title' => 'Resume Kegiatan',
                'headers' => ['Nama', 'Perusahaan', 'Bidang', 'Lokasi', 'Tahun', 'Pagu', 'Status'],
                'rows' => $rows,
            ];
        }

        if ($jenis === 'perusahaan') {
            $datas = $this->buildPerusahaanQuery()
                ->get(['nama', 'direktur', 'kecamatan', 'website', 'nomorhp']);

            $rows = $datas->map(function ($item) {
                return [
                    $item->nama,
                    $item->direktur,
                    $item->kecamatan,
                    $item->website,
                    $item->nomorhp,
                ];
            })->all();

            return [
                'slug' => 'perusahaan',
                'title' => 'Resume Perusahaan',
                'headers' => ['Nama', 'Direktur', 'Kecamatan', 'Website', 'Nomor HP'],
                'rows' => $rows,
            ];
        }

        if ($jenis === 'bidang') {
            $datas = Bidangcsr::query()->get(['nama', 'deskripsi']);

            $rows = $datas->map(function ($item) {
                return [
                    $item->nama,
                    $item->deskripsi,
                ];
            })->all();

            return [
                'slug' => 'bidang',
                'title' => 'Resume Bidang CSR',
                'headers' => ['Nama', 'Deskripsi'],
                'rows' => $rows,
            ];
        }

        if ($jenis === 'program-prioritas') {
            $datas = $this->buildProgramPrioritasQuery()->get();

            $rows = $datas->map(function ($item) {
                return [
                    $item->program,
                    $item->uraian,
                    (int) ($item->jumlah_aksi ?? 0),
                    (float) ($item->total_nominal ?? 0),
                ];
            })->all();

            return [
                'slug' => 'program_prioritas',
                'title' => 'Resume Program Prioritas - Uraian',
                'headers' => ['Program Prioritas', 'Uraian', 'Jumlah Aksi Disetujui', 'Total Nominal Disetujui'],
                'rows' => $rows,
            ];
        }

        abort(404);
    }

    private function showSection(string $jenis)
    {
        $payload = $this->resolveExportPayload($jenis);

        return view('resume.section', [
            'jenis' => $jenis,
            'title' => $payload['title'],
            'headers' => $payload['headers'],
            'rows' => $payload['rows'],
        ]);
    }

    private function buildKegiatanQuery()
    {
        $query = Kegiatan::query()
            ->join('perusahaan', 'kegiatan.idperusahaan', '=', 'perusahaan.id')
            ->join('bidangcsr', 'kegiatan.idbidang', '=', 'bidangcsr.id')
            ->select('kegiatan.*', 'perusahaan.nama as namaPerusahaan', 'bidangcsr.nama as namaBidang');

        if (auth()->check() && auth()->user()->role === 'perusahaan') {
            $companyId = DB::table('perusahaan')
                ->where('email', auth()->user()->email)
                ->value('id');

            if ($companyId) {
                $query->where('kegiatan.idperusahaan', $companyId);
            }
        }

        return $query;
    }

    private function buildProgramPrioritasQuery()
    {
        $query = DB::table('program_unggulan_bupati as p')
            ->join('uraian_program_unggulan_bupati as u', 'u.program_unggulan_bupati_id', '=', 'p.id')
            ->leftJoin('aksi as a', function ($join) {
                $join->on('a.uraian_program_unggulan_bupati_id', '=', 'u.id')
                    ->where('a.status_verifikasi', '=', 'disetujui');
            })
            ->select(
                'p.nama as program',
                'u.uraian as uraian',
                DB::raw('COUNT(a.id) as jumlah_aksi'),
                DB::raw('COALESCE(SUM(a.nominalpagu), 0) as total_nominal')
            )
            ->groupBy('p.id', 'p.nama', 'u.id', 'u.uraian')
            ->orderBy('p.nama')
            ->orderBy('u.uraian');

        if (auth()->check() && auth()->user()->role === 'perusahaan') {
            $companyId = DB::table('perusahaan')
                ->where('email', auth()->user()->email)
                ->value('id');

            if ($companyId) {
                $query->where(function ($sub) use ($companyId) {
                    $sub->whereNull('a.id')
                        ->orWhere('a.idperusahaan', $companyId);
                });
            }
        }

        return $query;
    }

    private function buildPerusahaanQuery()
    {
        $query = Perusahaan::query();

        if (auth()->check() && auth()->user()->role === 'perusahaan') {
            $companyId = DB::table('perusahaan')
                ->where('email', auth()->user()->email)
                ->value('id');

            if ($companyId) {
                $query->where('id', $companyId);
            }
        }

        return $query;
    }

    private function buildNativeXlsx(string $filePath, array $rows): void
    {
        $sheetRows = '';

        foreach ($rows as $rowIndex => $row) {
            $excelRow = $rowIndex + 1;
            $sheetRows .= '<row r="' . $excelRow . '">';

            foreach ($row as $colIndex => $value) {
                $column = $this->excelColumnName($colIndex + 1);
                $cellRef = $column . $excelRow;

                if ($rowIndex > 0 && (is_int($value) || is_float($value))) {
                    $sheetRows .= '<c r="' . $cellRef . '"><v>' . (float) $value . '</v></c>';
                    continue;
                }

                $text = $this->xmlEscape((string) $value);
                $sheetRows .= '<c r="' . $cellRef . '" t="inlineStr"><is><t>' . $text . '</t></is></c>';
            }

            $sheetRows .= '</row>';
        }

        $sheetXml = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>'
            . '<worksheet xmlns="http://schemas.openxmlformats.org/spreadsheetml/2006/main">'
            . '<sheetData>' . $sheetRows . '</sheetData>'
            . '</worksheet>';

        $contentTypesXml = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>'
            . '<Types xmlns="http://schemas.openxmlformats.org/package/2006/content-types">'
            . '<Default Extension="rels" ContentType="application/vnd.openxmlformats-package.relationships+xml"/>'
            . '<Default Extension="xml" ContentType="application/xml"/>'
            . '<Override PartName="/xl/workbook.xml" ContentType="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet.main+xml"/>'
            . '<Override PartName="/xl/worksheets/sheet1.xml" ContentType="application/vnd.openxmlformats-officedocument.spreadsheetml.worksheet+xml"/>'
            . '<Override PartName="/xl/styles.xml" ContentType="application/vnd.openxmlformats-officedocument.spreadsheetml.styles+xml"/>'
            . '</Types>';

        $rootRelsXml = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>'
            . '<Relationships xmlns="http://schemas.openxmlformats.org/package/2006/relationships">'
            . '<Relationship Id="rId1" Type="http://schemas.openxmlformats.org/officeDocument/2006/relationships/officeDocument" Target="xl/workbook.xml"/>'
            . '</Relationships>';

        $workbookXml = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>'
            . '<workbook xmlns="http://schemas.openxmlformats.org/spreadsheetml/2006/main" xmlns:r="http://schemas.openxmlformats.org/officeDocument/2006/relationships">'
            . '<sheets><sheet name="Resume" sheetId="1" r:id="rId1"/></sheets>'
            . '</workbook>';

        $workbookRelsXml = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>'
            . '<Relationships xmlns="http://schemas.openxmlformats.org/package/2006/relationships">'
            . '<Relationship Id="rId1" Type="http://schemas.openxmlformats.org/officeDocument/2006/relationships/worksheet" Target="worksheets/sheet1.xml"/>'
            . '<Relationship Id="rId2" Type="http://schemas.openxmlformats.org/officeDocument/2006/relationships/styles" Target="styles.xml"/>'
            . '</Relationships>';

        $stylesXml = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>'
            . '<styleSheet xmlns="http://schemas.openxmlformats.org/spreadsheetml/2006/main">'
            . '<fonts count="1"><font><sz val="11"/><name val="Calibri"/></font></fonts>'
            . '<fills count="1"><fill><patternFill patternType="none"/></fill></fills>'
            . '<borders count="1"><border><left/><right/><top/><bottom/><diagonal/></border></borders>'
            . '<cellStyleXfs count="1"><xf/></cellStyleXfs>'
            . '<cellXfs count="1"><xf/></cellXfs>'
            . '</styleSheet>';

        $zip = new \ZipArchive();
        $zip->open($filePath, \ZipArchive::CREATE | \ZipArchive::OVERWRITE);
        $zip->addFromString('[Content_Types].xml', $contentTypesXml);
        $zip->addFromString('_rels/.rels', $rootRelsXml);
        $zip->addFromString('xl/workbook.xml', $workbookXml);
        $zip->addFromString('xl/_rels/workbook.xml.rels', $workbookRelsXml);
        $zip->addFromString('xl/worksheets/sheet1.xml', $sheetXml);
        $zip->addFromString('xl/styles.xml', $stylesXml);
        $zip->close();
    }

    private function excelColumnName(int $index): string
    {
        $name = '';

        while ($index > 0) {
            $index--;
            $name = chr(65 + ($index % 26)) . $name;
            $index = intdiv($index, 26);
        }

        return $name;
    }

    private function xmlEscape(string $value): string
    {
        return htmlspecialchars($value, ENT_QUOTES | ENT_XML1, 'UTF-8');
    }
}
