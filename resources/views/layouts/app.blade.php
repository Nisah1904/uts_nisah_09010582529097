<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Ruang Baca' }} — Perpustakaan</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="library-body">

<div
    x-data="{ sidebarOpen: false }"
    class="min-h-screen"
>

    <!-- Mobile Overlay -->
    <div
        x-show="sidebarOpen"
        x-transition.opacity
        @click="sidebarOpen = false"
        class="fixed inset-0 z-40 bg-black/30 lg:hidden"
        style="display: none;"
    ></div>

    <!-- Sidebar -->
    <aside
        class="library-sidebar"
        :class="sidebarOpen ? 'sidebar-open' : ''"
    >
        <div class="sidebar-inner">

            <a href="{{ route('dashboard') }}" class="brand">
                <div class="brand-mark">
                    RB
                </div>

                <div>
                    <div class="brand-name">Ruang Baca</div>
                    <div class="brand-subtitle">Library Management</div>
                </div>
            </a>

            <div class="sidebar-section">
                <p class="sidebar-label">MENU UTAMA</p>

                <a
                    href="{{ route('dashboard') }}"
                    class="sidebar-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"
                >
                    <span class="sidebar-icon">⌂</span>
                    Dashboard
                </a>

                <a
                    href="{{ route('books.index') }}"
                    class="sidebar-link {{ request()->routeIs('books.*') ? 'active' : '' }}"
                >
                    <span class="sidebar-icon">▤</span>
                    Koleksi Buku
                </a>

                <a
                    href="{{ route('books.create') }}"
                    class="sidebar-link {{ request()->routeIs('books.create') ? 'active' : '' }}"
                >
                    <span class="sidebar-icon">＋</span>
                    Tambah Buku
                </a>
            </div>

            <div class="sidebar-note">
                <div class="sidebar-note-title">Catatan</div>
                <p>
                    Kelola koleksi perpustakaan dengan rapi dan mudah.
                </p>
            </div>

            <div class="sidebar-bottom">
                <div class="user-mini">
                    <div class="user-avatar">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>

                    <div class="user-info">
                        <div class="user-name">{{ Auth::user()->name }}</div>
                        <div class="user-role">Administrator</div>
                    </div>
                </div>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button type="submit" class="logout-button">
                        <span>↪</span>
                        Keluar
                    </button>
                </form>
            </div>

        </div>
    </aside>

    <!-- Main -->
    <main class="library-main">

        <!-- Mobile Header -->
        <header class="mobile-header">
            <button
                @click="sidebarOpen = !sidebarOpen"
                class="mobile-menu-button"
            >
                ☰
            </button>

            <span class="mobile-brand">Ruang Baca</span>
        </header>

        <!-- Page -->
        <div class="page-container">

            @if(session('success'))
                <div class="alert-success">
                    <span class="alert-check">✓</span>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            @if(session('error'))
                <div class="alert-error">
                    <span>!</span>
                    <span>{{ session('error') }}</span>
                </div>
            @endif

            @if($errors->any())
                <div class="alert-error">
                    <div>
                        <strong>Periksa kembali data berikut:</strong>

                        <ul class="mt-1 list-disc pl-5">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            {{ $slot ?? '' }}

            @yield('content')

        </div>

    </main>

</div>

</body>
</html>