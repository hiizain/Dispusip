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
use App\Jabatan;
use Hash;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //Lokasi
    function lokasi(){
        $lokasi = Lokasi::all();
        return view('admin/lokasi', ['lokasi' => $lokasi]);
    }

    public function tambahlokasi()
    {

        return view('admin/tambah/tambahlokasi');
    }

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

    public function editlokasi($id)
    {
        $lokasi = Lokasi::where('ID_LOKASI',$id)->first();

        return view('admin/edit/editlokasi', ['data' => $lokasi]);
    }

    public function updatelokasi(Request $request,$id)
    {
        DB::table('lokasi')->where('ID_LOKASI',$id)->update([
            'KODE_LOKASI'   => $request['KODE_LOKASI'],
            'LOKASI'        => $request['LOKASI']
        ]);

        return redirect("/admin-lokasi");
    }

    public function destroylokasi($id)
    {
        $lokasi = Lokasi::where('ID_LOKASI',$id);
        $lokasi->delete();
        return redirect("/admin-lokasi");
    }
// ==================================================END LOKASI==================================================


//Role
    public function tambahrole()
    {

        return view('admin/tambah/tambahrole');
    }

    function role(){
        $role = Role::all();
        return view('admin/role', ['role' => $role]);
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

    public function editrole($id)
    {
        $role = Role::where('ID_ROLE',$id)->first();

        return view('admin/edit/editrole', ['data' => $role]);
    }

    public function updaterole(Request $request,$id)
    {
        DB::table('role')->where('ID_ROLE',$id)->update([
            'ROLE'        => $request['ROLE']
        ]);

        return redirect("/admin-role");
    }

    public function destroyrole($id)
    {
        $role = Role::where('ID_ROLE',$id);
        $role->delete();
        return redirect("/admin-role");
    }
// ==================================================END ROLE==================================================


//Type
    public function tambahtype()
    {

        return view('admin/tambah/tambahtype');
    }

    function type(){
        $type = Type::all();
        return view('admin/type', ['type' => $type]);
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

    public function edittype($id)
    {
        $type = Type::where('ID_TYPE',$id)->first();

        return view('admin/edit/edittype', ['data' => $type]);
    }

    public function updatetype(Request $request,$id)
    {
        DB::table('type')->where('ID_TYPE',$id)->update([
            'TYPE'        => $request['TYPE']
        ]);

        return redirect("/admin-type");
    }

    public function destroytype($id)
    {
        $type = Type::where('ID_TYPE',$id);
        $type->delete();
        return redirect("/admin-type");
    }
// ==================================================END TYPE==================================================

//User    
    public function tambahuser()
    {
        $jabatan = Jabatan::all();
        $role = Role::all();
        return view('admin/tambah/tambahuser', ['jabatan' => $jabatan,'role' => $role]);
        
    }

    function user(){
        $user = User::all();
        return view('admin/user', ['user' => $user]);
    }

    public function storeuser(Request $request)
    {
            $user = new user;
            $user->ID_ROLE = $request->role;
            $user->ID_JABATAN = $request->jabatan;
            $user->NAMA = $request->NAMA;
            $user->NIP = $request->NIP;
            $user->USERNAME = $request->USERNAME;
            $user->PASSWORD = Hash::make($request->PASSWORD);
            
        
                if($user->save()){
                    // die(var_dump($barang));
                    return redirect("/admin-user");
                } else 
                    return back();
    }

    public function edituser($id)
    {
        $user = USER::where('ID_USER',$id)->first();
        $jabatan = Jabatan::all();
        $role = Role::all();

        return view('admin/edit/edituser', ['data' => $user, 'jabatan' => $jabatan, 'role' => $role]);
    }

    public function updateuser(Request $request,$id)
    {
        DB::table('user')->where('ID_USER',$id)->update([
            'ID_JABATAN'            => $request['ID_JABATAN'],
            'ID_ROLE'               => $request['ID_ROLE'],
            'NAMA'                  => $request['NAMA'],
            'NIP'                   => $request['NIP'],
            'USERNAME'              => $request['USERNAME'],
            'PASSWORD'              => $request['PASSWORD']
        ]);

        return redirect("/admin-user");
    }

    public function destroyuser($id)
    {
        $user = User::where('ID_USER',$id);
        $user->delete();
        return redirect("/admin-user");
    }
// ==================================================END USER==================================================

//Satuan
    public function tambahsatuan()
    {

        return view('admin/tambah/tambahsatuan');
    }

    function satuan(){
        $satuan = Satuan::all();
        return view('admin/satuan', ['satuan' => $satuan]);
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

    public function editsatuan($id)
    {
        $satuan = Satuan::where('ID_SATUAN',$id)->first();

        return view('admin/edit/editsatuan', ['data' => $satuan]);
    }

    public function updatesatuan(Request $request,$id)
    {
        DB::table('satuan')->where('ID_SATUAN',$id)->update([
            'SATUAN'        => $request['SATUAN']
        ]);

        return redirect("/admin-satuan");
    }

    public function destroysatuan($id)
    {
        $satuan = Satuan::where('ID_SATUAN',$id);
        $satuan->delete();
        return redirect("/admin-satuan");
    }
// ==================================================END SATUAN==================================================

//Jabatan
    public function tambahjabatan()
    {

        return view('admin/tambah/tambahjabatan');
    }

    function jabatan(){
        $jabatan = Jabatan::all();
        return view('admin/jabatan', ['jabatan' => $jabatan]);
    }

    public function storejabatan(Request $request)
    {
            $jabatan = new Jabatan;
            $jabatan->JABATAN = $request->JABATAN;
        
                if($jabatan->save()){
                    // die(var_dump($barang));
                    return redirect("/admin-jabatan");
                } else 
                    return back();
    }

    public function editjabatan($id)
    {
        $jabatan = Jabatan::where('ID_JABATAN',$id)->first();

        return view('admin/edit/editjabatan', ['data' => $jabatan]);
    }

    public function updatejabatan(Request $request,$id)
    {
        DB::table('jabatan')->where('ID_JABATAN',$id)->update([
            'JABATAN'        => $request['JABATAN']
        ]);

        return redirect("/admin-jabatan");
    }

    public function destroyjabatan($id)
    {
        $jabatan = Jabatan::where('ID_JABATAN',$id);
        $jabatan->delete();
        return redirect("/admin-jabatan");
    }
// ==================================================END SATUAN==================================================

//Barang
    function barang(){
        $barang = Barang::all();
        return view('admin/barang', ['barang' => $barang]);
    }
// ==================================================END SATUAN==================================================
    

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
    // public function storelokasi(Request $request)
    // {
    //     date_default_timezone_set('Asia/Jakarta');
    //     $validatedata->validate($request,[
    //         'lokasi'=>'required'
    //     ]);
    //     Lokasi::create($validatedata);
    //     $request->session()->flash('success','berhasil menambahkan lokasi');
    //     return redirect('/lokasi')->with('hapus','Data berhasil ditambah');
    // }

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
