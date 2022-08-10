<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Lokasi;
use App\Barang;
use App\Type;
use App\User;
use App\Users;
use App\Satuan;
use App\Role;
use App\Jabatan;
use App\Merek;
use Hash;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    function dashboard(){
        $barang = Barang::all();
        $lokasi = Lokasi::all();
        return view('admin/dashboard', ['barang' => $barang, 'lokasi' => $lokasi]);
    }
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
        $this->validate($request, [
            'KODE_LOKASI' => 'required',
            'LOKASI' => 'required'
        ]);

        $lokasi = new Lokasi;
        $lokasi->KODE_LOKASI = $request->KODE_LOKASI;
        $lokasi->LOKASI = $request->LOKASI;
    
            if($lokasi->save()){
                // die(var_dump($barang));
                return redirect("/admin-lokasi")->with('tambahSuccess', 'Data berhasil ditambah');
            } else 
                return back()->with('tambahError', 'Data gagal ditambah');
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

        return redirect("/admin-lokasi")->with('updateSuccess', 'Data berhasil diupdate');
    }

    public function destroylokasi($id)
    {
        $lokasi = Lokasi::where('ID_LOKASI',$id);
        $lokasi->delete();
        return redirect("/admin-lokasi")->with('hapus', 'Data berhasil dihapus');
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
        $this->validate($request, [
            'ROLE' => 'required',
        ]);
        
        $role = new Role;
        $role->ROLE = $request->ROLE;
    
            if($role->save()){
                // die(var_dump($barang));
                return redirect("/admin-role")->with('tambahSuccess', 'Data berhasil ditambah');
            } else 
                return back()->with('tambahError', 'Data gagal ditambah');
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

        return redirect("/admin-role")->with('updateSuccess', 'Data berhasil diupdate');
    }

    public function destroyrole($id)
    {
        $role = Role::where('ID_ROLE',$id);
        $role->delete();
        return redirect("/admin-role")->with('hapus', 'Data berhasil dihapus');
    }
// ==================================================END ROLE==================================================


