<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\User;
use App\Models\Genre;

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
        $jumlahGenre =Genre::count();

        return view('admin.dashboard', compact('jumlahPengguna', 'jumlahFilm', 'jumlahGenre'));
    }
}
