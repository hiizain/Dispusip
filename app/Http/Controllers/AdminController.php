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
            $lokasi = new Lokasi;
            $lokasi->KODE_LOKASI = $request->KODE_LOKASI;
            $lokasi->LOKASI = $request->LOKASI;
        
                if($lokasi->save()){
                    // die(var_dump($barang));
                    return redirect("/admin-lokasi");
                } else 
                    return back();
    }

    public function storerole(Request $request)
    {
            $role = new Role;
            $role->ROLE = $request->ROLE;
        
                if($role->save()){
                    // die(var_dump($barang));
                    return redirect("/admin-role");
                } else 
                    return back();
    }
    
    public function storesatuan(Request $request)
    {
            $satuan = new Satuan;
            $satuan->SATUAN = $request->SATUAN;
        
                if($satuan->save()){
                    // die(var_dump($barang));
                    return redirect("/admin-satuan");
                } else 
                    return back();
    }

    public function storetype(Request $request)
    {
            $type = new Type;
            $type->TYPE = $request->TYPE;
            $filenameWithExt = $request->file('PATH_GAMBAR')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('PATH_GAMBAR')->getClientOriginalExtension();
            $filenameSimpan = $filename.'_'.time().'.'.$extension;
            

            if($request->file('PATH_GAMBAR')){
                $type->PATH_GAMBAR = $filenameSimpan;
                $request->file('PATH_GAMBAR')->move('storage/img-type', $filenameSimpan);
                if($type->save()){
                    return redirect("admin-type");
                } else 
                    return back();
            } else 
                return back();
    }

    public function storeuser(Request $request)
    {
            $user = new user;
            $user->ID_ROLE = $request->role;
            // $user->ID_JABATAN = $request->jabatan;
            $user->NAMA = $request->NAMA;
            $user->NIP = $request->NIP;
            $user->USERNAME = $request->USERNAME;
            $user->PASSWORD = $request->PASSWORD;
            
        
                if($user->save()){
                    // die(var_dump($barang));
                    return redirect("/admin-user");
                } else 
                    return back();
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