//Type
    public function tambahtype()
    {
        $satuan = Satuan::all();
        return view('admin/tambah/tambahtype', ['satuan' => $satuan,]);
    }

    function type(){
        $type = Type::all();
        $satuan = Satuan::all();
        return view('admin/type', ['type' => $type, 'satuan' => $satuan]);
    }

    public function storetype(Request $request)
    {
        $this->validate($request, [
            'type' => 'required',
            'satuan' => 'required',
            'PATH_GAMBAR' => 'required'
        ]);

        $type = new Type;
        $type->TYPE = $request->type;
        $type->ID_SATUAN = $request->satuan;
        $filenameWithExt = $request->file('PATH_GAMBAR')->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('PATH_GAMBAR')->getClientOriginalExtension();
        $filenameSimpan = $filename.'_'.time().'.'.$extension;
        

        if($request->file('PATH_GAMBAR')){
            $type->PATH_GAMBAR = $filenameSimpan;
            $request->file('PATH_GAMBAR')->move('storage/img-type', $filenameSimpan);
            if($type->save()){
                return redirect("admin-type")->with('tambahSuccess', 'Data berhasil ditambah');
            } else 
                return back()->with('tambahError', 'Data gagal ditambah');
        } else 
            return back()->with('tambahError', 'Data gagal ditambah');
    }

    public function edittype($id)
    {
        $type = Type::where('ID_TYPE',$id)->first();
        $satuan = Satuan::all();

        return view('admin/edit/edittype', ['data' => $type,'satuan' => $satuan]);
    }

    public function updatetype(Request $request,$id)
    {
        $type = Type::where('id_type', $id);
        $gambarLama = $type->first()->PATH_GAMBAR;
        $filenameSimpan = $gambarLama;

        if($request->file('gambarType')){
            $filenameWithExt = $request->file('gambarType')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('gambarType')->getClientOriginalExtension();
            $filenameSimpan = $filename.'_'.time().'.'.$extension;

            
            if($request->file('gambarType')->move('storage/img-type', $filenameSimpan)){
                if(unlink("storage/img-type/$gambarLama")){
                    if($type->update([
                        'TYPE' => $request->type,
			            'ID_SATUAN' => $request->satuan,
                        'PATH_GAMBAR' => $filenameSimpan
                    ])){
                        return redirect("/admin-type")->with('updateSuccess', 'Data berhasil diupdate');
                    } else return back()->with('updateError', 'Data gagal diupdate');
                } else return back()->with('updateError', 'Data gagal diupdate');
            } else return back()->with('updateError', 'Data gagal diupdate');
        }
        if($type->update([
            'TYPE' => $request->type,
	        'ID_SATUAN' => $request->satuan,
            'PATH_GAMBAR' => $filenameSimpan
        ])){
            return redirect("/admin-type")->with('updateSuccess', 'Data berhasil diupdate');
        } else return back()->with('updateError', 'Data gagal diupdate');
        return redirect("/admin-type")->with('edit', 'Data berhasil diupdate');
    }

    public function destroytype($id)
    {
        $type = Type::where('ID_TYPE',$id);
        $type->delete();
        return redirect("/admin-type")->with('hapus', 'Data berhasil dihapus');
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
        $this->validate($request, [
            'role' => 'required',
            'jabatan' => 'required',
            'NAMA' => 'required',
            'NIP' => 'required|min:18|max:18|',
            // 'PASSWORD' => 'required',
        ]);

        $user = new User;
        $user->ID_ROLE = $request->role;
        $user->ID_JABATAN = $request->jabatan;
        $user->NAMA = $request->NAMA;
        $user->NIP = $request->NIP;
        // $user->PASSWORD = Hash::make($request->PASSWORD);
        $user->PASSWORD = Hash::make($request->NIP);

        $users = new Users;
        $users->NIP = $request->NIP;
        // $users->PASSWORD = Hash::make($request->PASSWORD);
        $users->PASSWORD = Hash::make($request->NIP);
        

        if($user->save() && $users->save()){
            // die(var_dump($barang));
            return redirect("/admin-user")->with('tambahSuccess', 'Data berhasil ditambah');
        } else 
            return back()->with('tambahError', 'Data gagal ditambah');
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
        $user = User::where('id_user', $id);
        $nip = User::where('id_user', $id)->first();
        // dd($nip);
        $users = Users::where('nip', $nip->NIP);
        if($request->PASSWORD){
            $password = Hash::make($request->PASSWORD);
            if($user->update([
                'ID_JABATAN'            => $request['ID_JABATAN'],
                'ID_ROLE'               => $request['ID_ROLE'],
                'NAMA'                  => $request['NAMA'],
                'NIP'                   => $request['NIP'],
                'PASSWORD'              => $password
            ])
            &&
            $users->update([
                'NIP'                   => $request['NIP'],
                'PASSWORD'              => $password
            ])
            ){
                return redirect("/admin-user")->with('updateSuccess', 'Data berhasil diupdate');
            } else return back()->with('updateError', 'Data gagal diupdate');
        } else {
            $password = $request->passLama;
            if($user->update([
                'ID_JABATAN'            => $request['ID_JABATAN'],
                'ID_ROLE'               => $request['ID_ROLE'],
                'NAMA'                  => $request['NAMA'],
                'NIP'                   => $request['NIP'],
                'PASSWORD'              => $password
            ])
            &&
            $users->update([
                'NIP'                   => $request['NIP'],
                'PASSWORD'              => $password
            ])
            ){
                return redirect("/admin-user")->with('updateSuccess', 'Data berhasil diupdate');
            } else return back()->with('updateError', 'Data gagal diupdate');
        } 
    }

    public function destroyuser($id)
    {
        $user = User::where('ID_USER',$id);
        $user->delete();
        return redirect("/admin-user")->with('hapus', 'Data berhasil dihapus');
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
        $this->validate($request, [
            'SATUAN' => 'required',
        ]);

        $satuan = new Satuan;
        $satuan->SATUAN = $request->SATUAN;
    
        if($satuan->save()){
            // die(var_dump($barang));
            return redirect("/admin-satuan")->with('tambahSuccess', 'Data berhasil ditambah');
        } else 
            return back()->with('tambahError', 'Data gagal ditambah');
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

        return redirect("/admin-satuan")->with('updateSuccess', 'Data berhasil diupdate');
    }

    public function destroysatuan($id)
    {
        $satuan = Satuan::where('ID_SATUAN',$id);
        $satuan->delete();
        return redirect("/admin-satuan")->with('hapus', 'Data berhasil dihapus');
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
        $this->validate($request, [
            'JABATAN' => 'required',
        ]);

        $jabatan = new Jabatan;
        $jabatan->JABATAN = $request->JABATAN;
    
        if($jabatan->save()){
            // die(var_dump($barang));
            return redirect("/admin-jabatan")->with('tambahSuccess', 'Data berhasil ditambah');
        } else 
            return back()->with('tambahError', 'Data gagal ditambah');
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

        return redirect("/admin-jabatan")->with('updateSuccess', 'Data berhasil diupdate');
    }

    public function destroyjabatan($id)
    {
        $jabatan = Jabatan::where('ID_JABATAN',$id);
        $jabatan->delete();
        return redirect("/admin-jabatan")->with('hapus', 'Data berhasil dihapus');
    }
// ==================================================END SATUAN==================================================

//Barang
    function barang(){
        $barang = Barang::all();
        return view('admin/barang', ['barang' => $barang]);
    }
// ==================================================END BARANG==================================================
    
//MERK
public function tambahmerek()
{

    return view('admin/tambah/tambahmerek');
}

function merek(){
    $merek = Merek::all();
    return view('admin/merek', ['merek' => $merek]);
}

public function storemerek(Request $request)
{
    $this->validate($request, [
        'MEREK' => 'required',
    ]);

    $merek = new Merek;
    $merek->MEREK = $request->MEREK;

    if($merek->save()){
        // die(var_dump($barang));
        return redirect("/admin-merek")->with('tambahSuccess', 'Data berhasil ditambah');
    } else 
        return back()->with('tambahError', 'Data gagal ditambah');
}

public function editmerek($id)
{
    $merek = Merek::where('ID_MEREK',$id)->first();

    return view('admin/edit/editmerek', ['data' => $merek]);
}

public function updatemerek(Request $request,$id)
{
    DB::table('merek')->where('ID_MEREK',$id)->update([
        'MEREK'        => $request['MEREK']
    ]);

    return redirect("/admin-merek")->with('updateSuccess', 'Data berhasil diupdate');
}

public function destroymerek($id)
{
    $merek = Merek::where('ID_MEREK',$id);
    $merek->delete();
    return redirect("/admin-merek")->with('hapus', 'Data berhasil dihapus');
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
