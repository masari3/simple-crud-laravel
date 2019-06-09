<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Berita;
use App\Kategori;
use Auth;

use Redirect;

class BeritaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $limit = 5;
        $no = 0;
        $berita = Berita::leftjoin('kategori', 'kategori.id_kat', '=', 'berita.id_kat')
        ->leftjoin('users', 'users.id_usr', '=', 'berita.id_usr')->get();

        return view('berita.index', ['berita' => $berita], compact('berita', 'no', 'kategori', 'users'));
    }

    public function create()
    {
        $kategori = Kategori::all();
        return view('berita.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        $berita = new Berita;
        $berita->judul = $request['judul'];
        $berita->id_kat = $request['id_kat'];
        $berita->isi = $request['isi'];
        $berita->id_usr = $request['id_usr'];
        $berita->save();

        return Redirect::route('berita.index')->with('msg','Data telah berhasil disimpan!');
    }

    public function edit($id)
    {
        $kategori = Kategori::all();
        $berita = Berita::all();
        $berita = Berita::find($id);

        return view('berita.edit', compact('berita', 'kategori'));
    }

    public function update(Request $request, $id)
    {
        $berita = Berita::find($id);
        $berita->judul = $request['judul'];
        $berita->id_kat = $request['id_kat'];
        $berita->isi = $request['isi'];
        $berita->id_usr = $request['id_usr']; 
        $berita->update();   

        return Redirect::route('berita.index')->with('msg','Data telah berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $berita = Berita::find($id);
        $berita->delete();   

        return Redirect::route('berita.index')->with('msg','Data telah berhasil dihapus!');
    }
}
