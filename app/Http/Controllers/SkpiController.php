<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SkpiController extends Controller
{
    //
    public function index(Request $request)
    {
        if($request->has('cari')){
            $data_kalbiser = \App\kalbiser::where('Prodi','LIKE','%'.$request->cari. '%')->get(); 
                $data_skpi = \App\Skpi::all();
               $paginate = \App\Skpi::paginate(3);
        }else{
    	# code...
    $data_skpi = \App\Skpi::all();
    $data_kalbiser = \App\kalbiser::all();
    }

	return view('skpi.index',['data_skpi' => $data_skpi,'data_kalbiser' => $data_kalbiser]);
    }

      public function create(Request $request)
    {
        # code...
       $Skpi= \App\Skpi::create($request->all());

        if($request->hasfile('file_skpi')){
            $request->file('file_skpi')->move('fileskpi/',$request->file('file_skpi')->getClientOriginalName());
            $Skpi->file_skpi = $request->file('file_skpi')->getClientOriginalName();
            $Skpi->save();
        }
        return redirect('/skpi')->with('sukses','Data berhasil diinput');
    }



    public function edit($id)
    {
        # code...
        $data_skpi= \App\Skpi::find($id);
        $data_ormawa = \App\Ormawa::all();
        $data_kalbiser = \App\kalbiser::all();
        return view('skpi/edit',['data_skpi' => $data_skpi,'data_kalbiser' => $data_kalbiser,'data_ormawa' => $data_ormawa]);
    }
    public function update(Request $request,$id)
    {
        # code...
        //dd($request->all());

        $data_skpi = \App\Skpi::find($id);
        $data_ormawa = \App\Ormawa::find($id);
        $data_kalbiser = \App\kalbiser::find($id);
        // $data_kompetisi = \App\Kompetisiinternal::find($id);
        // $data_kegiatan = \App\Kegiatan::find($id);
        

        $request->validate([
            'user_id' => 'nullable',
            // 'kompetisi_id' => 'nullable',
            // 'kegiatan_id' => 'nullable',
            'jenis_dokumen' => 'nullable',
            'tanggal_dokumen' => 'nullable',
            'judul_sertifikat' => 'nullable',
            'ormawa_id' => 'nullable',
        ]);

            $data_skpi->user_id = $request->user_id;
            // $data_skpi->kompetisi_id = $request->kompetisi_id;
            // $data_skpi->kegiatan_id = $request->kegiatan_id;

            $data_skpi->jenis_dokumen = $request->jenis_dokumen;
            $data_skpi->ormawa_id = $request->ormawa_id;

        $data_skpi->save();

   return redirect('/skpi')->with('sukses','Data berhasil di updates');
    
    }



     public function delete(Request $request,$id)
    {
        # code..
        $Skpi = \App\Skpi::find($id);
        $Skpi->delete($Skpi);
        return redirect('/skpi')->with('sukses','Data berhasil di Hapus');
    }

        public function approveindex(Request $request)
    {
        # code...
    $data_skpi = \App\Skpi::all();
    $data_kalbiser = \App\kalbiser::all();
    $data_kompetisi = \App\kompetisiinternal::all();
    $data_ormawa = \App\Ormawa::all();
    $data_kegiatan = \App\Kegiatan::all();


    return view('approveskpi.index',['data_skpi' => $data_skpi,'data_kalbiser' => $data_kalbiser,'data_kompetisi' => $data_kompetisi,'data_kegiatan' => $data_kegiatan, 'data_ormawa' => $data_ormawa]);
    }

        public function approvestatus($id)
    {
        $skpi = \App\Skpi::find($id);
        $skpi->status = '1';
        $skpi->save();

        return redirect('/approveskpi');
    }      

    public function approvestatusall()
    {
        $approveId = request('approveId');
        $skpi = \App\Skpi::whereIn('id', $approveId)->get();
        
        foreach ($skpi as $skpirow) {
    // Code Here
         $skpirow->status = '1';
         $skpirow->save();
        }
        return redirect('/approveskpi');
    }   
}

