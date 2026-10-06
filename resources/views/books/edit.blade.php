@extends('layouts.app')

@section('content')

<div class="page-heading">
    <div>
        <p class="eyebrow">LIBRARY COLLECTION</p>

        <h1>Edit Buku</h1>

        <p class="page-description">
            Perbarui informasi buku yang dipilih.
        </p>
    </div>

    <a
        href="{{ route('books.show', $book) }}"
        class="secondary-button"
    >
        ← Kembali
    </a>
</div>

<div class="form-panel">

    <div class="form-panel-heading">
        <div class="form-panel-number">02</div>

        <div>
            <h2>Edit informasi buku</h2>
            <p>
                Perubahan akan langsung tersimpan ke database.
            </p>
        </div>
    </div>

    <form
        method="POST"
        action="{{ route('books.update', $book) }}"
        class="book-form"
    >
        @csrf
        @method('PUT')

        <div class="form-grid">

            <div class="form-group full">
                <label for="title">Judul Buku</label>

                <input
                    id="title"
                    type="text"
                    name="title"
                    value="{{ old('title', $book->title) }}"
                    class="form-input"
                    required
                >

                @error('title')
                    <p class="form-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="author">Penulis</label>

                <input
                    id="author"
                    type="text"
                    name="author"
                    value="{{ old('author', $book->author) }}"
                    class="form-input"
                    required
                >

                @error('author')
                    <p class="form-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="publisher">Penerbit</label>

                <input
                    id="publisher"
                    type="text"
                    name="publisher"
                    value="{{ old('publisher', $book->publisher) }}"
                    class="form-input"
                    required
                >

                @error('publisher')
                    <p class="form-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="year">Tahun Terbit</label>

                <input
                    id="year"
                    type="number"
                    name="year"
                    value="{{ old('year', $book->year) }}"
                    class="form-input"
                    min="1000"
                    max="2100"
                    required
                >

                @error('year')
                    <p class="form-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="stock">Stok</label>

                <input
                    id="stock"
                    type="number"
                    name="stock"
                    value="{{ old('stock', $book->stock) }}"
                    class="form-input"
                    min="0"
                    required
                >

                @error('stock')
                    <p class="form-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group full">
                <label for="category_id">Kategori</label>

                <select
                    id="category_id"
                    name="category_id"
                    class="form-input"
                    required
                >
                    @foreach($categories as $category)
                        <option
                            value="{{ $category->id }}"
                            {{ old('category_id', $book->category_id) == $category->id ? 'selected' : '' }}
                        >
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>

                @error('category_id')
                    <p class="form-error">{{ $message }}</p>
                @enderror
            </div>

        </div>

        <div class="form-actions">

            <a
                href="{{ route('books.show', $book) }}"
                class="secondary-button"
            >
                Batal
            </a>

            <button type="submit" class="primary-button">
                Simpan Perubahan
                <span>→</span>
            </button>

        </div>

    </form>

</div>

@endsection