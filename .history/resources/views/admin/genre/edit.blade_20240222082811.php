@extends('layouts.app')

@section('content')
    <div class="container my-4">
        <div class="mb-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="fw-bold my-auto">Edit g</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('g.update', $g->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="namag" class="form-label">Nama g</label>
                            <input type="text" name="nama_g" value="{{ $g->nama_g }}"
                                class="form-control" id="namag">
                        </div>
                        <div class="text-end">
                            <a href="/g" class="btn btn-secondary">Cancel</a>
                            <button type="submit" class="btn btn-primary">Edit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
