@extends('layouts.template')
@section('title','Guru')
@section('content')
<div class="container">
    <div class="card border-dark mb-3">
        <div class="card-header">
            <h2>Jadwal</h2>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="example1">
                    <thead>
                        <tr class="text-center">
                            <th>NIP</th>
                            <th>Nama Guru</th>
                            <th>Tanggal</th>
                            <th>jam</th>
                            <th>ID Supervisor</th>
                            <th>Nama Supervisor</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $dt)
                        <tr class="text-center">
                            <td>{{$dt->nip}}</td>
                            <td>{{$dt->guru->nama}}</td>
                            <td>{{$dt->tanggal}}</td>
                            <td>{{$dt->jam_mulai}} - {{$dt->jam_selesai}}</td>
                            <td>{{$dt->id_supervisor}}</td>
                            <td>{{$dt->supervisor->nama}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
