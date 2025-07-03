@extends('layouts.app')

@section('title', 'Daftar Iklan')

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
        <h2 class="fw-bold text-primary-emphasis">📢 Daftar Iklan</h2>
        <a href="{{ route('iklan.create') }}" class="btn btn-primary rounded-pill fw-semibold shadow-sm">
            ➕ Tambah Iklan
        </a>
    </div>

    {{-- List Iklan --}}
    @if($iklans->isEmpty())
        <div class="alert alert-info text-center shadow-sm rounded-3">
            ℹ️ Belum ada data iklan.
        </div>
    @else
        <div class="list-group shadow-sm rounded-4 border border-light-subtle">
            @foreach ($iklans as $i)
                <div class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        <span class="fw-semibold text-dark">📌 {{ $i->nama }}</span><br>
                        <small class="text-muted">📂 Kategori: {{ $i->kategori }}</small>
                    </div>
                    <div class="d-flex gap-2">
                        <a href="{{ route('iklan.show', $i->id) }}" class="btn btn-sm btn-outline-info rounded-pill" title="Lihat">
                            🔍
                        </a>
                        <a href="{{ route('iklan.edit', $i->id) }}" class="btn btn-sm btn-outline-warning rounded-pill" title="Edit">
                            ✏️
                        </a>
                        <form action="{{ route('iklan.destroy', $i['id']) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger rounded-pill" title="Hapus">
                                🗑️
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

    {{-- Tombol Kembali --}}
    <div class="mt-4">
        <a href="{{ url('/') }}" class="btn btn-outline-secondary rounded-pill shadow-sm">
            ← Kembali
        </a>
    </div>
</div>
@endsection