<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rental;
use App\Role;
use App\User;
use Illuminate\Support\Facades\Hash;

class RentalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rentals = Rental::paginate(10);
        return view('rental.index', [
            'rentals' => $rentals
        ]);
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
        $request->validate([
            'nama_lengkap' => 'required',
            'alamat' => 'required',
            'nik' => 'required',
            'email' => 'required',
            'password' => 'required',
            'hp' => 'required',
            
        ]);

        $time = now()->format('Y-m-d H:i:s');
        $user = new \App\User;
        $user->name = $request->get('nama_lengkap');
        $user->email = $request->get('email');
        $user->password = Hash::make($request->get('password'));
        $user->created_at = $time;
        $user->save();

        $pengguna = User::where('created_at', $time)->first();

        $rental = new \App\Rental;
        $rental->nama_lengkap    = $request->get('nama_lengkap');
        $rental->alamat          = $request->get('alamat');
        $rental->nik             = $request->get('nik');
        $rental->hp              = $request->get('hp');
        $rental->user_id         = $pengguna->id;
        $rental->save();

        $perental = Role::where('nama', 'rental')->first();
        $user->roles()->attach($perental);
        return redirect('/rental')->with('status', 'Data Rental berhasil ditambahkan');
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
        $rental = Rental::findOrFail($id);
        return view('rental.edit', [
            'rental' => $rental
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
        {        
            $request->validate([
                'nama_lengkap' => 'required',
                'alamat'       => 'required',
                'nik'          => 'required',
                'hp'           => 'required', 
            ]);
    
    
            $rental = \App\Rental::find($id);
            $rental->nama_lengkap   = $request->get('nama_lengkap');
            $rental->alamat         = $request->get('alamat');
            $rental->nik            = $request->get('nik');
            $rental->hp             = $request->get('hp'); 
            $rental->save();
            return redirect('/rental')->with('status', 'Data Kendaraan berhasil diperbarui');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Rental::destroy($id);
    return redirect('/rental')->with('status', 'Data Kendaraan telah dihapus');
    }
}