<?php

namespace App\Http\Controllers;

use App\Models\Berita;

class PagesController extends Controller
{
    public function index()
    {
        $berita = Berita::get();
        return view('pages.home', compact('berita'));
    }
    public function detail($id)
    {
        $berita = Berita::findOrFail($id);
        $allBerita = Berita::paginate(3);
        return view('pages.detail', compact('berita', 'allBerita'));
    }
}
