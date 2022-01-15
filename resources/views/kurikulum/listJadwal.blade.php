@extends('layouts.template')
@section('title','Kurikulum')
@section('content')
<div class="container">
    <div class="card border-dark mb-3">
        <div class="card-header">
            <h2>
                Jadwal
                <a href="{{ route('kurikulum.jadwalCreate') }}" class="btn btn-primary float-right">Buat Jadwal</a>
            </h2>
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
                            <th>Action</th>
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
                            <td>
                                <div class="btn-group dropdown">
                                    <button type="button" class="btn btn-success dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Action
                                    </button>
                                    <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 30px, 0px);">
                                        <a href="{{ route('kurikulum.edit', $dt->id) }}" class="dropdown-item">Edit</a>
                                        <form action="{{ route('kurikulum.jadwalDelete', $dt->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                            <button type="submit" class="dropdown-item" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Hapus</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
