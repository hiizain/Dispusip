<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Masters\Kecamatan;
use App\Models\Masters\Kelurahan;
use App\Models\Masters\Posyandu;
use App\Models\Masters\Balita;
use App\Models\Masters\Pengguna;
use App\Models\Masters\Role;
use Illuminate\Http\Request;

class DataMasController extends Controller
{
    public function homeMaster(){
        return view('admin/master/home');
    }

    public function kecamatan(){
        $kecamatan = Kecamatan::all();
        //return view('master/kecamatan');
        return view('admin/master/kecamatan', ['kecamatan'=>$kecamatan]);
    }

    public function tambahKec(){
        return view('admin/master/tambah/kecamatan');
    }

    public function dataKec(Request $request){
        $kecamatan = new Kecamatan;
        $kecamatan->KECAMATAN = $request->kecamatan;
        if($kecamatan->save()){
            return redirect('/kecamatan')->with('tambahSuccess', 'Data berhasil ditambahkan');
        } else {
            return back()->with('tambahError', 'Data gagal ditambahkan');
        }
    }

    public function editKec(Request $request){
        $kecamatan = Kecamatan::where('ID_KECAMATAN',$request->id)->first();
        return view('admin/master/edit/kecamatan', ['kecamatan'=>$kecamatan]);
    }

    public function simpanKec(Request $request){
        $kecamatan = Kecamatan::where('ID_KECAMATAN',$request->id);
        if($kecamatan->update([
            'KECAMATAN'=>$request->kecamatan
            ])){
            return redirect('/kecamatan')->with('updateSuccess', 'Data berhasil dirubah');
        } else {
            return back()->with('updateError', 'Data gagal dirubah');
        }
    }

    public function hapusKec(Request $request){
        //return $request;
        $kecamatan = Kecamatan::where('ID_KECAMATAN',$request->id);
        if($kecamatan->delete()){
            return back()->with('deleteSuccess', 'Data berhasil dihapus');
        } else {
            return back()->with('deleteError', 'Data gagal dihapus');
        }
    }

    public function kecamatanRestore(){
        $kecamatan = Kecamatan::onlyTrashed()->get();
        return view('admin/master/restore/kecamatan', ['kecamatan'=>$kecamatan]);
    }

    public function restoreKecamatan(Request $request){
        $kecamatan = Kecamatan::where('ID_KECAMATAN',$request->id);
        if($kecamatan->restore()){
            return redirect('/kecamatan')->with('restoreSuccess', 'Data berhasil dikembalikan');
        } else {
            return back()->with('restoreError', 'Data gagal dikembalikan');
        }
    }

    public function forceDelKecamatan(Request $request){
        //return $request;
        $kecamatan = Kecamatan::where('ID_KECAMATAN',$request->id);
        if($kecamatan->forceDelete()){
            return redirect('/kecamatan')->with('deleteSuccess', 'Data berhasil dihapus');
        } else {
            return back()->with('deleteError', 'Data gagal dihapus');
        }
    }

    public function kelurahan(){
        $kelurahan = Kelurahan::all();
        $kecamatan = Kecamatan::all();
        //return view('master/kelurahan');
        return view('admin/master/kelurahan', ['kelurahan'=>$kelurahan, 'kecamatan'=>$kecamatan]);
    }

    public function tambahKel(){
        $kecamatan = Kecamatan::all();
        return view('admin/master/tambah/kelurahan', ['kecamatan'=>$kecamatan]);
    }

    public function dataKel(Request $request){
        //return $request;
        $kelurahan = new Kelurahan;
        $kelurahan->ID_KECAMATAN = $request->ID_KECAMATAN;
        $kelurahan->KELURAHAN = $request->kelurahan;
        if($kelurahan->save()){
            return redirect('/kelurahan')->with('tambahSuccess', 'Data berhasil ditambahkan');
        } else {
            return back()->with('tambahError', 'Data gagal ditambahkan');
        }
    }

    public function editKel(Request $request){
        $kecamatan = Kecamatan::all();
        $kelurahan = Kelurahan::where('ID_KELURAHAN',$request->id)->first();
        return view('admin/master/edit/kelurahan', ['kecamatan'=>$kecamatan, 'kelurahan'=>$kelurahan]);
    }

    public function simpanKel(Request $request){
        $kelurahan = Kelurahan::where('ID_KELURAHAN',$request->id);
        if($kelurahan->update([
            'ID_KECAMATAN'=>$request->ID_KECAMATAN,
            'KELURAHAN'=>$request->kelurahan
            ])){
            return redirect('/kelurahan')->with('updateSuccess', 'Data berhasil dirubah');
        } else {
            return back()->with('updateError', 'Data gagal dirubah');
        }
    }

