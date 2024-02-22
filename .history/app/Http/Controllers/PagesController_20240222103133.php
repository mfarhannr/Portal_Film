<?php

namespace App\Http\Controllers;

use App\Models\Film;

class PagesController extends Controller
{
    public function index()
    {
        $film = Film::get();
        return view('pages.home', compact('film','jumlahPengguna', 'jumlahBerita', 'jumlahKategori'));

        $jumlahPengguna = User::count();
        $jumlahBerita = Berita::count();
        $jumlahKategori = Kategori::count();
 compact('jumlahPengguna', 'jumlahBerita', 'jumlahKategori'));
    }
    public function detail($id)
    {
        $film = Film::findOrFail($id);
        $allFilm = Film::paginate(4);
        return view('pages.detail', compact('film', 'allFilm'));
    }
}
