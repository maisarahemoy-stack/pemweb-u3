
@extends('layouts.app')

@section('title', 'Tambah Artikel')

@section('content')

<section class="card" style="max-width: 750px; margin: auto;">

    <h2>♡ Buat Artikel Baru</h2>

    <p class="muted">
        Bagikan cerita dan informasi menarik melalui Sweet Journal.
    </p>

    @if ($errors->any())

        <div class="error">
            <strong>Terjadi kesalahan:</strong>

            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>

    @endif

    <form action="{{ route('articles.store') }}" method="POST">

        @csrf

        <label for="title">Judul Artikel</label>

        <input type="text"
               id="title"
               name="title"
               value="{{ old('title') }}"
               required
               placeholder="Masukkan judul artikel">

        <label for="image">URL Gambar (Opsional)</label>

        <input type="url"
               id="image"
               name="image"
               value="{{ old('image') }}"
               placeholder="https://example.com/gambar.jpg">

        <p class="muted">
            Kosongkan jika ingin menggunakan gambar placeholder.
        </p>

        <label for="body">Isi Artikel</label>

        <textarea id="body"
                  name="body"
                  rows="9"
                  required
                  placeholder="Tuliskan artikel kamu di sini...">{{ old('body') }}</textarea>

        <div style="margin-top: 25px;">

            <button type="submit">
                Simpan Artikel ♡
            </button>

            <a href="{{ route('articles.index') }}"
               class="btn btn-yellow">
                Batal
            </a>

        </div>

    </form>

</section>

@endsection
