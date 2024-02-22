<?php

namespace App\Http\Controllers;

use App\Models\film;
use App\Models\Kategori;
use App\Models\User;
use Illuminate\Http\Request;
use File;

class filmController extends Controller
{
    public function index()
    {
        $allfilm = film::get();
        return view('admin.film.index', compact('allfilm'));
    }

    public function create()
    {
        $kategori = Kategori::get();
        $user     = User::get();
        return view('admin.film.create', compact('kategori', 'user'));
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

        $film = new film;

        $film->user_id     = auth()->user()->id;
        $film->kategori_id = $request->kategori_id;
        $film->judul       = $request->judul;
        $film->gambar      = $gambarName;
        $film->isi         = $request->isi;

        $film->save();

        return redirect('/film')->with('success', 'added data successfully');
    }

    public function edit($id)
    {
        $kategori = Kategori::get();
        $user     = User::get();
        $film   = film::findOrFail($id);
        return view('admin.film.edit', compact('film', 'kategori', 'user'));
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
            $film = film::find($id);

            $path = "img/gambar/";
            File::delete($path . $film->gambar);

            $gambarName = time() . '.' . $request->gambar->extension();

            $request->gambar->move(public_path('img/gambar'), $gambarName);

            $film->user_id     = auth()->user()->id;
            $film->kategori_id = $request->kategori_id;
            $film->judul       = $request->judul;
            $film->gambar      = $gambarName;
            $film->isi         = $request->isi;

            $film->save();

            return redirect('/film');
        } else {
            $film = film::find($id);

            $film->user_id     = auth()->user()->id;
            $film->kategori_id = $request->kategori_id;
            $film->judul       = $request->judul;
            $film->isi         = $request->isi;

            $film->save();

            return redirect('/film');
        }
    }


    public function destroy($id)
    {
        $film = film::find($id);

        $path = "img/gambar/";
        File::delete($path . $film->gambar);
        $film->delete();

        return redirect('/film')->with('success', 'success, data deleted');
    }
}
