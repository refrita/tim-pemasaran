@extends('layouts.app')

@section('title', 'Detail Iklan')

@section('content')
<div class="container mt-5">
    <div class="mb-4 border-bottom pb-2 d-flex align-items-center gap-2">
        <h2 class="fw-bold text-primary-emphasis">📢 Detail Iklan</h2>
    </div>

    {{-- Flash Messages --}}
    @if (session('success'))
        <div class="alert alert-success shadow-sm rounded-pill px-4 py-2 text-center text-dark fw-semibold">
            ✅ {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger shadow-sm rounded-pill px-4 py-2 text-center text-dark fw-semibold">
            ⚠️ {{ session('error') }}
        </div>
    @endif

    {{-- Detail Card --}}
    <div class="card shadow-sm rounded-4 border border-light-subtle mb-4">
        <div class="card-body">
            <p class="mb-2"><strong>🆔 ID:</strong> {{ $iklan->id }}</p>
            <p class="mb-2"><strong>📌 Nama Iklan:</strong> {{ $iklan->nama }}</p>
            <p class="mb-2"><strong>📂 Kategori:</strong> {{ $iklan->kategori }}</p>
            <p class="mb-2"><strong>🚀 Tanggal Peluncuran:</strong> {{ \Carbon\Carbon::parse($iklan->tanggal_peluncuran)->format('d M Y') }}</p>
            <p class="mb-2"><strong>🛑 Tanggal Selesai:</strong> {{ \Carbon\Carbon::parse($iklan->tanggal_selesai)->format('d M Y') }}</p>
            <p class="mb-2"><strong>💰 ID Biaya Pemasaran:</strong> {{ $iklan->id_biaya_pemasaran }}</p>
            <p class="mb-0"><strong>📱 ID Platform:</strong> {{ $iklan->id_platform }}</p>
        </div>
    </div>

    {{-- Tombol Aksi --}}
    <div class="d-flex flex-wrap gap-2">
        <a href="{{ route('iklan.edit', $iklan->id) }}" class="btn btn-warning rounded-pill px-4">
            ✏️ Edit
        </a>
        <form action="{{ route('iklan.destroy', $iklan->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger rounded-pill px-4">
                🗑️ Hapus
            </button>
        </form>
        <a href="{{ route('iklan.index') }}" class="btn btn-outline-secondary rounded-pill shadow-sm px-4">
            ← Kembali ke Daftar
        </a>
    </div>
</div>
@endsection
