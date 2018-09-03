<?php

namespace App\Http\Controllers;

use App\Country;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function setSession($id){

        $sponsor = Country::where('id',$id)->first();

        $sponsor_code = $sponsor->sponsor_code;

        session(['sponsor'=>$sponsor_code]);

        return view('home');
    }
}
