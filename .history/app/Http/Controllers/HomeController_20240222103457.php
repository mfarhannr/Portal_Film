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
        $jumlahFilm = Film::count();
        $jumlahKategori = Kategori::count();

        return view('admin.dashboard', compact('jumlahPengguna', 'jumlahFilm', 'jumlahKategori'));
    }
}
