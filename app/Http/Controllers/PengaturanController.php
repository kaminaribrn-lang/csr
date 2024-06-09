<?php

namespace App\Http\Controllers;

use App\Models\Dasarhukum;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Informasi;
use App\Models\User;


class PengaturanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pengaturan');
    }

    public function pengaturan(Request $request, $id)
    {
        $i =  last(request()->segments()) ;
        $m = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        // dd ($request->post());
        if($i == "slider"){
            $datas = Slider::get();
            return view('pengaturan.slider', compact('datas'));
        } else if($i == "tentang-csr"){
            $datas = Informasi::get();
            // dd($datas);
            $data = $datas[0];
            return view('pengaturan.tentangcsr', compact('data'));
        } else if($i == "dasar-hukum"){
            $datas = Dasarhukum::get();
            // dd($datas);
            return view('pengaturan.dasarHukum', compact('datas'));
        } else if($i == "kata-sandi"){
            return view('pengaturan.kataSandi');
        } else if($i == "tambah-slider"){
            return view('pengaturan.tambahSlider');
        } else if($i == "tambah-dasar-hukum"){
            return view('pengaturan.tambahDasarHukum');
        } else if($i == "create-slider"){
            return ('pengaturan');
        }


        if($i == "update"){
            if(str_contains($m, 'tentang-csr')){
                // dd($id);
            }
        }
    }


    public function ubah(Request $request, $id){
        $i = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        // dd($request->post());
        // dd($i);

        if(str_contains($i, 'tentang-csr')){
            $ubah = Informasi::findOrFail($request->id);

            $ubah->update([
                'id' => $request->id,
                'deskripsi' => $request->deskripsi
            ]);

            return redirect('pengaturan');
        } else if(str_contains($i, 'hapus-slide/update')){
            // dd($request->post());

            $slider = Slider::findOrFail($request->id);

            $slider->delete();

            return redirect('pengaturan/slider');
        } else if(str_contains($i, 'slider')){
            // dd($request->post());
            $sampul = time() . $request->sampul->getClientOriginalExtension();
            $request->sampul->move('slider', $sampul);

            $tambah = Slider::create([
                'slider'=>$sampul
            ]);

            return redirect('/pengaturan/slider');
        } else if(str_contains($i, 'tambah-dasar-hukum')){
            // dd($request->post());
            // dd($i);

            $lampiran = time() . $request->lampiran->getClientOriginalExtension();
            $request->lampiran->move('lampiran', $lampiran);

            $tambah = Dasarhukum::create([
                'nama'=>$request->nama,
                'file'=>$lampiran
            ]);

            return redirect('/pengaturan/dasar-hukum');
        } else if(str_contains($i, 'ubah-dasar-hukum')){
            $datas = Dasarhukum::where('id','=',$request->id)->get();
            $data = $datas[0];
            return view('pengaturan.ubahDasarHukum', compact('data'));
        } else if(str_contains($i, 'update-dasar-hukum')){
            $ubah = Dasarhukum::findOrFail($request->id);
            // dd($request->post());

            if($request->has('lampiran')){
                // dd('ada lampiran');

                $lampiran = time() . $request->lampiran->getClientOriginalExtension();
                $request->lampiran->move('lampiran', $lampiran);

                $ubah->update([
                    'nama'=>$request->nama,
                    'file'=>$lampiran
                ]);
            } else {
                // dd('tidak ada lampiran');

                $ubah->update([
                    'nama'=>$request->nama
                ]);
            }

            return redirect('/pengaturan/dasar-hukum');
        } else if(str_contains($i, 'hapus-dasar-hukum/update')){
            // dd($request->post());

            $slider = Dasarhukum::findOrFail($request->id);

            $slider->delete();

            return redirect('pengaturan/dasar-hukum');
        } else if(str_contains($i, '/kata-sandi/update')){
            $ubah = User::findOrFail(\Auth::user()->id);

            // dd($request->password);

            $ubah->update([
                'password'=>bcrypt($request->password),
            ]);

            return redirect('/pengaturan');
        }

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
    public function show(Pengaturan $pengaturan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pengaturan $pengaturan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id)
    {
        dd($id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pengaturan $pengaturan)
    {
        //
    }
}
