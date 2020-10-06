<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Skpi;
use Jenssegers\Date\Date;
use App\User;
class KalbiserController extends Controller
{
    //
     public function index(Request $request){
     $data_kalbiser = \App\kalbiser::all();
      return view('kalbiser.index',['data_kalbiser' => $data_kalbiser]);
     }

      public function create(Request $request)
    {
        # code...
           # Insert Ke table user
        $user = new \App\User;
        $user->name = $request->nama;
        $user->role = 'student';
        $user->email = $request->email;
        $user->password = bcrypt('12345');
        $user->remember_token = str::random(60);
        $user->save();

        #insert ke table kalbiser
       $request->request->add(['user_id' => $user->id]);
       $kalbiser=\App\kalbiser::create($request->all());
       if($request->hasfile('foto')){
       $request->file('foto')->move('fotokalbiser/',$request->file('foto')->getClientOriginalName());
       $kalbiser->foto = $request->file('foto')->getClientOriginalName();
       $kalbiser->save();
   		}
       return redirect('/kalbiser')->with('sukses','Data berhasil diinput');
        }

  	public function edit($id)
    {
        # code...
        $kalbiser = \App\kalbiser::find($id);
        return view('kalbiser/edit',['kalbiser' => $kalbiser]);
    }
    public function update(Request $request,$id)
    {
        # code...
        //dd($request->all());
        $kalbiser = \App\kalbiser::find($id);
        $kalbiser->update($request->all());
      	if($request->hasfile('foto')){
            $request->file('foto')->move('fotokalbiser/',$request->file('foto')->getClientOriginalName());
            $kalbiser->foto = $request->file('foto')->getClientOriginalName();
            $kalbiser->save();

        }
        return redirect('/kalbiser')->with('sukses','Data berhasil di updates');
    }
     public function delete(Request $request,$id)
    {
        # code..
        $kalbiser = \App\kalbiser::find($id);
        $kalbiser->delete($kalbiser);
       User::find($kalbiser->user_id)->delete();

        return redirect('/kalbiser')->with('sukses','Data berhasil di Hapus');
    }
     public function profile($id){
        $kalbiser = \App\kalbiser::find($id);
        $Skpi = \App\Skpi::all();
        $dokumenkalbiser = \App\dokumenkalbiser::all();
        $users = \App\user::all();
        return view('kalbiser.profile',['kalbiser' => $kalbiser,'Skpi' => $Skpi, 'users' => $users, 'dokumenkalbiser' => $dokumenkalbiser]);
    } 


      public function wordkalbiser()
    {
    $phpWord = new \PhpOffice\PhpWord\PhpWord();

    $section = $phpWord->addSection();
    
    $data = $this->dataBasedOnPermission();                     
    Date::setLocale('id');

        foreach($data as $index => $skpi) {
          $dateFormat = Date::parse($skpi->tanggal_dokumen)->format('d F Y');
            $glue = $index + 1 . '.'. ' '. $skpi->user->name . ' - ' . $skpi->judul_sertifikat . ', '. $dateFormat. ', ' . $skpi->penyelenggara;
            $section->addText($glue);            
    }

    // Saving the document as OOXML file...
    $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
    $objWriter->save('helloWorld.docx');

        return response()->download(public_path('helloWorld.docx'));

    }

    private function dataBasedOnPermission()
    {
    $data = [];
    $role = auth()->user()->role;

    // Admin
    if($role == 'admin') {
      $data = Skpi::all();
    } else if($role == 'Ormawa') {
      $ormawaId = Ormawa::where('user_id', auth()->user()->id)->first();
      $data = Skpi::where('ormawa_id', $ormawaId->id)->get();
    } else {
      $data = Skpi::where('user_id', auth()->user()->id)->get();
    }

    return $data;
    }                  
}