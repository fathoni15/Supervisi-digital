@extends('layouts.template')
@section('title','Supervisor')
@section('content')
<div class="container">
    <div class="card border-dark mb-3">
        <div class="card-header">
            <h2>
                Dokumen
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
                            <th>Action</th>
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
                                @else
                                    <span class="badge badge-primary">
                                        Belum
                                    </span>
                                @endif
                            </td>
                            <td>
                                <div class="btn-group dropdown">
                                    <button type="button" class="btn btn-success dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Action
                                    </button>
                                    <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 30px, 0px);">
                                        <button type="button" class="dropdown-item" data-toggle="modal" data-target="{{ '#lulus'.$dt->id }}">
                                            Lulus
                                        </button>
                                        <button type="button" class="dropdown-item" data-toggle="modal" data-target="{{ '#tidakLulus'.$dt->id }}">
                                            Tidak lulus
                                        </button>
                                        <a href="{{ route('supervisor.batal', $dt->id) }}" class="dropdown-item">
                                            Batalkan
                                        </a>
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


@foreach ($data as $dt)
{{-- modal lulus --}}
<div id="{{ 'lulus'.$dt->id }}" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- konten modal-->
        <div class="modal-content">
            <!-- heading modal -->
            <div class="modal-header">
                <h5 class="modal-title">Catatan</h5>
            </div>
            <!-- body modal -->
            <form class="" method="post" action="{{route('supervisor.lulus', $dt->id)}}" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="modal-body">
                    <label for="catatan">Catatan selama supervisi</label>
                    <textarea name="catatan" id="catatan" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <!-- footer modal -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-paper-plane"></i> Kirim </button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- modal tidakLulus --}}
<div id="{{ 'tidakLulus'.$dt->id }}" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- konten modal-->
        <div class="modal-content">
            <!-- heading modal -->
            <div class="modal-header">
                <h5 class="modal-title">Catatan</h5>
            </div>
            <!-- body modal -->
            <form class="" method="post" action="{{route('supervisor.tidakLulus', $dt->id)}}" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="modal-body">
                    <label for="catatan">Catatan selama supervisi</label>
                    <textarea name="catatan" id="catatan" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <!-- footer modal -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-paper-plane"></i> Kirim </button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
@endsection
