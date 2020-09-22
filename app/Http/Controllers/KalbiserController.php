<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
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
        return redirect('/kalbiser')->with('sukses','Data berhasil di Hapus');
    }
     public function profile($id){
        $kalbiser = \App\kalbiser::find($id);
        return view('kalbiser.profile',['kalbiser' => $kalbiser]);
    }                   
}