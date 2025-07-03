@extends('layouts.app')

@section('title', 'Tambah Iklan')

@section('content')
<div class="container mt-5">
    <div class="mb-4 border-bottom pb-2 d-flex align-items-center gap-2">
        <h2 class="fw-bold text-primary-emphasis">➕ Tambah Iklan Baru</h2>
    </div>

    {{-- Flash Error --}}
    @if(session('error'))
        <div class="alert alert-danger shadow-sm rounded-pill px-4 py-2 text-center text-dark fw-semibold">
            ⚠️ {{ session('error') }}
        </div>
    @endif

    {{-- Validasi --}}
    @if($errors->any())
        <div class="alert alert-danger rounded-3 shadow-sm">
            <strong>Terjadi kesalahan:</strong>
            <ul class="mb-0 mt-1">
                @foreach($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Form --}}
    <form method="POST" action="{{ route('iklan.store') }}" class="shadow-sm p-4 rounded-4 border bg-light-subtle">
        @csrf

        {{-- Nama Iklan --}}
        <div class="mb-3">
            <label class="form-label fw-semibold">📌 Nama Iklan</label>
            <input
                type="text"
                name="nama"
                class="form-control @error('nama') is-invalid @enderror"
                value="{{ old('nama') }}"
                required
            >
            @error('nama')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Kategori --}}
        <div class="mb-3">
            <label class="form-label fw-semibold">📂 Kategori</label>
            <input
                type="text"
                name="kategori"
                class="form-control @error('kategori') is-invalid @enderror"
                value="{{ old('kategori') }}"
                required
            >
            @error('kategori')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Tanggal Peluncuran --}}
        <div class="mb-3">
            <label class="form-label fw-semibold">🚀 Tanggal Peluncuran</label>
            <input
                type="date"
                name="tanggal_peluncuran"
                class="form-control @error('tanggal_peluncuran') is-invalid @enderror"
                value="{{ old('tanggal_peluncuran') }}"
                required
            >
            @error('tanggal_peluncuran')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Tanggal Selesai --}}
        <div class="mb-3">
            <label class="form-label fw-semibold">🛑 Tanggal Selesai</label>
            <input
                type="date"
                name="tanggal_selesai"
                class="form-control @error('tanggal_selesai') is-invalid @enderror"
                value="{{ old('tanggal_selesai') }}"
                required
            >
            @error('tanggal_selesai')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- ID Biaya Pemasaran --}}
        <div class="mb-3">
            <label class="form-label fw-semibold">💰 ID Biaya Pemasaran</label>
            <input
                type="number"
                name="id_biaya_pemasaran"
                class="form-control @error('id_biaya_pemasaran') is-invalid @enderror"
                value="{{ old('id_biaya_pemasaran') }}"
                required
            >
            @error('id_biaya_pemasaran')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- ID Platform --}}
        <div class="mb-3">
            <label class="form-label fw-semibold">📱 ID Platform</label>
            <input
                type="number"
                name="id_platform"
                class="form-control @error('id_platform') is-invalid @enderror"
                value="{{ old('id_platform') }}"
                required
            >
            @error('id_platform')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Tombol --}}
        <div class="d-flex justify-content-between mt-4">
            <a href="{{ route('iklan.index') }}" class="btn btn-outline-secondary rounded-pill shadow-sm">
                ← Batal
            </a>
            <button type="submit" class="btn btn-primary rounded-pill px-4 fw-semibold shadow-sm">
                💾 Tambah
            </button>
        </div>
    </form>
</div>
@endsection