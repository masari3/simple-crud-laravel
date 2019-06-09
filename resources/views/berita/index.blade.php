@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Daftar Berita</div>

                <div class="card-body">
                    @if ($msg = session('msg'))
                        <div class="alert alert-success alert-dismissable" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="icon fa fa-check"></i>
                            {{ $msg }}
                        </div>
                    @endif
                    <a class="btn btn-success" style="float:right;margin-bottom:15px;" href="{{ route('berita.create') }}"> 
                        Tambah 
                    </a>
                    
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Judul</th>
                                <th>Kategori</th>
                                <th style="width: 50%">Konten</th>
                                <th>Penulis</th>
                                <th style="width: 40px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($berita as $brt)
                            @if( $brt->count() == 0 )
                            <tr><td colspan="4">Tidak ada data</td></td>    
                            @else
                            <tr>
                                <td>{{ ++$no }}</td>
                                <td>{{ $brt->judul }}</td>
                                <td>{{ $brt->nama_kat }}</td>
                                <td>{{ $brt->isi }}</td>
                                <td>{{ $brt->nama_usr }}</td>
                                <td>
                                    <form method="POST" action="{{ route('berita.destroy', $brt->id_brt) }}">
                                    @csrf @method('DELETE')
                                        <div class="btn-group">
                                            <a class="btn btn-sm btn-primary" href="{{ route('berita.edit', $brt->id_brt) }}">Edit</a>
                                            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                            @endif
                        @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Judul</th>
                                <th>Kategori</th>
                                <th style="width: 50%">Konten</th>
                                <th>Penulis</th>
                                <th style="width: 40px">Aksi</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
