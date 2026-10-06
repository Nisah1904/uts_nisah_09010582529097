<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title ?? 'Ruang Baca' }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="guest-body">

    <div class="guest-wrapper">

        <div class="guest-decoration guest-decoration-one"></div>
        <div class="guest-decoration guest-decoration-two"></div>

        <div class="guest-card">

            <div class="guest-brand">
                <div class="brand-mark large">RB</div>

                <div>
                    <div class="brand-name">Ruang Baca</div>
                    <div class="brand-subtitle">Library Management</div>
                </div>
            </div>

            <div class="guest-content">
                {{ $slot }}
            </div>

        </div>

        <p class="guest-footer">
            Sistem Informasi Perpustakaan
        </p>

    </div>

</body>
</html>