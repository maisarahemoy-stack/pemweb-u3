
@extends('layouts.app')

@section('title', 'Daftar Artikel')

@section('content')

<section class="card">

    <div style="display: flex; justify-content: space-between;
                align-items: center; flex-wrap: wrap; gap: 15px;">

        <div>
            <h2>♡ Koleksi Artikel</h2>
            <p class="muted">Kelola semua artikel kamu di sini.</p>
        </div>

        <a href="{{ route('articles.create') }}" class="btn">
            + Artikel Baru
        </a>

    </div>

    @if (session('success'))
        <div class="flash">
            {{ session('success') }}
        </div>
    @endif

    @if ($articles->isNotEmpty())

        <div class="row" style="margin-top: 25px;">

            @foreach ($articles as $article)

                <article class="card article-card">

                    <img src="{{ $article->image_url }}"
                         alt="{{ $article->title }}">

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
                            {{ \Illuminate\Support\Str::limit($article->body, 100) }}
                        </p>

                        <a href="{{ route('articles.show', $article) }}"
                           class="btn btn-yellow">
                            Detail
                        </a>

                        @if ($article->user_id === auth()->id())

                            <a href="{{ route('articles.edit', $article) }}"
                               class="btn">
                                Edit
                            </a>

                            <form action="{{ route('articles.destroy', $article) }}"
                                  method="POST"
                                  class="inline"
                                  onsubmit="return confirm('Yakin ingin menghapus artikel ini?')">

                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn-danger">
                                    Hapus
                                </button>

                            </form>

                        @endif

                    </div>

                </article>

            @endforeach

        </div>

        <div style="margin-top: 25px;">
            {{ $articles->links('pagination::default') }}
        </div>

    @else

        <p class="muted">Belum ada artikel yang tersedia.</p>

    @endif

</section>

@endsection
