@extends('layouts.app')

@section('title', 'Detail Biaya Pemasaran')

@section('content')
<div class="container mt-5">
    <div class="mb-4 border-bottom pb-2 d-flex align-items-center gap-2">
        <h2 class="fw-bold text-primary-emphasis">💼 Detail Biaya Pemasaran</h2>
    </div>

    {{-- Flash Message --}}
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

    {{-- Card Detail --}}
    <div class="card shadow-sm rounded-4 border border-light-subtle mb-4">
        <div class="card-body">
            <p class="mb-2"><strong>🆔 ID:</strong> {{ $biaya->id }}</p>
            <p class="mb-2"><strong>💰 Total Anggaran:</strong> Rp{{ number_format($biaya['total_anggaran']) }}</p>
            <p class="mb-2"><strong>📦 Anggaran Tersedia:</strong> Rp{{ number_format($biaya['anggaran_tersedia']) }}</p>
            <p class="mb-2"><strong>📅 Bulan Berlaku:</strong> {{ \Carbon\Carbon::parse($biaya['bulan_berlaku'])->format('F Y') }}</p>
            <p class="mb-0">
                <strong>📊 Status:</strong>
                <span class="badge bg-{{ $biaya['status'] === 'Aktif' ? 'success' : 'secondary' }}">
                    {{ $biaya['status'] }}
                </span>
            </p>
        </div>
    </div>

    {{-- Aksi --}}
    <div class="d-flex flex-wrap gap-2">
        <a href="{{ route('biaya-pemasaran.edit', $biaya->id) }}" class="btn btn-warning rounded-pill px-4">
            ✏️ Edit
        </a>
        <form action="{{ route('biaya-pemasaran.destroy', $biaya->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger rounded-pill px-4">
                🗑️ Hapus
            </button>
        </form>
        <a href="{{ route('biaya-pemasaran.index') }}" class="btn btn-outline-secondary rounded-pill px-4 shadow-sm">
            ← Kembali ke Daftar
        </a>
    </div>
</div>
@endsection
