@extends('layouts.template')
@section('content')
@section('title','Kurikulum')
<div class="container">
  <div class="card border-dark mb-3">
    <div class="card-body">
        <form method="POST" action="{{ route('kurikulum.update', $user->id) }}" enctype="multipart/form-data">
          @csrf
          @method('patch')
          <div class="form-group">
            <label for="">NIP</label>
            <input id="nip" type="number" class="form-control @error('nip') is-invalid @enderror" name="nip" value="{{$user->nip}}" required autocomplete="nip" autofocus>
              @error('nip')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
          <div class="form-group">
            <label for="">Nama</label>
            <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{$user->nama}}" required autocomplete="nama" autofocus>
              @error('nama')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
          <div class="form-group">
            <label for="">Alamat</label>
            <textarea id="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" required autocomplete="alamat" autofocus>{{$user->alamat}}</textarea>
              @error('alamat')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
          <div class="form-group">
            <label for="">Email</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$user->email}}" required autocomplete="email" autofocus>
              @error('email')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>

          <button type="submit" class="btn btn-success float-right">Update</button>
      </form>
    </div>
  </div>
</div>
@endsection