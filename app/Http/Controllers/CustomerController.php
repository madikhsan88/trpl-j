<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Role;
use App\User;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::paginate(10);
        return view('admin.customer.index', [
            'customers' => $customers
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.customer.create');
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

        $pemilik = User::where('created_at', $time)->first();

        $customer = new \App\Customer;
        $customer->nama_lengkap    = $request->get('nama_lengkap');
        $customer->alamat          = $request->get('alamat');
        $customer->nik             = $request->get('nik');
        $customer->hp              = $request->get('hp');
        $customer->user_id         = $pemilik->id;
        $customer->save();

        $custom = Role::where('nama', 'customer')->first();
        $user->roles()->attach($custom);
        return redirect('/customer')->with('status', 'Data Customer berhasil ditambahkan');
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
        $customer = Customer::findOrFail($id);
        return view('admin.customer.edit', [
            'customer' => $customer
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
        $request->validate([
            'nama_lengkap' => 'required',
            'alamat' => 'required',
            'nik' => 'required',
            'hp' => 'required',
            
        ]);

        $customer = \App\Customer::find($id);
        $customer->nama_lengkap    = $request->get('nama_lengkap');
        $customer->alamat          = $request->get('alamat');
        $customer->nik             = $request->get('nik');
        $customer->hp              = $request->get('hp');
        $customer->save();

        $user = \App\User::find($customer->user_id);
        $user->name = $request->get('nama_lengkap');
        $user->save(); 
        return redirect('/customer')->with('status', 'Data Customer berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Customer::destroy($id);
        return redirect('/customer')->with('status', 'Data Customer telah dihapus');
    }
}
