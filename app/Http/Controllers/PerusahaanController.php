<?php

namespace App\Http\Controllers;

use App\Models\Perusahaan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
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
        $email = $this->generateCompanyEmail($request->nama);
        $defaultPassword = bcrypt('password');

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
            'email' => $email,
            'password' => $defaultPassword,
            ]);

        if ($tambah) {
            $this->syncCompanyUser($tambah);
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
        $originalEmail = $ubah->email;
        $email = $this->generateCompanyEmail($request->nama);
        $defaultPassword = bcrypt('password');

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
                'email' => $email,
                'password' => $defaultPassword,
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
                'email' => $email,
                'password' => $defaultPassword,
            ]);
        }

        $this->syncCompanyUser($ubah, $originalEmail);

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

    private function generateCompanyEmail(string $companyName): string
    {
        $normalizedName = Str::of($companyName)
            ->lower()
            ->replaceMatches('/\b(pt|cv)\b\.?/i', '')
            ->replaceMatches('/[^a-z0-9]+/i', '')
            ->trim();

        return ($normalizedName->isNotEmpty() ? $normalizedName : 'perusahaan') . '@gmail.com';
    }

    private function syncCompanyUser(Perusahaan $company, ?string $originalEmail = null): void
    {
        $lookupEmail = $originalEmail ?: $company->email;

        User::updateOrCreate(
            ['email' => $lookupEmail],
            [
                'name' => $company->nama,
                'email' => $company->email,
                'role' => 'perusahaan',
                'password' => $company->password,
            ]
        );
    }
}
