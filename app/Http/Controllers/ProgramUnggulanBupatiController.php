<?php

namespace App\Http\Controllers;

use App\Models\ProgramUnggulanBupati;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProgramUnggulanBupatiController extends Controller
{
    public function index()
    {
        $datas = ProgramUnggulanBupati::with('uraians')->latest()->get();

        return view('programUnggulanBupati.index', compact('datas'));
    }

    public function create()
    {
        return view('programUnggulanBupati.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'uraian' => 'required|array|min:1',
            'uraian.*' => 'required|string',
        ]);

        DB::transaction(function () use ($validated) {
            $program = ProgramUnggulanBupati::create([
                'nama' => $validated['nama'],
            ]);

            foreach ($validated['uraian'] as $uraian) {
                $program->uraians()->create([
                    'uraian' => $uraian,
                ]);
            }
        });

        return redirect('/program-unggulan-bupati');
    }

    public function show(ProgramUnggulanBupati $programUnggulanBupati)
    {
        //
    }

    public function edit($id)
    {
        $data = ProgramUnggulanBupati::with('uraians')->findOrFail($id);

        return view('programUnggulanBupati.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'uraian' => 'required|array|min:1',
            'uraian.*' => 'required|string',
        ]);

        $program = ProgramUnggulanBupati::with('uraians')->findOrFail($id);

        DB::transaction(function () use ($program, $validated) {
            $program->update([
                'nama' => $validated['nama'],
            ]);

            $program->uraians()->delete();

            foreach ($validated['uraian'] as $uraian) {
                $program->uraians()->create([
                    'uraian' => $uraian,
                ]);
            }
        });

        return redirect('/program-unggulan-bupati');
    }

    public function destroy($id)
    {
        $delete = ProgramUnggulanBupati::findOrFail($id);
        $delete->delete();

        return redirect('/program-unggulan-bupati');
    }
}