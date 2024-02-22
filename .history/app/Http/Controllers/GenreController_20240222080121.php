<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index()
    {
        $genre = Genre::get();
        return view('admin.genre.index', compact('genre'));
    }

    public function store()
    {

        $attributes = request()->validate([
            'nama_genre' => 'required|max:30|min:5|unique:genres,nama_genre',
        ], [
            'nama_genre.required' => 'Genre nama cannot be blank',
            'nama_genre.unique' => 'Genre nama has already been taken.'
        ]);
        Genre::create($attributes);
        return redirect()->to('/genre')->with('succes', 'added data successfully');
    }

    public function edit($id)
    {
        $genre     = genre::findOrFail($id);
        return view('admin.genre.edit', compact('genre'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_genre'          => 'required',
        ]);

        $genre = genre::find($id);

        $genre->nama_genre = $request->nama_genre;

        $genre->save();

        return redirect('/genre');
    }

    public function destroy($id)
    {
        genre::where('id', $id)->delete();
        return redirect()->to('/genre')->with('succes', 'The data has been successfully deleted');
    }
}
