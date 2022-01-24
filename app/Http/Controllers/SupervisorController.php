<?php

namespace App\Http\Controllers;

use App\Models\Dokumen;
use App\Models\Jadwal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SupervisorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dokumen()
    {
        $data = Dokumen::all();
        return view('supervisor.dokumen', compact('data'));
    }

    public function lulus(Request $request,$id)
    {
        Dokumen::find($id)->update([
            'status' => 'lulus',
            'catatan' => $request->catatan,
        ]);
        return redirect()->route('supervisor.dokumen');
    }

    public function tidakLulus(Request $request,$id)
    {
        Dokumen::find($id)->update([
            'status' => 'tidak lulus',
            'catatan' => $request->catatan,
        ]);
        return redirect()->route('supervisor.dokumen');
    }

    public function batal($id)
    {
        Dokumen::find($id)->update([
            'status' => 'belum',
            'catatan' => '',
        ]);
        return redirect()->route('supervisor.dokumen');
    }

    public function index()
    {
        $data = Jadwal::where('id_supervisor','=', Auth::user()->nip)->get();
        return view('supervisor.home', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
