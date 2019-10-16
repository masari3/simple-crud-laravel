@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Profile</div>

                <div class="card-body">
                    @if (session('msg'))
                        <div class="alert alert-success" role="alert">
                            {{ session('msg') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('user.change', Auth::user()->id) }}" enctype="multipart/form-data">
                        @csrf @method('PATCH')
                        <div class="box box-primary">
                            <div class="box-body box-profile">
                                <img class="profile-user-img img-responsive img-circle" src="../img/{{ Auth::user()->foto }}" alt="User profile picture">

                                <h3 class="profile-username text-center">{{ Auth::user()->nama}}</h3>

                                <p class="text-muted text-center">Software Engineer</p>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="input-group col-md-6" style="float:none;margin:0 auto;">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="foto">Upload</span>
                                </div>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="foto" name="foto"
                                    aria-describedby="foto" value="{{ Auth::user()->foto }}">
                                    <label class="custom-file-label" for="foto">Pilih foto</label>
                                </div>
                            </div>
                        </div>
                        <hr/>
                        <div class="form-group row">
                            <label for="nama" class="col-md-4 col-form-label text-md-right">{{ __('Nama *') }}</label>

                            <div class="col-md-6">
                                <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" 
                                    name="nama" value="{{ Auth::user()->nama_usr }}" required autocomplete="nama" autofocus>

                                @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Alamat E-Mail *') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" 
                                    name="email" value="{{ Auth::user()->email }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="hp" class="col-md-4 col-form-label text-md-right">{{ __('Nomer HP *') }}</label>

                            <div class="col-md-6">
                                <input id="hp" type="text" class="form-control @error('hp') is-invalid @enderror" 
                                    name="hp" value="{{ Auth::user()->hp }}" required autocomplete="hp" autofocus>

                                @error('hp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="passwdl" class="col-md-4 col-form-label text-md-right">{{ __('Password Lama *') }}</label>

                            <div class="col-md-6">
                                <input id="passwdl" type="password" class="form-control @error('passwdl') is-invalid @enderror" 
                                    name="passwdl" autocomplete="new-password">
                                    
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password Baru *') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" 
                                    name="password" autocomplete="new-password">
                                    
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Ulangi Password *') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" 
                                    name="password_confirmation" autocomplete="new-password">
                                <small>* Biarkan tetap kosongkan jika tidak ingin mengganti</small>
                            </div>
                        </div>
                        <hr/>
                        <!-- <div class="form-group row"> -->
                            <div class="col-md-3" style="margin:0 auto">
                                <div class="btn-group">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Perbarui') }}
                                    </button>

                                    <a href="{{ url('home') }}" class="btn btn-danger">
                                        {{ __('Batal') }}
                                    </a>
                                </div>
                            </div>
                        <!-- </div> -->
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
