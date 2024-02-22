<?php

namespace App\Http\Controllers;

use App\Models\Film;

class PagesController extends Controller
{
    public function index()
    {
        $film = film::get();
        return view('pages.home', compact('film'));
    }
    public function detail($id)
    {
        $film = film::findOrFail($id);
        $allfilm = film::paginate(3);
        return view('pages.detail', compact('film', 'allfilm'));
    }
}
