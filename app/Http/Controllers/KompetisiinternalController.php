<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\kompetisiinternal;
use App\kalbiser;
use App\Ormawa;
use App\User;

class KompetisiinternalController extends Controller
{
    //
       public function index(Request $request)
    {
        $kalbisers = kalbiser::all();
        $kompetisiinternals = kompetisiinternal::all();
        $ormawas = Ormawa::all();
      

        // return $kompetisiinternal;
        
        return view('kompetisiinternal.index', compact('kalbisers','kompetisiinternals','ormawas'));
    }

      public function create(Request $request)
    {
         return view ('kompetisiinternal.index');
      
     }
        # code...


          public function store(Request $request){
         $kompetisiinternal = new kompetisiinternal();
       
             $request->validate([

            'poster' => 'mimes:jpeg,jpg,png,docx,doc,ppt,pptx,pdf,txt', 
            'ormawa_id' => 'nullable',
            'user_id' => 'nullable',
            'nama_kompetisi' => 'nullable',
            'jenis_kompetisi' => 'nullable',
            'url' => 'nullable',
            'sertifikat' => 'nullable',
            'skala' => 'nullable',
            'pencapaian' => 'nullable',
            'nama_kegiatan' => 'nullable',
            'tanggal_kegiatan' => 'nullable',
            'penyelenggara' => 'nullable',
            'status' => 'nullable', 

            'file_sertifikat' => 'mimes:jpeg,jpg,png,docx,doc,ppt,pptx,pdf,txt'
        ]);

         $tempat_upload = public_path('/posterkompetisi');
        $poster = $request->file('poster');
        $ext = $poster->getClientOriginalExtension();
        $filename = $request->nama . "." . $ext;
        $poster->move($tempat_upload, $filename);

        $tempat_upload2 = public_path('/file_sertifikat');
        $file_sertifikat = $request->file('file_sertifikat');
        $ext2 = $file_sertifikat->getClientOriginalExtension();
        $filename = $request->nama . "." . $ext2;
        $file_sertifikat->move($tempat_upload2, $filename);

        $kompetisiinternal->poster = $filename;
        $kompetisiinternal->ormawa_id = $request->ormawa_id;
        $kompetisiinternal->user_id = $request->user_id;
        $kompetisiinternal->nama_kompetisi = $request->nama_kompetisi;
        $kompetisiinternal->jenis_kompetisi = $request->jenis_kompetisi;
        $kompetisiinternal->url = $request->url;
        $kompetisiinternal->sertifikat = $request->sertifikat;
        $kompetisiinternal->skala = $request->skala;
        $kompetisiinternal->pencapaian = $request->pencapaian;
        $kompetisiinternal->nama_kegiatan = $request->nama_kegiatan;
        $kompetisiinternal->tanggal_kegiatan = $request->tanggal_kegiatan;
        $kompetisiinternal->penyelenggara = $request->penyelenggara;
        $kompetisiinternal->file_sertifikat = $filename;
        $kompetisiinternal->status = $request->status;
        
        $kompetisiinternal->save();
    

        return redirect('kompetisiinternal')->with('sukses','Data berhasil diinput');
    }
         public function edit($id)
    {
        # code...
        $kompetisiinternal = \App\kompetisiinternal::find($id);
        return view('kompetisiinternal/edit',['kompetisiinternal' => $kompetisiinternal]);
    }
    public function update(Request $request,$id)
    {
        # code...
        //dd($request->all());
        $kompetisiinternal = \App\kompetisiinternal::find($id);
        $kompetisiinternal->update($request->all());
        if($request->hasfile('poster')){
            $request->file('poster')->move('posterkompetisi/',$request->file('poster')->getClientOriginalName());
            $kompetisiinternal->poster = $request->file('poster')->getClientOriginalName();
            $kompetisiinternal->save();

        }

        if($request->hasfile('file_sertifikat')){
            $request->file('file_sertifikat')->move('file_sertifikat/',$request->file('file_sertifikat')->getClientOriginalName());
            $kompetisiinternal->file_sertifikat = $request->file('file_sertifikat')->getClientOriginalName();
            $kompetisiinternal->save();

        }
        return redirect('/kompetisiinternal')->with('sukses','Data berhasil di updates');
    }
    public function delete(Request $request,$id)
    {
        # code..
        $kompetisiinternal = \App\kompetisiinternal::find($id);
        $kompetisiinternal->delete($kompetisiinternal);
        return redirect('/kompetisiinternal')->with('sukses','Data berhasil di Hapus');
    }   

    public function approveindex()
        {
        $kalbisers = kalbiser::all();
        $kompetisiinternals = kompetisiinternal::all();
        $ormawas = Ormawa::all();
        
        return view('approvekompetisi.index', compact('kalbisers','kompetisiinternals','ormawas'));
    }   

    public function approvestatus($id)
    {
        $kompetisiinternal = \App\kompetisiinternal::find($id);
        $kompetisiinternal->status = '1';
        $kompetisiinternal->save();

        return redirect('/approvekompetisi');
    }   
}
