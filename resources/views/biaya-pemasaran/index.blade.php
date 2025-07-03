@extends('layouts.app')

@section('title', 'Daftar Biaya Pemasaran')

@section('content')
<div class="container mt-5">

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

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-2">
        <h2 class="fw-bold text-primary-emphasis">💸 Daftar Biaya Pemasaran</h2>
        <a href="{{ route('biaya-pemasaran.create') }}" class="btn btn-primary rounded-pill fw-semibold shadow-sm">
            ➕ Tambah Biaya
        </a>
    </div>

    {{-- Konten --}}
    @if ($biaya->isEmpty())
        <div class="alert alert-info text-center shadow-sm rounded-3">
            ℹ️ Belum ada data biaya pemasaran.
        </div>
    @else
        <ul class="list-group shadow-sm rounded-4 border border-light-subtle">
            @foreach ($biaya as $b)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        <span class="fw-semibold text-dark">
                            📅 Bulan: {{ \Carbon\Carbon::parse($b['bulan_berlaku'])->format('F Y') }}
                        </span><br>
                        💰 Total: <strong>Rp{{ number_format($b['total_anggaran']) }}</strong> <br>
                        📊 Status: <span class="badge bg-{{ $b['status'] === 'Aktif' ? 'success' : 'secondary' }}">{{ $b['status'] }}</span>
                    </div>
                    <div class="d-flex gap-2">
                        <a href="{{ route('biaya-pemasaran.show', $b['id']) }}" class="btn btn-sm btn-outline-info rounded-pill" title="Lihat">
                            🔍
                        </a>
                        <a href="{{ route('biaya-pemasaran.edit', $b['id']) }}" class="btn btn-sm btn-outline-warning rounded-pill" title="Edit">
                            ✏️
                        </a>
                        <form action="{{ route('biaya-pemasaran.destroy', $b['id']) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger rounded-pill" title="Hapus">
                                🗑️
                            </button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    @endif

    {{-- Tombol Kembali --}}
    <div class="mt-4">
        <a href="{{ url('/') }}" class="btn btn-outline-secondary rounded-pill shadow-sm">
            ← Kembali ke Homepage
        </a>
    </div>
</div>
@endsection
