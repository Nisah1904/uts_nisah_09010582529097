@extends('layouts.app')

@section('content')

<div class="page-heading">
    <div>
        <p class="eyebrow">OVERVIEW</p>

        <h1>Dashboard</h1>

        <p class="page-description">
            Ringkasan koleksi perpustakaan hari ini.
        </p>
    </div>

    <a href="{{ route('books.create') }}" class="primary-button">
        <span>＋</span>
        Tambah Buku
    </a>
</div>

<div class="stats-grid">

    <div class="stat-card">
        <div class="stat-icon yellow">▤</div>

        <div>
            <p class="stat-label">TOTAL BUKU</p>
            <p class="stat-value">{{ $totalBooks }}</p>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-icon brown">◈</div>

        <div>
            <p class="stat-label">KATEGORI</p>
            <p class="stat-value">{{ $totalCategories }}</p>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-icon cream">#</div>

        <div>
            <p class="stat-label">TOTAL STOK</p>
            <p class="stat-value">{{ $totalStock }}</p>
        </div>
    </div>

</div>

<div class="content-grid">

    <section class="panel large-panel">

        <div class="panel-header">
            <div>
                <p class="eyebrow">KOLEKSI</p>
                <h2>Buku terbaru</h2>
            </div>

            <a href="{{ route('books.index') }}" class="text-link">
                Lihat semua →
            </a>
        </div>

        @if($latestBooks->count())
            <div class="book-list">

                @foreach($latestBooks as $book)

                    <a
                        href="{{ route('books.show', $book) }}"
                        class="book-row"
                    >
                        <div class="book-number">
                            {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                        </div>

                        <div class="book-row-info">
                            <h3>{{ $book->title }}</h3>

                            <p>
                                {{ $book->author }}
                                <span>·</span>
                                {{ $book->publisher }}
                            </p>
                        </div>

                        <div class="category-badge">
                            {{ $book->category->name }}
                        </div>

                        <div class="book-stock">
                            <strong>{{ $book->stock }}</strong>
                            <span>stok</span>
                        </div>

                        <div class="row-arrow">→</div>
                    </a>

                @endforeach

            </div>
        @else

            <div class="empty-state">
                <div class="empty-icon">▤</div>
                <h3>Belum ada buku</h3>
                <p>Tambahkan buku pertama ke koleksi.</p>

                <a href="{{ route('books.create') }}" class="primary-button">
                    Tambah Buku
                </a>
            </div>

        @endif

    </section>

    <section class="quote-card">
        <div class="quote-mark">“</div>

        <p>
            Buku adalah jendela untuk melihat dunia
            tanpa harus meninggalkan tempat kita berada.
        </p>

        <div class="quote-line"></div>

        <span>RUANG BACA</span>
    </section>

</div>

@endsection