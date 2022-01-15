@extends('layouts.template')
@section('content')
@section('title','Guru')
<div class="container">
  <div class="card border-dark mb-3">
    <div class="card-body">
        <form method="POST" action="{{ route('kurikulum.guruPost') }}" enctype="multipart/form-data">
          @csrf

            <input type="hidden" name="nip" value="{{ Auth::user()->nip }}">

          <div class="form-group">
            <label for="">Mapel</label>
            <input id="mapel" type="text" class="form-control @error('mapel') is-invalid @enderror" name="mapel" value="{{ old('mapel') }}" required autocomplete="mapel" autofocus>
              @error('mapel')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
          <div class="form-group">
            <label for="">RPP</label>
            <input id="rpp" type="file" class="form-control @error('rpp') is-invalid @enderror" name="rpp" value="{{ old('rpp') }}" required autocomplete="rpp" autofocus>
              @error('rpp')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
          <div class="form-group">
            <label for="">Embed Link</label>
            <input id="embed" type="embed" class="form-control @error('embed') is-invalid @enderror" name="embed" value="{{ old('embed') }}" required autocomplete="embed" autofocus>
              @error('embed')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>

          <button type="submit" class="btn btn-primary float-right"><i class="fas fa-paper-plane"></i> Kirim </button>
      </form>
    </div>
  </div>
</div>
@endsection
