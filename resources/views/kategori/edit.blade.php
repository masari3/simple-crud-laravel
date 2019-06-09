@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Kategori</div>

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

                    <form method="POST" action="{{ route('kategori.update', $kategori->id_kat) }}">
                        @csrf @method('PATCH');
                        <div class="form-group row">
                            <label for="nama" class="col-md-2 col-form-label text-md-right">{{ __('Nama') }}</label>

                            <div class="col-md-4">
                                <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" 
                                    name="nama" value="{{ $kategori->nama_kat }}" required autocomplete="nama" autofocus>

                                @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> 

                        <div class="form-group row">
                            <label for="ket" class="col-md-2 col-form-label text-md-right">{{ __('Keterangan') }}</label>

                            <div class="col-md-8">
                                <input id="ket" type="text" class="form-control @error('ket') is-invalid @enderror" 
                                name="ket" value="{{ $kategori->ket  }}" required autocomplete="ket" autofocus>

                                @error('ket')
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
                                <a href="{{ url('kategori/index') }}" class="btn btn-danger">
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
