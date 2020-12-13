<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pemesanan;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Role;
use App\User;

class PemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pemesanan = Pemesanan::all();
        // dd($pemesanan);

        return view('pemesanan.index', compact('pemesanan'));
        // $pemesanans = Pemesanan::paginate(10);
        // return view('admin.pemesanan.index', [
        //     'pemesanans' => $pemesanans
        // ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pemesanan = Pemesanan::findOrFail($id);
        return view('pemesanan.pesan', [
            'pemesanan' => $pemesanan
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
        //     'jenis_kendaraan' => 'required',
        //     'merk_kendaraan' => 'required',
        //     'mulai_iklan' => 'required',
        //     'akhir_iklan' => 'required',
        //     'harga_iklan' => 'required',
        //     'bukti'       => 'requered',
        //     'status'      => 'required'

        // ]);

        $pemesanan = \App\Pemesanan::find($id);
        // $pemesanan->jenis_kendaraan   = $request->get('jenis_kendaraan');
        // $pemesanan->merk_kendaraan = $request->get('merk_kendaraan');
        $pemesanan->mulai_iklan    = $request->get('mulai_iklan');
        $pemesanan->akhir_iklan    = $request->get('akhir_iklan');
        $pemesanan->harga_iklan    = $request->get('harga_iklan');
        $pemesanan->bukti    = $request->get('bukti');
        // dd($request->file('bukti'));
        if ($request->file('bukti')) {
            if ($pemesanan->bukti && file_exists(storage_path('app/public/'. $pemesanan->bukti))){
                Storage::delete('public/'.$pemesanan->bukti);
            }
            $image_path = $request->file('bukti')->store('gambar_kendaraan', 'public');
            $pemesanan->bukti = $image_path;
        }
        $pemesanan->status         = 'belum diterima';
        $pemesanan->save();
        return redirect('/pemesanan')->with('status', 'Data Kendaraan berhasil diperbarui');
    }

    public function terima($id)
    {
        $data = Pemesanan::findOrFail($id);
        $data->status= 'diterima';
        $data->save();
        return redirect('/pemesanan')->with('status', 'Data telah diperbarui');
    }

    public function tolak($id)
    {
        
        $data = Pemesanan::findOrFail($id);
        $data->status= 'ditolak';
        $data->save();
        return redirect('/pemesanan')->with('status', 'Data telah diperbarui');
    }
    // public function detail($id)
    // {
    //     $data = Pemesanan::findOrFail($id);
    //     return view('admin.pemesanan.detail', compact('data'));
    // }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
