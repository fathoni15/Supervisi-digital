@extends('layouts.template')
@section('title','Kurikulum')
@section('content')
<div class="container">
    <div class="card border-dark mb-3">
        <div class="card-header">
            <h2>
                List User
                <a href="{{ route('kurikulum.create') }}" class="btn btn-primary float-right">Tambah user</a>
            </h2>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="example1">
                    <thead>
                        <tr class="text-center">
                            <th>NIP</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Email</th>
                            <th>Jabatan</th>
                            <th>Supervisor</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $dt)
                        <tr class="text-center">
                            <td>{{$dt->nip}}</td>
                            <td>{{$dt->nama}}</td>
                            <td>{{$dt->alamat}}</td>
                            <td>{{$dt->email}}</td>
                            <td>{{$dt->role}}</td>
                            <td>
                                @if($dt->supervisor =='0')
                                    <span class="badge badge-danger">
                                        No
                                    </span>
                                @elseif($dt->supervisor =='1')
                                    <span class="badge badge-primary">
                                        Yes
                                    </span>
                                @endif
                            </td>
                            <td>
                                <div class="btn-group dropdown">
                                    <button type="button" class="btn btn-success dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Action
                                    </button>
                                    <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 30px, 0px);">
                                        @if($dt->supervisor=='0')
                                            <a href="{{ route('kurikulum.jadikan', $dt->id) }}" class="dropdown-item">
                                                Jadikan
                                            </a>
                                        @elseif($dt->supervisor=='1')
                                            <a href="{{ route('kurikulum.batalkan', $dt->id) }}" class="dropdown-item">
                                                Batalkan
                                            </a>
                                        @endif
                                        <a href="{{ route('kurikulum.edit', $dt->id) }}" class="dropdown-item">Edit</a>
                                        <form action="{{ route('kurikulum.destroy', $dt->id) }}" method="post">
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
