@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tambah Berita</div>

                <div class="card-body">

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger><ul>"
                        @foreach($errors->all() as $errors)
                            <li> {{ $errors }}
                        @endforeach
                        </ul></div>
                    @endif

                    <form method="POST" action="{{ route('berita.update', $berita->id_brt) }}">
                        @csrf @method('PATCH')
                        <input id="id_usr" name="id_usr" type="text" hidden value="{{ Auth::user()->id_usr }}">
                        <div class="form-group row">
                            <label for="judul" class="col-md-2 col-form-label text-md-right">{{ __('Judul') }}</label>

                            <div class="col-md-8">
                                <input id="judul" type="text" class="form-control @error('judul') is-invalid @enderror" 
                                    name="judul" value="{{ $berita->judul }}" required autocomplete="judul" autofocus>

                                @error('judul')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> 

                        <div class="form-group row">
                            <label for="kategori" class="col-md-2 col-form-label text-md-right">{{ __('Kategori') }}</label>

                            <div class="col-md-4">

                                <select class="form-control @error('kategori') is-invalid @enderror" name="id_kat">

                                    <option value="">- Pilih Kategori -</option>
                                    @foreach($kategori as $kat)
                                        <option value="{{ $kat->id_kat }}" 
                                            {{ $berita->id_kat == $kat->id_kat?'selected':'' }}>{{ $kat->nama_kat }}</option>
                                    @endforeach
                                </select>

                                @error('kategori')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> 

                        <div class="form-group row">
                            <label for="isi" class="col-md-2 col-form-label text-md-right">{{ __('Kontent') }}</label>

                            <div class="col-md-10">
                                <textarea id="isi" class="form-control @error('isi') is-invalid @enderror" 
                                name="isi" required autofocus>{{ $berita->isi }}</textarea>

                                @error('isi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> 

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-2">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button>
                                <a href="{{ url('berita/index') }}" class="btn btn-danger">
                                    {{ __('Batal') }}
                                </a>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')

@endsection