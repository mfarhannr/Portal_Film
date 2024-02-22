<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Kategori;
use App\Models\User;
use Illuminate\Http\Request;
use File;

class BeritaController extends Controller
{
    public function index()
    {
        $allBerita = Berita::get();
        return view('admin.berita.index', compact('allBerita'));
    }

    public function create()
    {
        $kategori = Kategori::get();
        $user     = User::get();
        return view('admin.berita.create', compact('kategori', 'user'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'user_id'       => '',
            'kategori_id'   => 'required',
            'judul'         => 'required',
            'gambar'        => 'required|image|mimes:jpg,png,jpeg',
            'isi'           => 'required'
        ]);


        $gambarName = time() . '.' . $request->gambar->extension();

        $request->gambar->move(public_path('img/gambar'), $gambarName);

        $berita = new Berita;

        $berita->user_id     = auth()->user()->id;
        $berita->kategori_id = $request->kategori_id;
        $berita->judul       = $request->judul;
        $berita->gambar      = $gambarName;
        $berita->isi         = $request->isi;

        $berita->save();

        return redirect('/berita')->with('success', 'added data successfully');
    }

    public function edit($id)
    {
        $kategori = Kategori::get();
        $user     = User::get();
        $berita   = Berita::findOrFail($id);
        return view('admin.berita.edit', compact('berita', 'kategori', 'user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id'       => '',
            'kategori_id'   => 'required',
            'judul'         => 'required',
            'gambar'        => 'image|mimes:jpg,png,jpeg',
            'isi'           => 'required'
        ]);


        if ($request->has('gambar')) {
            $berita = Berita::find($id);

            $path = "img/gambar/";
            File::delete($path . $berita->gambar);

            $gambarName = time() . '.' . $request->gambar->extension();

            $request->gambar->move(public_path('img/gambar'), $gambarName);

            $berita->user_id     = auth()->user()->id;
            $berita->kategori_id = $request->kategori_id;
            $berita->judul       = $request->judul;
            $berita->gambar      = $gambarName;
            $berita->isi         = $request->isi;

            $berita->save();

            return redirect('/berita');
        } else {
            $berita = Berita::find($id);

            $berita->user_id     = auth()->user()->id;
            $berita->kategori_id = $request->kategori_id;
            $berita->judul       = $request->judul;
            $berita->isi         = $request->isi;

            $berita->save();

            return redirect('/berita');
        }
    }


    public function destroy($id)
    {
        $berita = Berita::find($id);

        $path = "img/gambar/";
        File::delete($path . $berita->gambar);
        $berita->delete();

        return redirect('/berita')->with('success', 'success, data deleted');
    }
}
