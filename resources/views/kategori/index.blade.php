@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Kategori</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a class="btn btn-success" style="float:right;margin-bottom:15px;" href="{{ route('kategori.create') }}"> 
                        Tambah 
                    </a>
                    
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Nama</th>
                                <th>Keterangan</th>
                                <th style="width: 40px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($kategori as $kat)
                            @if( $kat->count() == 0 )
                            <tr><td colspan="4">Tidak ada data</td></td>    
                            @else
                            <tr>
                                <td>{{ ++$no }}</td>
                                <td>{{ $kat->nama_kat }}</td>
                                <td>
                                    {{ $kat->ket }}
                                </td>
                                <td>
                                    <form method="POST" action="{{ route('kategori.destroy', $kat->id_kat) }}">
                                    @csrf @method('DELETE')
                                        <div class="btn-group">
                                            <a class="btn btn-sm btn-primary" href="{{ route('kategori.edit', $kat->id_kat) }}">Edit</a>
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
                                <th>Nama</th>
                                <th>Keterangan</th>
                                <th style="width: 40px">Aksi</th>
                            </tr>
                        </tfoot>
                    </table>
                    {{ $kategori->links() }}                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
