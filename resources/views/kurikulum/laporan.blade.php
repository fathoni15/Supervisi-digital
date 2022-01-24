@extends('layouts.template')
@section('title','Laporan')
@section('content')
<div class="container">
    <div class="card border-dark mb-3">
        <div class="card-header">
            <h2>
                Laporan
            </h2>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="example1">
                    <thead>
                        <tr class="text-center">
                            <th>NIP</th>
                            <th>Mapel</th>
                            <th>RPP</th>
                            <th>Embed</th>
                            <th>Status</th>
                            <th>Catatan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $dt)
                        <tr class="text-center">
                            <td>{{$dt->nip}}</td>
                            <td>{{$dt->mapel}}</td>
                            <td><a href="{{asset('rpp/'.$dt->rpp)}}" class="ml-2" target="_blank">lihat</a></td>
                            <td><a href="{{ $dt->embed }}" class="ml-2" target="_blank">lihat</a></td>
                            <td>
                                @if($dt->status == 'lulus')
                                    <span class="badge badge-success">
                                        Lulus
                                    </span>
                                @elseif($dt->status == 'tidak lulus')
                                    <span class="badge badge-danger">
                                        Tidak Lulus
                                    </span>
                                @endif
                            </td>
                            <td>{{$dt->catatan}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
