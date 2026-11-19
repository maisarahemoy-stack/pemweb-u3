
@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<section class="card"
    style="background: #FFF5D9;">

    <p style="color: #A77A24; font-weight: 600;">
        PERSONAL DASHBOARD ♡
    </p>

    <h2>Halo, {{ $user->name }}!</h2>

    <p>
        Selamat datang kembali di Sweet Journal.
        Kelola artikel dan lihat aktivitas kamu di sini.
    </p>

</section>

<section class="row">

    <div class="card" style="background: #FCEAF1;">
        <p>♡</p>
        <h3>Total Artikel</h3>

        <h1 style="font-size: 38px; color: #C66F94;">
            {{ $totalArticles }}
        </h1>

        <p class="muted">Jumlah seluruh artikel.</p>
    </div>

    <div class="card" style="background: #FFF5D9;">
        <p>✿</p>
        <h3>Artikel Kamu</h3>

        <h1 style="font-size: 38px; color: #A77A24;">
            {{ $myArticles }}
        </h1>

        <p class="muted">Artikel yang kamu buat.</p>
    </div>

</section>

<section class="card">

    <h3>♡ Aksi Cepat</h3>

    <p>
        <a href="{{ route('articles.create') }}" class="btn">
            + Tambah Artikel
        </a>
    </p>

    <p>
        <a href="{{ route('articles.index') }}" class="btn btn-yellow">
            Lihat Semua Artikel
        </a>
    </p>

</section>

<section class="card">

    <h3>Artikel Terbaru</h3>

    @if ($latestArticles->isNotEmpty())

        @foreach ($latestArticles as $article)

            <div style="display: flex; gap: 15px;
                        align-items: center;
                        padding: 15px 0;
                        border-bottom: 1px solid #F2E4E9;">

                <img src="{{ $article->image_url }}"
                     alt="{{ $article->title }}"
                     style="width: 90px; height: 75px;
                            object-fit: cover;
                            border-radius: 12px;">

                <div>
                    <strong>
                        <a href="{{ route('articles.show', $article) }}">
                            {{ $article->title }}
                        </a>
                    </strong>

                    <p class="muted">
                        {{ $article->user->name }}
                        · {{ $article->created_at->format('d M Y') }}
                    </p>
                </div>

            </div>

        @endforeach

    @else

        <p class="muted">Belum ada artikel.</p>

    @endif

</section>

<section class="card">

    <h3>♡ Informasi Akun</h3>

    <p><strong>Nama:</strong> {{ $user->name }}</p>
    <p><strong>Email:</strong> {{ $user->email }}</p>

</section>

@endsection
