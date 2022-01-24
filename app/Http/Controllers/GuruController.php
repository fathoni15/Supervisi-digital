<?php

namespace App\Http\Controllers;

use App\Models\Dokumen;
use Illuminate\Http\Request;
use App\Models\Jadwal;
use Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function jadwal()
    {
        $data = Jadwal::where('nip','=', Auth::user()->nip)->get();
        return view('guru.home', compact('data'));
    }

    public function belum()
    {
        $data = Dokumen::where('status','=','belum')->and('nama','!=','kurikulum');
        return view('guru.dokumen', compact('data'));
    }

    public function lulus()
    {
        $data = Dokumen::where('status','=','lulus')->and('nama','!=','kurikulum');
        return view('guru.dokumen', compact('data'));
    }

    public function tidakLulus()
    {
        $data = Dokumen::where('status','=','tidak lulus')->and('nama','!=','kurikulum');
        return view('guru.dokumen', compact('data'));
    }

    public function index()
    {
        $data = Dokumen::where('nip','=', Auth::user()->nip)->get();
        return view('guru.dokumen', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Dokumen::all();
        return view('guru.input', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate ([
            'nip'=>'required',
            'mapel'=>'required',
            'rpp'=>'required|mimes:pdf|max:2048',
            'embed'=>'required',
        ]);

        $name = time().'.'. $request->file('rpp')->getClientOriginalName();
        $request->rpp->move(public_path('rpp'), $name);

        Dokumen::create([
            'nip' => $request->nip,
            'mapel' => $request->mapel,
            'rpp' => $name,
            'embed' => $request->embed,
        ]);
        return redirect()->route('guru.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
