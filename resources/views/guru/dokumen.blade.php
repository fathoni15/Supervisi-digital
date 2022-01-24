@extends('layouts.template')
@section('title','Guru')
@section('content')
<div class="container">
    <div class="card border-dark mb-3">
        <div class="card-header">
            <h2>
                Dokumen
                <a href="{{ route('guru.create') }}" class="btn btn-primary float-right">Input Dokumen</a>
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
                                <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#myModal">Cek Info</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- konten modal-->
        <div class="modal-content">
            <!-- heading modal -->
            <div class="modal-header">
                <h5 class="modal-title">Cek Status</h5>
            </div>
            <!-- body modal -->
            <div class="modal-body">
                @foreach ($data as $dt)
                    @if($dt->status == 'lulus')
                        <h2> Anda lulus supervisi</h2>
                        <div class="form-group">
                            <label for="catatan">Catatan :</label>
                            <textarea id="catatan" cols="30" rows="10" class="form-control" disabled>{{ $dt->catatan }}</textarea>
                        </div>
                    @elseif($dt->status == 'tidak lulus')
                        <h2> Anda tidak lulus supervisi</h2>
                        <div class="form-group">
                            <label for="catatan">Catatan :</label>
                            <textarea id="catatan" cols="30" rows="10" class="form-control" disabled>{{ $dt->catatan }}</textarea>
                        </div>
                    @else
                        Mohon Menunggu...
                    @endif
                @endforeach
            </div>
            <!-- footer modal -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
@endsection
