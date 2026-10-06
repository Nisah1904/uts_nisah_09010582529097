@extends('layouts.app')

@section('content')

<div class="page-heading">
    <div>
        <p class="eyebrow">LIBRARY COLLECTION</p>

        <h1>Tambah Buku</h1>

        <p class="page-description">
            Masukkan informasi buku baru ke dalam koleksi.
        </p>
    </div>

    <a href="{{ route('books.index') }}" class="secondary-button">
        ← Kembali
    </a>
</div>

<div class="form-panel">

    <div class="form-panel-heading">
        <div class="form-panel-number">01</div>

        <div>
            <h2>Informasi Buku</h2>
            <p>Lengkapi seluruh informasi yang diperlukan.</p>
        </div>
    </div>

    <form
        method="POST"
        action="{{ route('books.store') }}"
        class="book-form"
    >
        @csrf

        <div class="form-grid">

            <div class="form-group full">
                <label for="title">Judul Buku</label>

                <input
                    id="title"
                    type="text"
                    name="title"
                    value="{{ old('title') }}"
                    class="form-input"
                    placeholder="Contoh: Filosofi Teras"
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
                    value="{{ old('author') }}"
                    class="form-input"
                    placeholder="Nama penulis"
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
                    value="{{ old('publisher') }}"
                    class="form-input"
                    placeholder="Nama penerbit"
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
                    value="{{ old('year') }}"
                    class="form-input"
                    placeholder="2026"
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
                    value="{{ old('stock', 0) }}"
                    class="form-input"
                    min="0"
                    placeholder="0"
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
                    <option value="">Pilih kategori</option>

                    @foreach($categories as $category)
                        <option
                            value="{{ $category->id }}"
                            {{ old('category_id') == $category->id ? 'selected' : '' }}
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
                href="{{ route('books.index') }}"
                class="secondary-button"
            >
                Batal
            </a>

            <button type="submit" class="primary-button">
                Simpan Buku
                <span>→</span>
            </button>
        </div>

    </form>

</div>

@endsection