    public function hapusKel(Request $request){
        //return $request;
        $kelurahan = Kelurahan::where('ID_KELURAHAN',$request->id);
        if($kelurahan->delete()){
            return back()->with('deleteSuccess', 'Data berhasil dihapus');
        } else {
            return back()->with('deleteError', 'Data gagal dihapus');
        }
    }

    public function kelurahanRestore(){
        $kelurahan = Kelurahan::onlyTrashed()->get();
        return view('admin/master/restore/kelurahan', ['kelurahan'=>$kelurahan]);
    }

    public function restoreKelurahan(Request $request){
        $kelurahan = Kelurahan::where('ID_KELURAHAN',$request->id);
        if($kelurahan->restore()){
            return redirect('/kelurahan')->with('restoreSuccess', 'Data berhasil dikembalikan');
        } else {
            return back()->with('restoreError', 'Data gagal dikembalikan');
        }
    }

    public function forceDelKelurahan(Request $request){
        //return $request;
        $kelurahan = Kelurahan::where('ID_KELURAHAN',$request->id);
        if($kelurahan->forceDelete()){
            return redirect('/kelurahan')->with('deleteSuccess', 'Data berhasil dihapus');
        } else {
            return back()->with('deleteError', 'Data gagal dihapus');
        }
    }

    public function posyandu(){
        $posyandu = Posyandu::all();
        //return view('master/posyandu');
        return view('admin/master/posyandu', ['posyandu'=>$posyandu]);
    }

    public function tambahPos(){
        $kelurahan = Kelurahan::all();
        return view('admin/master/tambah/posyandu', ['kelurahan'=>$kelurahan]);
    }

    public function dataPos(Request $request){
        $posyandu = new Posyandu;
        $posyandu->ID_KELURAHAN = $request->ID_KELURAHAN;
        $posyandu->NAMA_POSYANDU = $request->posyandu;
        $posyandu->ALAMAT_POSYANDU = $request->alamat;
        if($posyandu->save()){
            return redirect('/posyandu')->with('tambahSuccess', 'Data berhasil ditambahkan');
        } else {
            return back()->with('tambahError', 'Data gagal ditambahkan');
        }
    }

    public function editPos(Request $request){
        $kelurahan = Kelurahan::all();
        $posyandu = Posyandu::where('ID_POSYANDU',$request->id)->first();
        return view('admin/master/edit/posyandu', ['kelurahan'=>$kelurahan, 'posyandu'=>$posyandu]);
    }

    public function simpanPos(Request $request){
        $posyandu = Posyandu::where('ID_POSYANDU',$request->id);
        if($posyandu->update([
            'ID_KELURAHAN'=>$request->ID_KELURAHAN,
            'NAMA_POSYANDU'=>$request->posyandu,
            'ALAMAT_POSYANDU'=>$request->alamat
            ])){
            return redirect('/posyandu')->with('updateSuccess', 'Data berhasil dirubah');
        } else {
            return back()->with('updateError', 'Data gagal dirubah');
        }
    }

    public function hapusPos(Request $request){
        //return $request;
        $posyandu = Posyandu::where('ID_POSYANDU',$request->id);
        if($posyandu->delete()){
            return back()->with('deleteSuccess', 'Data berhasil dihapus');
        } else {
            return back()->with('deleteError', 'Data gagal dihapus');
        }
    }

    public function posyanduRestore(){
        $posyandu = Posyandu::onlyTrashed()->get();
        return view('admin/master/restore/posyandu', ['posyandu'=>$posyandu]);
    }

    public function restorePosyandu(Request $request){
        $posyandu = Posyandu::where('ID_POSYANDU',$request->id);
        if($posyandu->restore()){
            return redirect('/posyandu')->with('restoreSuccess', 'Data berhasil dikembalikan');
        } else {
            return back()->with('restoreError', 'Data gagal dikembalikan');
        }
    }

    public function forceDelPosyandu(Request $request){
        //return $request;
        $posyandu = Posyandu::where('ID_POSYANDU',$request->id);
        if($posyandu->forceDelete()){
            return redirect('/posyandu')->with('deleteSuccess', 'Data berhasil dihapus');
        } else {
            return back()->with('deleteError', 'Data gagal dihapus');
        }
    }

    public function role(){
        $role = Role::all();
        //return view('master/role');
        return view('admin/master/role', ['role'=>$role]);
    }

    public function tambahRole(){
        return view('admin/master/tambah/role');
    }

    public function dataRole(Request $request){
        $role = new Role;
        $role->ROLE = $request->role;
        if($role->save()){
            return redirect('/role')->with('tambahSuccess', 'Data berhasil ditambahkan');
        } else {
            return back()->with('tambahError', 'Data gagal ditambahkan');
        }
    }

    public function editRole(Request $request){
        $role = Role::where('ID_ROLE',$request->id)->first();
        return view('admin/master/edit/role', ['role'=>$role]);
    }

