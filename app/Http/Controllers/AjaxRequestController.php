<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\kalbiser as Kalbiser;
use App\Ormawa;
use App\Kegiatan;
use Illuminate\Support\Facades\Auth;

class AjaxRequestController extends Controller
{
    private function getOrmawa(Request $request){
        return response()->json(
            Ormawa::where("nama_ormawa", "LIKE", "%".$request->query("q")."%")
                ->orWhere("ormawa_id", "LIKE", "%".$request->query("q")."%")
                ->get()
        );
    }

    private function getKalbiser(Request $request){
        if(Auth::user()->role == "student"){
            return response()->json(
                [
                    Auth::user()->kalbiser
                ]
            );
        }else{
            return response()->json(
                Kalbiser::where("nama", "LIKE", "%".$request->query("q")."%")
                    ->orWhere("id", "LIKE", "%".$request->query("q")."%")
                    ->orWhere("nim", "LIKE", "%".$request->query("q")."%")
                    ->get()
            );
        }
    }

    private function getKegiatan(Request $request){
        return response()->json(
            Kegiatan::where("nama_kegiatan", "LIKE", "%".$request->query("q")."%")
                ->orWhere("id", "LIKE", "%".$request->query("q")."%")
                ->get()
        );
    }

    public function getDatas(Request $request){
        if($request->query("type") == "ormawa") return $this->getOrmawa($request);
        if($request->query("type") == "kalbiser") return $this->getKalbiser($request);
        if($request->query("type") == "kegiatan") return $this->getKegiatan($request);
    }
}
