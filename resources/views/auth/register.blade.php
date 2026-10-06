<x-guest-layout>

    <div class="auth-heading">
        <p class="eyebrow">BUAT AKUN</p>

        <h1>Daftar di Ruang Baca</h1>

        <p>
            Buat akun untuk mulai mengelola koleksi perpustakaan.
        </p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="auth-form">
        @csrf

        <div class="form-group">
            <label for="name">Nama</label>

            <input
                id="name"
                type="text"
                name="name"
                value="{{ old('name') }}"
                required
                autofocus
                autocomplete="name"
                class="form-input"
                placeholder="Nama lengkap"
            >

            @error('name')
                <p class="form-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">Email</label>

            <input
                id="email"
                type="email"
                name="email"
                value="{{ old('email') }}"
                required
                autocomplete="username"
                class="form-input"
                placeholder="nama@email.com"
            >

            @error('email')
                <p class="form-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="password">Password</label>

            <input
                id="password"
                type="password"
                name="password"
                required
                autocomplete="new-password"
                class="form-input"
                placeholder="Minimal 8 karakter"
            >

            @error('password')
                <p class="form-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="password_confirmation">Konfirmasi Password</label>

            <input
                id="password_confirmation"
                type="password"
                name="password_confirmation"
                required
                autocomplete="new-password"
                class="form-input"
                placeholder="Ulangi password"
            >
        </div>

        <button type="submit" class="primary-button full-button">
            Buat Akun
            <span>→</span>
        </button>
    </form>

    <div class="auth-bottom">
        Sudah punya akun?

        <a href="{{ route('login') }}">
            Masuk di sini
        </a>
    </div>

</x-guest-layout>