    public function simpanRole(Request $request){
        $role = Role::where('ID_ROLE',$request->id);
        if($role->update([
            'ROLE'=>$request->role
            ])){
            return redirect('/role')->with('updateSuccess', 'Data berhasil dirubah');
        } else {
            return back()->with('updateError', 'Data gagal dirubah');
        }
    }

    public function hapusRole(Request $request){
        //return $request;
        $role = Role::where('ID_ROLE',$request->id);
        if($role->delete()){
            return back()->with('deleteSuccess', 'Data berhasil dihapus');
        } else {
            return back()->with('deleteError', 'Data gagal dihapus');
        }
    }

    public function roleRestore(){
        $role = Role::onlyTrashed()->get();
        return view('admin/master/restore/role', ['role'=>$role]);
    }

    public function restoreRole(Request $request){
        $role = Role::where('ID_ROLE',$request->id);
        if($role->restore()){
            return redirect('/role')->with('restoreSuccess', 'Data berhasil dikembalikan');
        } else {
            return back()->with('restoreError', 'Data gagal dikembalikan');
        }
    }

    public function forceDelRole(Request $request){
        //return $request;
        $role = Role::where('ID_ROLE',$request->id);
        if($role->forceDelete()){
            return redirect('/role')->with('deleteSuccess', 'Data berhasil dihapus');
        } else {
            return back()->with('deleteError', 'Data gagal dihapus');
        }
    }

    public function balita(){
        $balita = Balita::all();
        //return view('master/posyandu');
        return view('admin/master/balita', ['balita'=>$balita]);
    }

    public function editBalita(Request $request){
        $posyandu = Posyandu::all();
        $balita = Balita::where('ID_BALITA',$request->id)->first();
        return view('admin/master/edit/balita', ['posyandu'=>$posyandu, 'balita'=>$balita]);
    }

    public function simpanBalita(Request $request){
        $balita = Balita::where('ID_BALITA',$request->id);
        if($balita->update([
            'ID_POSYANDU'=>$request->id_posyandu,
            'NAMA_BALITA'=>$request->nama_balita,
            'NIK_ORANG_TUA'=>$request->nik_orang_tua,
            'NAMA_ORANG_TUA'=>$request->nama_orang_tua,
            'TGL_LAHIR_BALITA'=>$request->tgl_lahir_balita,
            'JENIS_KELAMIN_BALITA'=>$request->jenis_kelamin_balita,
            'STATUS'=>$request->status
            ])){
            return redirect('/balita')->with('updateSuccess', 'Data berhasil dirubah');
        } else {
            return back()->with('updateError', 'Data gagal dirubah');
        }
    }

    public function hapusBalita(Request $request){
        //return $request;
        $balita = Balita::where('ID_BALITA',$request->id);
        if($balita->delete()){
            return back()->with('deleteSuccess', 'Data berhasil dihapus');
        } else {
            return back()->with('deleteError', 'Data gagal dihapus');
        }
    }

    public function balitaRestore(){
        $balita = Balita::onlyTrashed()->get();
        return view('admin/master/restore/balita', ['balita'=>$balita]);
    }

    public function restoreBalita(Request $request){
        $balita = Balita::where('ID_BALITA',$request->id);
        if($balita->restore()){
            return redirect('/balita')->with('restoreSuccess', 'Data berhasil dikembalikan');
        } else {
            return back()->with('restoreError', 'Data gagal dikembalikan');
        }
    }

    public function forceDelBalita(Request $request){
        //return $request;
        $balita = Balita::where('ID_BALITA',$request->id);
        if($balita->forceDelete()){
            return redirect('/balita')->with('deleteSuccess', 'Data berhasil dihapus');
        } else {
            return back()->with('deleteError', 'Data gagal dihapus');
        }
    }

    public function user(){
        $users = User::all();
        //return view('master/posyandu');
        return view('admin/master/user', ['users'=>$users]);
    }

    public function hapusUser(Request $request){
        //return $request;
        $user = User::where('id',$request->id);
        if($user->delete()){
            return back()->with('deleteSuccess', 'Data berhasil dihapus');
        } else {
            return back()->with('deleteError', 'Data gagal dihapus');
        }
    }

    public function userRestore(){
        $user = User::onlyTrashed()->get();
        return view('admin/master/restore/user', ['user'=>$user]);
    }

    public function restoreUser(Request $request){
        $user = User::where('id',$request->id);
        if($user->restore()){
            return redirect('/user')->with('restoreSuccess', 'Data berhasil dikembalikan');
        } else {
            return back()->with('restoreError', 'Data gagal dikembalikan');
        }
    }

    public function forceDelUser(Request $request){
        //return $request;
        $user = User::where('id',$request->id);
        if($user->forceDelete()){
            return redirect('/user')->with('deleteSuccess', 'Data berhasil dihapus');
        } else {
            return back()->with('deleteError', 'Data gagal dihapus');
        }
    }
}
