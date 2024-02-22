@extends('layouts.app')

@section('content')
    <div class="container my-4">
        <div class="mb-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="fw-bold my-auto">Edit Genre</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('genre.update', $genre->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="namagenre" class="form-label">Nama Genre</label>
                            <input type="text" name="nama_genre" value="{{ $genre->nama_genre }}"
                                class="form-control" id="namagenre">
                        </div>
                        <div class="text-end">
                            <a href="/genre" class="btn btn-secondary">Cancel</a>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
