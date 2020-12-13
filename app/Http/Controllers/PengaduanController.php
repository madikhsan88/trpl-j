<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pengaduan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function timeZone($location)
    {
        return date_default_timezone_set($location);
    }
    public function index()
    {
        $data = Pengaduan::orderBy('created_at', 'desc')->where('isDelete', 0)->where('id',Auth::user()->id)->get();
        // $tanggapan = \DB::table('tanggapan')->where('pengaduan_id', 1)->get();
        // dd($tanggapan);
        return view('pengaduan.index', compact('data'));
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
        $this->timeZone('Asia/Jakarta');
        $date = date("Y-m-d"); // 2017-02-01
        $pengaduan = new Pengaduan;
        $pengaduan->user_id    = Auth::user()->id;
        $pengaduan->date    = $date;
        $pengaduan->pengaduan    = $request->get('pengaduan');
        $pengaduan->gambar    = $request->get('gambar');
        if ($request->file('gambar')) {
            if ($pengaduan->gambar && file_exists(storage_path('app/public/' . $pengaduan->gambar))) {
                Storage::delete('public/' . $pengaduan->gambar);
            }
            $image_path = $request->file('gambar')->store('gambar_kendaraan', 'public');
            $pengaduan->gambar = $image_path;
        }
        // $pengaduan = Pengaduan::create([
        //     "user_id" => Auth::user()->id,
        //     "date" => $date,
        //     "pengaduan" => $request->input('pengaduan'),
        //     "gambar" => $request->input('gambar'),
        // ]);
        $pengaduan->isDelete = 0;
        $pengaduan->save();
        return redirect('/pengaduan');
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
        //
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
        //
    }

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
