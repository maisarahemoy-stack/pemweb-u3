
@extends('layouts.app')

@section('title', 'Home')

@section('content')

<section class="card"
    style="background: #FCEAF1; padding: 40px;">

    <p style="color: #C66F94; font-weight: 600;">
        WELCOME TO SWEET JOURNAL ♡
    </p>

    <h1 style="font-size: 32px; color: #795467;">
        Cerita Kecil, <br>
        Inspirasi Besar!
    </h1>

    <p>
        Selamat datang di Sweet Journal, tempat berbagi
        cerita, informasi, dan inspirasi menarik.
    </p>

    @guest
        <a href="{{ route('login') }}" class="btn">
            Mulai Sekarang ♡
        </a>
    @endguest

    @auth
        <a href="{{ route('articles.create') }}" class="btn">
            + Tulis Artikel
        </a>
    @endauth
</section>

<section style="margin-top: 35px;">

    <h2>♡ Artikel Terbaru</h2>

    <p class="muted">
        Temukan berbagai cerita dan informasi menarik.
    </p>

    @if ($articles->isNotEmpty())

        <div class="row">

            @foreach ($articles as $article)

                <article class="card article-card">

                    <img src="{{ $article->image_url }}"
                         alt="Gambar {{ $article->title }}">

                    <div class="article-content">

                        <h3>
                            <a href="{{ route('articles.show', $article) }}"
                               style="text-decoration: none;">
                                {{ $article->title }}
                            </a>
                        </h3>

                        <p class="muted">
                            Oleh {{ $article->user->name }}
                            · {{ $article->created_at->format('d M Y') }}
                        </p>

                        <p>
                            {{ \Illuminate\Support\Str::limit($article->body, 120) }}
                        </p>

                        <a href="{{ route('articles.show', $article) }}"
                           class="btn">
                            Baca Selengkapnya →
                        </a>

                    </div>
                </article>

            @endforeach

        </div>

    @else

        <div class="card">
            <p>Belum ada artikel yang tersedia.</p>
        </div>

    @endif

</section>

@endsection
