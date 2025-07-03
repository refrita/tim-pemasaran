@extends('layouts.app')

@section('title', 'Edit Anggota Tim')

@section('content')
<div class="container mt-5">
    <div class="mb-4 border-bottom pb-2 d-flex align-items-center gap-2">
        <h2 class="fw-bold text-primary-emphasis">✏️ Edit Anggota Tim</h2>
    </div>

    {{-- Flash Message --}}
    @if(session('success'))
        <div class="alert alert-success shadow-sm rounded-pill px-4 py-2 text-center text-dark fw-semibold">
            ✅ {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger shadow-sm rounded-pill px-4 py-2 text-center text-dark fw-semibold">
            ⚠️ {{ session('error') }}
        </div>
    @endif

    {{-- Validasi --}}
    @if ($errors->any())
        <div class="alert alert-danger rounded-3 shadow-sm">
            <strong>Terjadi kesalahan:</strong>
            <ul class="mb-0 mt-1">
                @foreach ($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Form --}}
    <form method="POST" action="{{ route('tim-pemasaran.update', $tim->id) }}" class="mt-4 shadow-sm p-4 rounded-4 border bg-light-subtle">
        @csrf
        @method('PUT')

        {{-- Nama --}}
        <div class="mb-3">
            <label class="form-label fw-semibold">👤 Nama Anggota</label>
            <input type="text" name="nama_anggota" value="{{ old('nama_anggota', $tim->nama_anggota) }}" class="form-control @error('nama_anggota') is-invalid @enderror" required>
            @error('nama_anggota')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Jabatan --}}
        <div class="mb-3">
            <label class="form-label fw-semibold">💼 Jabatan</label>
            <input type="text" name="jabatan_anggota" value="{{ old('jabatan_anggota', $tim->jabatan_anggota) }}" class="form-control @error('jabatan_anggota') is-invalid @enderror" required>
            @error('jabatan_anggota')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Nama Pengguna --}}
        <div class="mb-3">
            <label class="form-label fw-semibold">🧾 Nama Pengguna</label>
            <input type="text" name="nama_pengguna" value="{{ old('nama_pengguna', $tim->nama_pengguna) }}" class="form-control @error('nama_pengguna') is-invalid @enderror" required>
            @error('nama_pengguna')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Kata Sandi --}}
        <div class="mb-3">
            <label class="form-label fw-semibold">🔒 Kata Sandi</label>
            <input type="password" name="kata_sandi" class="form-control @error('kata_sandi') is-invalid @enderror" placeholder="Biarkan kosong jika tidak ingin mengubah">
            @error('kata_sandi')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- ID Platform --}}
        <div class="mb-3">
            <label class="form-label fw-semibold">📱 ID Platform</label>
            <input type="number" name="id_platform" value="{{ old('id_platform', $tim->id_platform) }}" class="form-control @error('id_platform') is-invalid @enderror" required>
            @error('id_platform')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- ID Biaya Pemasaran --}}
        <div class="mb-3">
            <label class="form-label fw-semibold">💰 ID Biaya Pemasaran</label>
            <input type="number" name="id_biaya_pemasaran" value="{{ old('id_biaya_pemasaran', $tim->id_biaya_pemasaran) }}" class="form-control @error('id_biaya_pemasaran') is-invalid @enderror" required>
            @error('id_biaya_pemasaran')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Tombol --}}
        <div class="d-flex justify-content-between mt-4">
            <a href="{{ route('tim-pemasaran.index') }}" class="btn btn-outline-secondary rounded-pill shadow-sm">
                ← Batal
            </a>
            <button type="submit" class="btn btn-warning rounded-pill px-4 fw-semibold shadow-sm">
                🔄 Update
            </button>
        </div>
    </form>
</div>
@endsection
