<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kendaraan;
use App\Pemesanan;
use App\Rental;
use App\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Question\Question;

class KendaraanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $kendaraans = Kendaraan::paginate(10);
        return view('kendaraan.index', [
            'kendaraans' => $kendaraans
        ]);

        // if (auth()->user()->hasAnyRole('rental')){
        //     $kendaraans = Kendaraan::where('rental_id',auth()->user()->id)->paginate(10);
        // }
        
        // return view('admin.kendaraan.index', [
        //     'kendaraans' => $kendaraans
        // ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $suser = Auth::user()->rental->id;
        
        return view('kendaraan.create',['suser'=>$suser]);
        
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        // dd($request->all());
        $request->validate([
            'jenis_kendaraan' => 'required',
            'merk_kendaraan' => 'required',
            'tahun_kendaraan' => 'required',
            'bahan_bakar' => 'required',
            'nopol'       => 'required',
            // 'mulai_iklan' => 'required',
            // 'akhir_iklan' => 'required',
            // 'harga_iklan' => 'required',
            'harga_sewa'  => 'required',
            'gambar'      => 'required',
            'status_iklan'=> 'required',
            'rental_id'   => 'required'
            
        ]);

        // dd($request->all());
        $kendaraan = new \App\Kendaraan;
        $kendaraan->jenis_kendaraan    = $request->get('jenis_kendaraan');
        $kendaraan->merk_kendaraan    = $request->get('merk_kendaraan');
        $kendaraan->tahun_kendaraan    = $request->get('tahun_kendaraan');
        $kendaraan->bahan_bakar    = $request->get('bahan_bakar');
        $kendaraan->nopol          = $request->get('nopol');
        // $kendaraan->mulai_iklan    = $request->get('mulai_iklan');
        // $kendaraan->akhir_iklan    = $request->get('akhir_iklan');
        // $kendaraan->harga_iklan    = $request->get('harga_iklan');
        $kendaraan->harga_sewa     = $request->get('harga_sewa');
        $kendaraan->status         = 'diajukan';
        $kendaraan->status_iklan   = $request->get('status_iklan');
        $kendaraan->gambar         = $request->get('gambar');  
        $kendaraan->rental_id      = $request->get('rental_id');
        if ($request->file('gambar')) {
            if ($kendaraan->gambar && file_exists(storage_path('app/public/'. $kendaraan->gambar))){
                Storage::delete('public/'.$kendaraan->gambar);
            }
            $image_path = $request->file('gambar')->store('gambar_kendaraan', 'public');
            $kendaraan->gambar = $image_path;
        }   
        $kendaraan->save();

        $pemesanan=new Pemesanan();
        $pemesanan->id_user = Auth::user()->id;
        $pemesanan->id_kendaraan = $kendaraan->id;
        $pemesanan->save();
        


        // $custom = Role::where('nama', 'customer')->first();
        return redirect('/kendaraan')->with('status', 'Data Kendaraan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kendaraan = Kendaraan::findOrFail($id);
        return view('kendaraan.edit', [
            'kendaraan' => $kendaraan
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {        
        // $request->validate([
        //     'jenis_mobil' => 'required',
        //     'tahun_mobil' => 'required',
        //     'bahan_bakar' => 'required',
        //     'nopol'       => 'required',
            // 'mulai_iklan' => 'required',
            // 'akhir_iklan' => 'required',
            // 'harga_iklan' => 'required',
            // 'harga_sewa'  => 'required',
            // 'gambar'      => 'requered',
            // 'status'      => 'required',
            
        // ]);


        $kendaraan = \App\Kendaraan::find($id);
        $kendaraan->jenis_kendaraan   = $request->get('jenis_kendaraan');
        $kendaraan->merk_kendaraan = $request->get('merk_kendaraan');
        $kendaraan->tahun_kendaraan= $request->get('tahun_kendaraan');
        $kendaraan->bahan_bakar    = $request->get('bahan_bakar');
        $kendaraan->nopol          = $request->get('nopol');
        // $kendaraan->mulai_iklan    = $request->get('mulai_iklan');
        // $kendaraan->akhir_iklan    = $request->get('akhir_iklan');
        // $kendaraan->harga_iklan    = $request->get('harga_iklan');
        $kendaraan->harga_sewa     = $request->get('harga_sewa');
            if ($request->file('gambar')) {
                if ($kendaraan->gambar && file_exists(storage_path('app/public/'. $kendaraan->gambar))){
                    Storage::delete('public/'.$kendaraan->gambar);
                }
                $image_path = $request->file('gambar')->store('gambar_kendaraan', 'public');
                $kendaraan->gambar = $image_path;
            }  
        // $kendaraan->status_iklan = $request->get('status_iklan');  
        $kendaraan->save();
        return redirect('/kendaraan')->with('status', 'Data Kendaraan berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Kendaraan::destroy($id);
        return redirect('/kendaraan')->with('status', 'Data Kendaraan telah dihapus');
    }

    public function verifikasi($id)
    {
        $data = Kendaraan::findOrFail($id);
        $data->status= 'diterima';
        $data->save();
        return redirect('/kendaraan')->with('status', 'Data telah diperbarui');
    }

    public function penolakan($id)
    {
        
        $data = Kendaraan::findOrFail($id);
        $data->status= 'ditolak';
        $data->save();
        return redirect('/kendaraan')->with('status', 'Data telah diperbarui');
    }

    public function detail($id)
    {
        $data = Kendaraan::findOrFail($id);
        return view('kendaraan.detail', compact('data'));
    }
}
