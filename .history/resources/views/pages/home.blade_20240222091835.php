@extends('layouts.app')

@section('content')
    <div class="container mt-3">
        <img src="{{ asset ('./img/carousel/banner.jpeg') }}" class="d-block w-100" >
        </div>
    </div>
   <div class="container my-5">
        <div class="row">
            @foreach ($film as $item)
                <div class="col-lg-3 col-md-6 mb-3">
                    <div class="card" style="min-height: 500px">
                        <img src="{{ asset('img/gambar/' . $item->gambar) }}" class="bd-placeholder-img card-img-top"
                            alt="" style="height:auto">
                        <div class="card-body">
                            <div class="badge text-bg-secondary rounded-pill mb-3">{{ $item->genre->nama_genre }}</div>
                            <div class="card-title h6 fw-bold">{{ $item->judul }}</div>
                            <p class="card-text">{!! Str::limit($item->isi, 100) !!}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="{{ route('detail', $item->id) }}" class="btn btn-md btn-outline-secondary">Lihat Film</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
@endsection
