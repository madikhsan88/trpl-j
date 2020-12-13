<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rental;
use App\User;
use App\Role;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $admin = User::whereHas('roles', function($q){
            $q->where('name', 'admin');
        })->get();
        // dd($mitra);
        return view('profil.index', compact('admin'));   
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

    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
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

        Rental::create([
            'nama_lengkap' => $request->get('nama_lengkap'),
            'alamat' => $request->get('alamat'),
            'nik' => $request->get('nik'),
            'hp' => $request->get('hp'),
            'user_id' => $pengguna->id,
        ]);

        $perental = Role::where('nama', 'rental')->first();
        $user->roles()->attach($perental);
        return redirect('/register')->with('status', 'Data berhasil ditambahkan');
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
