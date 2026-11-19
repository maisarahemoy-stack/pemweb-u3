
@extends('layouts.app')

@section('title', $article->title)

@section('content')

<section class="card">

    <p style="color: #C66F94; font-weight: 600;">
        ♡ SWEET JOURNAL ARTICLE
    </p>

    <h2>{{ $article->title }}</h2>

    <p class="muted">
        Dipublikasikan pada
        {{ $article->created_at->format('d M Y') }}
        oleh {{ $article->user->name }}
    </p>

    <div style="margin: 25px 0;">

        <img src="{{ $article->image_url }}"
             alt="Gambar {{ $article->title }}"
             style="width: 100%; max-height: 400px;
                    object-fit: cover; border-radius: 15px;">

    </div>

    <div style="line-height: 2;">
        {!! nl2br(e($article->body)) !!}
    </div>

    <hr style="border: 0; border-top: 1px solid #F2E4E9;
               margin: 30px 0;">

    <a href="{{ route('home') }}" class="btn btn-yellow">
        ← Kembali ke Home
    </a>

    <a href="{{ route('articles.index') }}" class="btn">
        Daftar Artikel
    </a>

    @auth
        @if ($article->user_id === auth()->id())

            <a href="{{ route('articles.edit', $article) }}"
               class="btn">
                Edit Artikel
            </a>

        @endif
    @endauth

</section>

@endsection
