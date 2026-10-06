<x-guest-layout>

    <div class="auth-heading">
        <p class="eyebrow">SELAMAT DATANG KEMBALI</p>

        <h1>Masuk ke Ruang Baca</h1>

        <p>
            Kelola koleksi buku perpustakaan dari satu tempat.
        </p>
    </div>

    <form method="POST" action="{{ route('login') }}" class="auth-form">
        @csrf

        <div class="form-group">
            <label for="email">Email</label>

            <input
                id="email"
                type="email"
                name="email"
                value="{{ old('email') }}"
                required
                autofocus
                autocomplete="username"
                class="form-input"
                placeholder="nama@email.com"
            >

            @error('email')
                <p class="form-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <div class="label-row">
                <label for="password">Password</label>

                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">
                        Lupa password?
                    </a>
                @endif
            </div>

            <input
                id="password"
                type="password"
                name="password"
                required
                autocomplete="current-password"
                class="form-input"
                placeholder="Masukkan password"
            >

            @error('password')
                <p class="form-error">{{ $message }}</p>
            @enderror
        </div>

        <label class="remember-row">
            <input
                type="checkbox"
                name="remember"
                class="remember-checkbox"
            >

            <span>Ingat saya</span>
        </label>

        <button type="submit" class="primary-button full-button">
            Masuk
            <span>→</span>
        </button>
    </form>

    @if (Route::has('register'))
        <div class="auth-bottom">
            Belum punya akun?

            <a href="{{ route('register') }}">
                Daftar sekarang
            </a>
        </div>
    @endif

</x-guest-layout>