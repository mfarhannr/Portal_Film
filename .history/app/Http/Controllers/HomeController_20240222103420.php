<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $jumlahPengguna = User::count();
        $jumlahBerita = Berita::count();
        $jumlahKategori = Kategori::count();

        return view('informasi.index', compact('jumlahPengguna', 'jumlahBerita', 'jumlahKategori'));
    }
}
