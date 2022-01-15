<?php

namespace App\Http\Controllers;

use App\Models\Dokumen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use DB;
use App\Models\User;
use App\Models\Jadwal;

class KurikulumController extends Controller
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
        $data = Jadwal::all();
        return view('kurikulum.listJadwal', compact('data'));
    }

    public function jadwalCreate()
    {
        $dataGuru = User::where('role','=','guru')->where('supervisor','=','0')->get();
        $dataSupervisor = User::where('supervisor','=','1')->get();

        return view('kurikulum.jadwalAdd', compact('dataGuru','dataSupervisor'));

    }

    public function jadwalPost(Request $request)
    {
        Jadwal::create($request->all());
        return redirect()->route('kurikulum.jadwal');
    }

    public function jadwalDelete($id)
    {
        Jadwal::destroy($id);
        return redirect()->route('kurikulum.jadwal');
    }

    public function jadwalEdit($id)
    {
       $dataGuru = User::find($id)->where('role','=','guru')->where('supervisor','=','0')->get();
       $dataSupervisor = User::find($id)->where('supervisor','=','1')->get();

       return view('kurikulum.jadwalEdit', compact('dataGuru','dataSupervisor'));
    }

    public function jadawalUpdate(Request $request, $id)
    {
        //
    }

    public function guru()
    {
        $data = Dokumen::all();
        return view('kurikulum.guru.dokumen', compact('data'));
    }

    public function guruCreate()
    {
        $data = Dokumen::all();
        return view('kurikulum.guru.input', compact('data'));
    }

    public function guruPost(Request $request)
    {
        $request->validate ([
            'nip'=>'required',
            'mapel'=>'required',
            'rpp'=>'required',
            'embed'=>'required',
        ]);

        Dokumen::create($request->all());
        return redirect()->route('kurikulum.guru');
    }


    public function index()
    {
        $data = User::where('nama','!=','kurikulum')->get();
        return view('kurikulum.home', compact('data'));
    }

    public function jadikan($id)
    {
        User::find($id)->update([
            'supervisor' => 1
        ]);

        return redirect()->back();
    }

    public function batalkan($id)
    {
        User::find($id)->update([
            'supervisor' => 0
        ]);

        return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::All();
        return view('kurikulum.inputUser', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        User::create ([
            'nip'=>$request->nip,
            'nama'=>$request->nama,
            'alamat'=>$request->alamat,
            'email'=>$request->email,
            'password'=> Hash::make($request['nip']),
        ]);

        return redirect()->route('kurikulum.index');
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
        $user = User::find($id);
        return view('kurikulum.editUser', compact('user'));
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
        $data = User::where('id', $id)->first();

        $user = User::find($id)->update([
            'nip'=>$request->nip,
            'nama'=>$request->nama,
            'alamat'=>$request->alamat,
            'email'=>$request->email,
            'password'=> Hash::make($request['nip']),
        ]);

        return redirect()->route('kurikulum.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        return redirect('/');
    }
}
