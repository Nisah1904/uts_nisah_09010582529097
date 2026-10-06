@extends('layouts.app')

@section('content')

<div class="page-heading">
    <div>
        <p class="eyebrow">LIBRARY COLLECTION</p>

        <h1>Koleksi Buku</h1>

        <p class="page-description">
            Kelola seluruh buku yang tersimpan di perpustakaan.
        </p>
    </div>

    <a href="{{ route('books.create') }}" class="primary-button">
        <span>＋</span>
        Tambah Buku
    </a>
</div>

<div class="panel">

    <form
        method="GET"
        action="{{ route('books.index') }}"
        class="filter-bar"
    >

        <div class="search-wrapper">
            <span class="search-icon">⌕</span>

            <input
                type="text"
                name="search"
                value="{{ $search }}"
                class="search-input"
                placeholder="Cari judul atau penulis..."
            >
        </div>

        <select
            name="category"
            class="filter-select"
        >
            <option value="">Semua kategori</option>

            @foreach($categories as $category)
                <option
                    value="{{ $category->id }}"
                    {{ (string) $categoryId === (string) $category->id ? 'selected' : '' }}
                >
                    {{ $category->name }}
                </option>
            @endforeach
        </select>

        <button type="submit" class="secondary-button">
            Terapkan
        </button>

        @if($search || $categoryId)
            <a href="{{ route('books.index') }}" class="reset-link">
                Reset
            </a>
        @endif

    </form>

    @if($books->count())

        <div class="table-wrapper">

            <table class="library-table">

                <thead>
                    <tr>
                        <th>#</th>
                        <th>BUKU</th>
                        <th>PENULIS</th>
                        <th>KATEGORI</th>
                        <th>TAHUN</th>
                        <th>STOK</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>

                    @foreach($books as $book)

                        <tr>

                            <td class="number-cell">
                                {{ $books->firstItem() + $loop->index }}
                            </td>

                            <td>
                                <a
                                    href="{{ route('books.show', $book) }}"
                                    class="book-title-link"
                                >
                                    {{ $book->title }}
                                </a>

                                <span class="publisher-text">
                                    {{ $book->publisher }}
                                </span>
                            </td>

                            <td>
                                {{ $book->author }}
                            </td>

                            <td>
                                <span class="category-badge">
                                    {{ $book->category->name }}
                                </span>
                            </td>

                            <td>
                                {{ $book->year }}
                            </td>

                            <td>
                                <span class="stock-number">
                                    {{ $book->stock }}
                                </span>
                            </td>

                            <td>
                                <div class="action-group">

                                    <a
                                        href="{{ route('books.show', $book) }}"
                                        class="action-button"
                                        title="Detail"
                                    >
                                        Lihat
                                    </a>

                                    <a
                                        href="{{ route('books.edit', $book) }}"
                                        class="action-button"
                                        title="Edit"
                                    >
                                        Edit
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
                                            class="action-button danger"
                                        >
                                            Hapus
                                        </button>
                                    </form>

                                </div>
                            </td>

                        </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

        <div class="pagination-wrapper">
            {{ $books->links() }}
        </div>

    @else

        <div class="empty-state">
            <div class="empty-icon">⌕</div>

            <h3>Buku tidak ditemukan</h3>

            <p>
                Coba gunakan kata kunci atau kategori yang berbeda.
            </p>

            <a href="{{ route('books.index') }}" class="secondary-button">
                Tampilkan semua buku
            </a>
        </div>

    @endif

</div>

@endsection