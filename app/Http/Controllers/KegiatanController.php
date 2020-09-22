<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\pendaftaran_kegiatan_mahasiswa;
class KegiatanController extends Controller
{
    //
     public function index(Request $request)
    {
    	# code...
        if($request->has('cari')){
            $data_ormawa = \App\Ormawa::where('nama_ormawa','LIKE','%'.$request->cari. '%')->get();
            $data_kegiatan = \App\Kegiatan::all();
            $paginate = \App\Kegiatan::paginate(3);
            // Untuk Relasi
          
        }else{
            $data_kegiatan = \App\Kegiatan::all();
            $paginate = \App\Kegiatan::paginate(3);
            // Untuk Relasi
            $data_ormawa = \App\Ormawa::all();
        }
    	return view('kegiatan.index',['data_kegiatan' => $data_kegiatan,'data_ormawa' => $data_ormawa]);
    }
    public function create(Request $request)
    {
        # code...
       $kegiatan=\App\Kegiatan::create($request->all());
       
        if($request->hasfile('poster')){
            $request->file('poster')->move('posterkegiatan/',$request->file('poster')->getClientOriginalName());
            $kegiatan->poster = $request->file('poster')->getClientOriginalName();
            $kegiatan->save();

        }

        return redirect('/kegiatan')->with('sukses','Data berhasil diinput');
    }
     public function edit($id)
    {
        # code...
        $kegiatan = \App\Kegiatan::find($id);
        $data_ormawa = \App\Ormawa::all();
        return view('kegiatan/edit',['kegiatan' => $kegiatan,'data_ormawa' => $data_ormawa]);
    }
    public function update(Request $request,$id)
    {
        # code...
        //dd($request->all());

        $data_ormawa = \App\Ormawa::find($id);

        $kegiatan = \App\Kegiatan::find($id);
        $kegiatan->update($request->all());
        if($request->hasfile('file_sertifikat')){
            $request->file('file_sertifikat')->move('file_sertifikat/',$request->file('file_sertifikat')->getClientOriginalName());
            $kegiatan->file_sertifikat = $request->file('file_sertifikat')->getClientOriginalName();
            $kegiatan->save();

        }

        if($request->hasfile('poster')){
            $request->file('poster')->move('posterkegiatan/',$request->file('poster')->getClientOriginalName());
            $kegiatan->poster = $request->file('poster')->getClientOriginalName();
            $kegiatan->save();

        }
        return redirect('/kegiatan')->with('sukses','Data berhasil di updates');
    }
    public function delete(Request $request,$id)
    {
        # code..
        $kegiatan = \App\Kegiatan::find($id);
        $kegiatan->delete($kegiatan);
        return redirect('/kegiatan')->with('sukses','Data berhasil di Hapus');
    }
     public function approveindex(Request $request)
    {
        # code...
      
            $data_kegiatan = \App\Kegiatan::all();
            $paginate = \App\Kegiatan::paginate(3);
            // Untuk Relasi
            $data_ormawa = \App\Ormawa::all();

        return view('approvekegiatan.index',['data_kegiatan' => $data_kegiatan,'data_ormawa' => $data_ormawa]);
    }

    public function approvestatus($id)
    {
        $kegiatan = \App\Kegiatan::find($id);
        $kegiatan->status = '1';
        $kegiatan->save();

        return redirect('/approvekegiatan');
    }

    public function pendaftaran_kegiatan_index($id){
    $pendaftaran_kegiatan = \App\pendaftaran_kegiatan::all();
    $kegiatan = \App\Kegiatan::find($id);
    return view('pendaftaran_kegiatan.index',['pendaftaran_kegiatan' => $pendaftaran_kegiatan, 'kegiatan' => $kegiatan]);
        }

      public function pendaftaran_kegiatan_create(Request $request)
    {
        # code...
       $pendaftaran_kegiatan=\App\pendaftaran_kegiatan::create($request->all());
       $kegiatan = \App\Kegiatan::all();
        return redirect('/')->with('sukses','Data berhasil diinput');

    }    
        public function data_anggota_ormawa_index(Request $request){
            $ormawas = \App\Ormawa::all();
            $kegiatan_anggotas = \App\Kegiatan::where('ormawa_id', request('ormawa_id'))->get();
            $users = \App\Kalbiser::all();
            $skpi = \App\Skpi::all();

            if(request('submit')) {
                // get kegiatan
                $kegiatan = \App\Kegiatan::find(request('kegiatan_id'));

                // get user id verdy
                $kalbiser = \App\Kalbiser::find(request('kalbiser_id'));
                
                 // insert ke skpi bagian 2
                // $skpi = new \App\Skpi;
                // $skpi->jenis_dokumen = $request->jenis_dokumen;
                // $skpi->save();
                // insert ke skpi
                
                \App\Skpi::create([
                    'user_id' => $kalbiser->user_id,
                    'file_skpi' => $kegiatan->file_sertifikat,
                    'tanggal_dokumen' => $kegiatan->tanggal_kegiatan,
                    'jenis_dokumen' => $kegiatan->sertifikat,
                    'judul_sertifikat' => $kegiatan->nama_kegiatan,
                    'ormawa_id' => request('ormawa_id')
                ]);



                return redirect()->back();
            }

             return view('kegiatan_anggota.index',[
                'ormawas'=> $ormawas,
                'kegiatan_anggotas' => $kegiatan_anggotas,
                'users' => $users,
                'skpi' => $skpi
            ]);
        }

        public function data_anggota_ormawa_create(Request $request){
            $kegiatan_anggota=\App\dataanggotaormawa::create($request->all());
            $kegiatan_anggota->save();
            return redirect('/kegiatan_anggota')->with('sukses','Data berhasil diinput');
        }      
}

