@extends('layouts.app')

@section('content')

<div class="page-heading">

    <div>
        <p class="eyebrow">BOOK DETAIL</p>

        <h1>Detail Buku</h1>

        <p class="page-description">
            Informasi lengkap mengenai buku.
        </p>
    </div>

    <div class="heading-actions">

        <a
            href="{{ route('books.edit', $book) }}"
            class="primary-button"
        >
            Edit Buku
        </a>

        <a
            href="{{ route('books.index') }}"
            class="secondary-button"
        >
            ← Kembali
        </a>

    </div>

</div>

<div class="detail-grid">

    <section class="book-detail-card">

        <div class="book-cover-placeholder">
            <span>RB</span>
        </div>

        <div class="detail-main">

            <span class="category-badge large-badge">
                {{ $book->category->name }}
            </span>

            <h2>{{ $book->title }}</h2>

            <p class="detail-author">
                {{ $book->author }}
            </p>

            <div class="detail-divider"></div>

            <div class="detail-info-grid">

                <div>
                    <span class="detail-label">PENERBIT</span>
                    <strong>{{ $book->publisher }}</strong>
                </div>

                <div>
                    <span class="detail-label">TAHUN TERBIT</span>
                    <strong>{{ $book->year }}</strong>
                </div>

                <div>
                    <span class="detail-label">STOK TERSEDIA</span>
                    <strong>{{ $book->stock }} buku</strong>
                </div>

                <div>
                    <span class="detail-label">ID BUKU</span>
                    <strong>#{{ str_pad($book->id, 4, '0', STR_PAD_LEFT) }}</strong>
                </div>

            </div>

        </div>

    </section>

    <aside class="detail-side-card">

        <p class="eyebrow">AKSI</p>

        <h3>Kelola buku</h3>

        <p>
            Kamu dapat mengubah informasi atau menghapus buku ini
            dari koleksi perpustakaan.
        </p>

        <a
            href="{{ route('books.edit', $book) }}"
            class="secondary-button full-button"
        >
            Edit informasi
        </a>

        <form
            method="POST"
            action="{{ route('books.destroy', $book) }}"
            onsubmit="return confirm('Yakin ingin menghapus buku ini?')"
        >
            @csrf
            @method('DELETE')

            <button
                type="submit"
                class="delete-button full-button"
            >
                Hapus buku
            </button>
        </form>

    </aside>

</div>

@endsection