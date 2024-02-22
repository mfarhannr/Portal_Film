@extends('layouts.app')

@section('content')
    <div class="container p-4">
        <div class="row g-5">
            <div class="col-md">
                <article class="blog-post">
                    <h2 class="display-5 mb-1">{{ $film->judul }}</h2>
                    <p class="blog-post-meta">{{ $film->created_at->format('F j, Y') }} author by
                        <span>{{ $film->user->name }}</span>
                    </p>
                    <img src="{{ asset('img/gambar/' . $film->gambar) }}" class="mb-3 bd-placeholder-img  card-img-top"
                        alt="">

                    {!! $film->isi !!}
                </article>

                <nav class="blog-pagination" aria-label="Pagination">
                    <a class="btn btn-md btn-outline-secondary" href="/">kembali</a>
                </nav>

            </div>

            <div class="col-md-4 p-0">
                <div class="position-sticky mt-3 bg-body-tertiary p-4" style="top: 1rem;">
                    <div>
                        <h4 class="fst-italic">Film Terbaru</h4>
                        <ul class="list-unstyled">
                            @foreach ($allFilm as $item)
                                <li>
                                    <a class="d-flex flex-column flex-lg-row gap-3 align-items-start align-items-lg-center py-3 link-body-emphasis text-decoration-none border-top"
                                        href="{{ route('detail', $item->id) }}">
                                        <img src="{{ asset('img/gambar/' . $item->gambar) }}" class="bd-placeholder-img"
                                            width="100%" height="96" alt="">
                                        <div class="col-lg-8">
                                            <h5 class="mb-0">{{ $item->judul }}</h5>
                                            <small
                                                class="text-body-secondary">{{ $item->created_at->format('F j, Y') }}</small><br>
                                            <p class="badge text-bg-secondary ">{{ $item->genre->nama_genre }}</p>
                                        </div>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
