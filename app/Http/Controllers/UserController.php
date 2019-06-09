<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Hash;
use Redirect;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = User::all();
        return view('user.profile');
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('user.edit');
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->nama_usr = $request['nama'];
        $user->email = $request['email'];
        $user->hp = $request['hp'];
        $user->foto = $request['foto'];
        if(!empty($request['password']))
        	$user->password = bcrypt($request['password']);
        $user->update();
    }

    public function cProfile(Request $request, $id){
        $msg = "success";
        $user = User::find($id);

        if(!empty($request['password'])){
            if(Hash::check($request['passwdl'], $user->password)){
                $user->password = bcrypt($request['password']);
            }else{
                $msg = 'error';
            }
        }

        if($request->hasFile('foto')){
            $file = $request->file('foto');
            $nama_gambar = $id."__".$file->getClientOriginalExtension();
            $lokasi = public_path('img');

            $file->move($lokasi, $nama_gambar);
            $user->foto = $nama_gambar;
            $datagambar = $nama_gambar;
        }else{
            $datagambar = $user->foto;
        }

        $user->update();

        return Redirect::route('user.profile')->with('msg', 'Foto berhasil diperbarui!');
    }
}
