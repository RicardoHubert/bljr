<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index()
    {
    	# code...

    	return view('dashboard.index');
    }
    public function visimisi(){
    	return view('frontend.visimisi');
    }
    public function home_frontend(){
    	return view('frontend.home');
    }
}
