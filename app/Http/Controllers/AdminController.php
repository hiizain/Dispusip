<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Lokasi;
use App\Barang;
use App\Type;
use App\User;
use App\Satuan;
use App\Role;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function lokasi(){
        $lokasi = Lokasi::all();
        return view('admin/lokasi', ['lokasi' => $lokasi]);
    }

    public function tambahlokasi()
    {

        return view('admin/tambah/tambahlokasi');
    }

    public function tambahrole()
    {

        return view('admin/tambah/tambahrole');
    }

    public function tambahtype()
    {

        return view('admin/tambah/tambahtype');
    }

    public function tambahuser()
    {

        return view('admin/tambah/tambahuser');
    }

    public function tambahsatuan()
    {

        return view('admin/tambah/tambahsatuan');
    }

    function type(){
        $type = Type::all();
        return view('admin/type', ['type' => $type]);
    }

    function barang(){
        $barang = Barang::all();
        return view('admin/barang', ['barang' => $barang]);
    }

    function user(){
        $user = User::all();
        return view('admin/user', ['user' => $user]);
    }

    function satuan(){
        $satuan = Satuan::all();
        return view('admin/satuan', ['satuan' => $satuan]);
    }

    function role(){
        $role = Role::all();
        return view('admin/role', ['role' => $role]);
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
    public function storelokasi(Request $request)
    {
        Lokasi::create($validatedata);
        $request->session()->flash('success','berhasil menambahkan lokasi');
        return redirect('/admin-lokasi')->with('hapus','Data berhasil ditambah');
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
