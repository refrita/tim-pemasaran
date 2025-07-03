@extends('layouts.app')

@section('title', 'Tambah Performa')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm p-4 border-0">
        <h3 class="mb-4 text-success">➕ Tambah Data Performa Iklan</h3>

        {{-- Flash Message --}}
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                ✅ {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                ❌ {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        {{-- Validation Errors --}}
        @if($errors->any())
            <div class="alert alert-danger">
                ⚠️ <strong>Terjadi kesalahan:</strong>
                <ul class="mb-0 mt-2">
                    @foreach($errors->all() as $error)
                        <li>🔸 {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('performa.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="jumlah_tayang" class="form-label">👁️ Jumlah Tayang</label>
                <input type="number" name="jumlah_tayang" id="jumlah_tayang"
                    class="form-control @error('jumlah_tayang') is-invalid @enderror"
                    value="{{ old('jumlah_tayang') }}" required>
                @error('jumlah_tayang') <div class="invalid-feedback">⚠️ {{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label for="jumlah_klik" class="form-label">🖱️ Jumlah Klik</label>
                <input type="number" name="jumlah_klik" id="jumlah_klik"
                    class="form-control @error('jumlah_klik') is-invalid @enderror"
                    value="{{ old('jumlah_klik') }}" required>
                @error('jumlah_klik') <div class="invalid-feedback">⚠️ {{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label for="konversi" class="form-label">💡 Konversi (%)</label>
                <input type="number" step="0.01" name="konversi" id="konversi"
                    class="form-control @error('konversi') is-invalid @enderror"
                    value="{{ old('konversi') }}" required>
                @error('konversi') <div class="invalid-feedback">⚠️ {{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label for="tanggal" class="form-label">📅 Tanggal</label>
                <input type="date" name="tanggal" id="tanggal"
                    class="form-control @error('tanggal') is-invalid @enderror"
                    value="{{ old('tanggal') }}" required>
                @error('tanggal') <div class="invalid-feedback">⚠️ {{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label for="id_platform" class="form-label">🌐 ID Platform</label>
                <input type="number" name="id_platform" id="id_platform"
                    class="form-control @error('id_platform') is-invalid @enderror"
                    value="{{ old('id_platform') }}" required>
                @error('id_platform') <div class="invalid-feedback">⚠️ {{ $message }}</div> @enderror
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('performa.index') }}" class="btn btn-outline-secondary">← Kembali</a>
                <button type="submit" class="btn btn-primary">💾 Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection
