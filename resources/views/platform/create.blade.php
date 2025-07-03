@extends('layouts.app')

@section('title', 'Tambah Platform')

@section('content')
<div class="container mt-5">
    <div class="mb-4 border-bottom pb-2 d-flex align-items-center gap-2">
        <h2 class="fw-bold text-primary-emphasis">➕ Tambah Platform Baru</h2>
    </div>

    {{-- Flash Error --}}
    @if(session('error'))
        <div class="alert alert-danger shadow-sm rounded-pill px-4 py-2 text-center text-dark fw-semibold">
            ⚠️ {{ session('error') }}
        </div>
    @endif

    {{-- Validation Errors --}}
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
    <form method="POST" action="{{ route('platform.store') }}" class="shadow-sm p-4 rounded-4 border bg-light-subtle">
        @csrf

        {{-- Nama Platform --}}
        <div class="mb-3">
            <label class="form-label fw-semibold">📛 Nama Platform</label>
            <input type="text" name="nama_platform" 
                   class="form-control @error('nama_platform') is-invalid @enderror" 
                   value="{{ old('nama_platform') }}" required>
            @error('nama_platform')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Jenis Platform --}}
        <div class="mb-3">
            <label class="form-label fw-semibold">📂 Jenis Platform</label>
            <input type="text" name="jenis_platform" 
                   class="form-control @error('jenis_platform') is-invalid @enderror" 
                   value="{{ old('jenis_platform') }}" required>
            @error('jenis_platform')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Tombol --}}
        <div class="d-flex justify-content-between mt-4">
            <a href="{{ route('platform.index') }}" class="btn btn-outline-secondary rounded-pill shadow-sm">
                ← Kembali
            </a>
            <button type="submit" class="btn btn-primary rounded-pill px-4 fw-semibold shadow-sm">
                💾 Simpan
            </button>
        </div>
    </form>
</div>
@endsection
