<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard IklanApp</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(135deg, #0d47a1 0%, #42a5f5 50%, #ffffff 100%);
      min-height: 100vh;
      font-family: 'Segoe UI', sans-serif;
      color: #212529;
      margin: 0;
    }

    /* NAVBAR */
    .navbar {
      background: linear-gradient(90deg, #0b3c91, #1976d2);
      box-shadow: 0 4px 10px rgba(0,0,0,0.2);
    }
    .navbar-brand, .navbar-nav .nav-link {
      color: #fff !important;
      font-weight: 600;
    }
    .navbar-nav .nav-link:hover {
      color: #e3f2fd !important;
    }

    /* CARD */
    .spotify-card {
      background: linear-gradient(145deg, #e3f2fd 0%, #ffffff 100%);
      border: 1px solid #90caf9;
      border-radius: 12px;
      transition: all 0.3s ease;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    }
    .spotify-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 12px 30px rgba(0, 0, 0, 0.15);
    }

    .card-header-spotify {
      background: linear-gradient(135deg, #2196f3, #64b5f6);
      color: #fff;
      font-weight: 700;
      border-radius: 12px 12px 0 0;
      padding: 1rem;
    }

    .card-body-spotify {
      padding: 1.5rem;
      color: #212529;
    }

    .card-text-spotify {
      color: #444;
      font-size: 0.95rem;
    }

    .btn-spotify {
      background: #2196f3;
      color: white;
      border-radius: 25px;
      font-weight: 600;
      font-size: 0.8rem;
      padding: 10px 18px;
      text-transform: uppercase;
      border: none;
    }
    .btn-spotify:hover {
      background: #1976d2;
      color: white;
    }

    .btn-outline-spotify {
      border: 2px solid #1976d2;
      color: #1976d2;
      border-radius: 25px;
      font-weight: 600;
      font-size: 0.8rem;
      padding: 10px 18px;
      text-transform: uppercase;
    }
    .btn-outline-spotify:hover {
      background-color: #1976d2;
      color: white;
    }

    .main-title {
      font-size: 2.5rem;
      font-weight: 800;
      color: #0d47a1;
      text-align: center;
      margin: 30px 0;
    }

    .section-title {
      font-size: 1.5rem;
      font-weight: 700;
      color: #0d47a1;
      margin-bottom: 1rem;
    }

    .icon-container {
      width: 40px;
      height: 40px;
      background: #2196f3;
      color: white;
      border-radius: 50%;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .stats-card {
      background: #e3f2fd;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      padding: 1.5rem;
    }

    .stat-number {
      font-size: 2rem;
      font-weight: 800;
      color: #0d47a1;
    }

    .stat-label {
      font-size: 0.85rem;
      text-transform: uppercase;
      letter-spacing: 1px;
      color: #555;
    }
  </style>
</head>
<body>

<!-- ✅ Navbar -->
<nav class="navbar navbar-expand-lg">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{ url('/') }}">IklanApp</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link" href="{{ url('/tim-pemasaran') }}">Tim Pemasaran</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ url('/platform') }}">Platform</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ url('/biaya-pemasaran') }}">Biaya Pemasaran</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ url('/iklan') }}">Iklan</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ url('/performa') }}">Performa</a></li>
        @auth
        <li class="nav-item">
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="nav-link btn btn-link text-white">Logout</button>
          </form>
        </li>
        @endauth
      </ul>
    </div>
  </div>
</nav>

<!-- ✅ Konten Utama -->
<div class="container mt-5">
  <h1 class="main-title">🎵 Dashboard IklanApp</h1>

  @php
    date_default_timezone_set('Asia/Jakarta');
    $hour = date('H');

    if ($hour >= 5 && $hour < 11) {
        $greeting = 'Selamat pagi';
    } elseif ($hour >= 11 && $hour < 15) {
        $greeting = 'Selamat siang';
    } elseif ($hour >= 15 && $hour < 18) {
        $greeting = 'Selamat sore';
    } else {
        $greeting = 'Selamat malam';
    }
