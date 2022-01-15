<?php

namespace App\Http\Controllers;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(auth()->user()->role == 'guru'){
            return redirect()->route('guru.home');
        } 
        elseif(auth()->user()->role == 'kurikulum'){
            return redirect()->route('kurikulum.home');
        } 
        elseif(auth()->user()->role == 'kepsek'){
            return redirect()->route('kepsek.home');
        }
    }
}
