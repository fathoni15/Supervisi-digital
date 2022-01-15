@extends('layouts.template')
@section('title','Guru')
@section('content')
<div class="container">
    <div class="card border-dark mb-3">
        <div class="card-header">
            <h2>
                Dokumen
                <a href="{{ route('kurikulum.guruCreate') }}" class="btn btn-primary float-right">Input Dokumen</a>
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
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $dt)
                        <tr class="text-center">
                            <td>{{$dt->nip}}</td>
                            <td>{{$dt->mapel}}</td>
                            <td>{{$dt->rpp}}</td>
                            <td>{{$dt->embed}}</td>
                            <td>
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
