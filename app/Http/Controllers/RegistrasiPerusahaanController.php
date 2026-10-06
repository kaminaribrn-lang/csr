<?php

namespace App\Http\Controllers;

use App\Models\Perusahaan;
use App\Models\Registrasiperusahaan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
            'status' => 'registrasi',
            'email' => $email,
            'password' => $defaultPassword,
            ]);

        if ($tambah) {
            $this->syncCompanyUser($tambah);
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

    private function generateCompanyEmail(string $companyName): string
    {
        $normalizedName = Str::of($companyName)
            ->lower()
            ->replaceMatches('/\b(pt|cv)\b\.?/i', '')
            ->replaceMatches('/[^a-z0-9]+/i', '')
            ->trim();

        return ($normalizedName->isNotEmpty() ? $normalizedName : 'perusahaan') . '@gmail.com';
    }

    private function syncCompanyUser(Perusahaan $company): void
    {
        User::updateOrCreate(
            ['email' => $company->email],
            [
                'name' => $company->nama,
                'email' => $company->email,
                'role' => 'perusahaan',
                'password' => $company->password,
            ]
        );
    }
}