@endphp

@if(Auth::check())
    <div class="alert alert-primary text-center fs-5 fw-semibold">
        {{ $greeting }}, Selamat datang {{ Auth::user()->name }}! 👋
    </div>
@endif


  <!-- Section: Kampanye -->
  <h2 class="section-title"><span class="icon-container">🎯</span> Kelola Kampanye</h2>
  <div class="row g-4 mb-5">
    <div class="col-md-4">
      <div class="spotify-card">
        <div class="card-header-spotify">👥 Tim Pemasaran</div>
        <div class="card-body-spotify">
          <p class="card-text-spotify">Kelola anggota tim pemasaran dan akses platform untuk kampanye.</p>
          <a href="/tim-pemasaran" class="btn btn-spotify me-2">Lihat Tim</a>
          <a href="/tim-pemasaran/create" class="btn-outline-spotify">+ Tambah</a>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="spotify-card">
        <div class="card-header-spotify">🚀 Platform Iklan</div>
        <div class="card-body-spotify">
          <p class="card-text-spotify">Integrasikan platform iklan seperti Google Ads, Facebook, dll.</p>
          <a href="/platform" class="btn btn-spotify me-2">Lihat Platform</a>
          <a href="/platform/create" class="btn-outline-spotify">+ Tambah</a>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="spotify-card">
        <div class="card-header-spotify">💰 Biaya Pemasaran</div>
        <div class="card-body-spotify">
          <p class="card-text-spotify">Monitor dan optimalkan anggaran kampanye pemasaran Anda.</p>
          <a href="/biaya-pemasaran" class="btn btn-spotify me-2">Lihat Biaya</a>
          <a href="/biaya-pemasaran/create" class="btn-outline-spotify">+ Tambah</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Section: Kampanye & Analitik -->
  <h2 class="section-title"><span class="icon-container">📊</span> Kampanye & Analitik</h2>
  <div class="row g-4 mb-5">
    <div class="col-md-6">
      <div class="spotify-card">
        <div class="card-header-spotify">🎨 Iklan Aktif</div>
        <div class="card-body-spotify">
          <p class="card-text-spotify">Pantau dan kelola semua iklan aktif dalam satu dashboard.</p>
          <a href="/iklan" class="btn btn-spotify me-2">Lihat Iklan</a>
          <a href="/iklan/create" class="btn-outline-spotify">+ Buat Baru</a>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="spotify-card">
        <div class="card-header-spotify">📈 Performa Iklan</div>
        <div class="card-body-spotify">
          <p class="card-text-spotify">Analisis performa kampanye dengan metrik real-time.</p>
          <a href="/performa" class="btn btn-spotify me-2">Lihat Performa</a>
          <a href="/performa/create" class="btn-outline-spotify">+ Tambah Data</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Section: Statistik -->
  <h2 class="section-title"><span class="icon-container">📌</span> Statistik Real-time</h2>
  <div class="stats-card">
    <div class="row text-center g-4">
      <div class="col-md-2 col-6">
        <div class="stat-number">{{ $timCount }}</div>
        <div class="stat-label">Tim</div>
      </div>
      <div class="col-md-2 col-6">
        <div class="stat-number">{{ $platformCount }}</div>
        <div class="stat-label">Platform</div>
      </div>
      <div class="col-md-2 col-6">
        <div class="stat-number">{{ $iklanCount }}</div>
        <div class="stat-label">Iklan</div>
      </div>
      <div class="col-md-2 col-6">
        <div class="stat-number">{{ $performaCount }}</div>
        <div class="stat-label">Performa</div>
      </div>
      <div class="col-md-2 col-6">
        <div class="stat-number">{{ $biayaCount }}</div>
        <div class="stat-label">Biaya</div>
      </div>
      <div class="col-md-2 col-6">
        <div class="stat-number">🔥</div>
        <div class="stat-label">Status</div>
      </div>
    </div>
  </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
