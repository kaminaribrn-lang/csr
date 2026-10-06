<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    public function index()
    {
        $data = Berita::orderBy('id', 'desc')->get();
        // dd($data);
        return view('berita.index', compact('data'));
    }

    public function create()
    {
        return view('berita.create');
    }

    public function store(Request $request)
    {
        try {

            $request->validate([
                'headline' => 'required',
                'tanggal'  => 'required',
                'kategori' => 'required',
                'status'   => 'required',
                'berita'   => 'required',
                'gambar'   => 'nullable|image|max:2048'
            ]);

            $gambar = null;
            if ($request->hasFile('gambar')) {
                $gambar = $request->file('gambar')
                    ->store('berita', 'public');
            }

            Berita::create([
                'headline' => $request->headline,
                'slug'     => Str::slug($request->headline),
                'tanggal'  => $request->tanggal,
                'kategori' => $request->kategori,
                'hastag'   => $request->hastag,
                'status'   => $request->status,
                'berita'   => $request->berita,
                'gambar'   => $gambar,
                'user_id'  => auth()->id() ?? 1, // 🔥 penting
            ]);

            return response()->json([
                'success' => true
            ]);

        } catch (\Throwable $e) {

            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);

        }
    }

    public function edit($id)
    {
        return response()->json(
            Berita::findOrFail($id)
        );
    }

    public function update(Request $request, $id)
{
    try {

        $berita = Berita::findOrFail($id);

        $request->validate([
            'headline' => 'required',
            'tanggal'  => 'required',
            'kategori' => 'required',
            'status'   => 'required',
            'berita'   => 'required',
            'gambar'   => 'nullable|image|max:2048'
        ]);

        // handle gambar
        if ($request->hasFile('gambar')) {

            // hapus gambar lama
            if ($berita->gambar && Storage::disk('public')->exists($berita->gambar)) {
                Storage::disk('public')->delete($berita->gambar);
            }

            $berita->gambar = $request->file('gambar')
                ->store('berita', 'public');
        }

        // update data
        $berita->update([
            'headline' => $request->headline,
            'slug'     => Str::slug($request->headline),
            'tanggal'  => $request->tanggal,
            'kategori' => $request->kategori,
            'hastag'   => $request->hastag,
            'status'   => $request->status,
            'berita'   => $request->berita,
        ]);

        return response()->json([
            'success' => true
        ]);

    } catch (\Throwable $e) {

        return response()->json([
            'success' => false,
            'message' => $e->getMessage()
        ], 500);
    }
}

    public function destroy($id)
    {
        Berita::findOrFail($id)->delete();
        return back();
    }

    // 🔥 VIEW PUBLIK BERITA
    public function show($slug)
    {
        $berita = Berita::where('slug', $slug)->firstOrFail();
        // Increment view count
        $berita->increment('dilihat');
        $berita->refresh();

        $beritaTerpopuler = Berita::where('status', 'publish')
            ->where('id', '!=', $berita->id)
            ->orderBy('dilihat', 'desc')
            ->limit(5)
            ->get();

        return view('news.show', compact('berita', 'beritaTerpopuler'));
    }

    public function data()
    {
        return response()->json(Berita::all());
    }
}