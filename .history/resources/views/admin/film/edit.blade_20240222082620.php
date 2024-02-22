@extends('layouts.app')
@section('editor')
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
@endsection
@section('content')
    <div class="container my-4">
        <form action="{{ route('film.update', $film->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="namaJudul" class="form-label">Judul Film</label>
                                <input type="text" name="judul" class="form-control" value="{{ $film->judul }}"
                                    id="namaJudul">
                                @error('judul')
                                    <p class='text-danger mb-0 text-xs pt-1'> {{ $message }} </p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="isi" class="form-label">Isi</label>
                                <div id="isi" style="height:350px;">{!! $film->isi !!}</div>
                                <textarea class="form-control" name="isi" id="content-textarea" hidden style="display: none;">{!! $film->isi !!}</textarea>
                                @error('isi')
                                    <p class='text-danger mb-0 text-xs pt-1'> {{ $message }} </p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="mb-3">
                                <div class="card shadow-none border text-center ">
                                    <label class="form-label border-dashed cursor-pointer" id="label"
                                        style="border-radius:10px;" for="imageFile">Masukkan Gambar
                                        <img class="img-preview img-fluid mb-2">
                                        <img src="{{ asset('img/gambar/' . $film->gambar) }}" id="plusimg"
                                            class="img-fluid p-md-3" alt="">
                                        <input accept="image/*" type="file" name="gambar" value="{{ $film->gambar }}"
                                            class="form-control mt-3" id="imageFile" onchange="previewImage()">
                                    </label>
                                    @error('gambar')
                                        <p class='text-danger mb-0 text-xs pt-1'> {{ $message }} </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="genreSelect" class="form-label">genre</label>
                                <select class="form-select" name="genre_id" id="genreSelect">
                                    @foreach ($genre as $itemk)
                                        @if ($itemk->id === $film->genre_id)
                                            <option value="{{ $itemk->id }}" selected>{{ $itemk->nama_genre }}
                                            </option>
                                        @else
                                            <option value="{{ $itemk->id }}">{{ $itemk->nama_genre }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('genre_id')
                                    <p class='text-danger mb-0 text-xs pt-1'> {{ $message }} </p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="text-end">
                        <a href="/film" class="btn btn-secondary">Cancel</a>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
@section('scripts')
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script>
        function previewImage() {
            const imageFile = document.querySelector('#imageFile');
            const imgPreview = document.querySelector('.img-preview');
            const label = document.querySelector('#label');
            const img = document.querySelector('#plusimg');

            img.style.display = 'none';
            label.style.border = 0;
            imgPreview.style.display = 'block';

            const blob = URL.createObjectURL(imageFile.files[0]);
            imgPreview.src = blob;
        }
        var toolbarOptions = [
            [{
                'font': []
            }],
            [{
                'header': [1, 2, 3, 4, 5, 6, false]
            }],
            ['bold', 'italic', 'underline', 'strike'], // toggled buttons
            ['blockquote', 'code-block'],

            [{
                'list': 'ordered'
            }, {
                'list': 'bullet'
            }],
            [{
                'indent': '-1'
            }, {
                'indent': '+1'
            }],

            [{
                'color': []
            }, {
                'background': []
            }],
            [{
                'align': []
            }],

            ['clean']
        ];
        var quill = new Quill('#isi', {
            modules: {
                toolbar: toolbarOptions
            },
            theme: 'snow'
        });

        quill.on('text-change', function(delta, source) {
            updateHtmlOutput()
        })

        // When the convert button is clicked, update output
        $('#btn-convert').on('click', () => {
            updateHtmlOutput()
        })

        // Return the HTML content of the editor
        function getQuillHtml() {
            return quill.root.innerHTML;
        }

        // Highlight code output
        function updateHighlight() {
            hljs.highlightBlock(document.querySelector('#content-textarea'))
        }


        function updateHtmlOutput() {
            let html = getQuillHtml();
            console.log(html);
            document.getElementById('content-textarea').innerText = html;
            updateHighlight();
        }


        updateHtmlOutput()
    </script>
@endsection
