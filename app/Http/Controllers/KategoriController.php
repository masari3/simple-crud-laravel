<?php

namespace App\Http\Controllers;

use App\Kategori;
use Illuminate\Http\Request;
use Redirect;

class KategoriController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $limit = 5;
        $no = 0;
        $kategori = Kategori::orderby('id_kat', 'desc')
            ->simplePaginate($limit);

        return view('kategori.index', ['kategori' => $kategori], compact('kategori', 'no'));
    }

    public function create()
    {
        $kategori = Kategori::all();
        return view('kategori.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        $kategori = new Kategori;
        $kategori->nama_kat = $request['nama'];
        $kategori->ket = $request['ket'];
        $kategori->save();

        return Redirect::route('kategori.index');
    }

    public function edit($id)
    {
        $kategori = Kategori::all();
        $kategori = Kategori::find($id);

        return view('kategori.edit', compact('kategori', 'berita'));
    }

    public function update(Request $request, $id)
    {
        $kategori = Kategori::find($id);
        $kategori->nama_kat = $request['nama'];
        $kategori->ket = $request['ket'];
        $kategori->update();   

        return Redirect::route('kategori.index');
    }

    public function destroy($id)
    {
        $kategori = Kategori::find($id);
        $kategori->delete();   

        return Redirect::route('kategori.index');
    }
}
