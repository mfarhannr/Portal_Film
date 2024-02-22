@extends('layouts.app')

@section('content')
    <div class="container my-4">
        <div id="alert">
            @include('components.alert')
        </div>
        <div class="mb-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="fw-bold my-auto">Tambah Kategori</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('kategori.perform') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="namaJudul" class="form-label">Nama Kategori</label>
                            <input type="text" name="nama_kategori" class="form-control" id="namaJudul">
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h5 class="fw-bold my-auto">Manajemen Kategori</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive small">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col" style="width:25%">No</th>
                                <th scope="col" style="width:25%">Nama Kategori</th>
                                <th scope="col" style="width:25%">Tanggal Dibuat</th>
                                <th scope="col" style="width:25%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no = 1; @endphp
                            @foreach ($kategori as $item)
                                <tr>
                                    <th>{{ $no++ }}</th>
                                    <td>{{ $item->nama_kategori }}</td>
                                    <td>{{ $item->created_at->format('F j, Y') }}</td>
                                    <td>
                                        <a href="{{ route('kategori.edit', $item->id) }}"
                                            class="btn btn-sm btn-success">Edit</a>
                                        <form class="d-inline" onsubmit="return confirm('sure to delete this data')"
                                            action="{{ route('kategori.delete', $item->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger mb-0">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
