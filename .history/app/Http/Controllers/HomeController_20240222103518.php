<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

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
        $jumlahGenGenre =Genre::count();

        return view('admin.dashboard', compact('jumlahPengguna', 'jumlahFilm', 'jumlahGenGenre'));
    }
}
