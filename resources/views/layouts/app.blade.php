<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Aplikasi Iklan')</title>

    <!-- Fonts & Styles -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600;700&family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #0d47a1 0%, #42a5f5 50%, #e3f2fd 100%);
            font-family: 'Roboto', sans-serif;
            min-height: 100vh;
            color: #212529;
            margin: 0;
        }

        main {
            padding-top: 80px;
            padding-bottom: 40px;
        }

        h1, h2, h3, h4 {
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
            color: #0d47a1;
        }

        a {
            text-decoration: none;
            transition: all 0.2s ease-in-out;
        }

        a:hover {
            text-decoration: underline;
        }

        .btn {
            transition: transform 0.2s ease-in-out;
        }

        .btn:hover {
            transform: scale(1.03);
        }

        .container {
            max-width: 960px;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    @include('partials.navbar')

    <!-- Konten Halaman -->
    <main>
        @yield('content')
    </main>

    <!-- Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
