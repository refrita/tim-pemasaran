@extends('layouts.app')

@section('title', 'Edit Biaya Pemasaran')

@section('content')
<div class="container mt-5">
    <div class="mb-4 border-bottom pb-2 d-flex align-items-center gap-2">
        <h2 class="fw-bold text-primary-emphasis">✏️ Edit Biaya Pemasaran</h2>
    </div>

    {{-- Flash Error --}}
    @if (session('error'))
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
    <form action="{{ route('biaya-pemasaran.update', $biaya->id) }}" method="POST" class="shadow-sm p-4 rounded-4 border bg-light-subtle">
        @csrf
        @method('PUT')

        {{-- Total Anggaran --}}
        <div class="mb-3">
            <label class="form-label fw-semibold">💰 Total Anggaran</label>
            <input 
                type="number" 
                name="total_anggaran" 
                class="form-control @error('total_anggaran') is-invalid @enderror" 
                value="{{ old('total_anggaran', $biaya->total_anggaran) }}" 
                required
            >
            @error('total_anggaran')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Anggaran Tersedia --}}
        <div class="mb-3">
            <label class="form-label fw-semibold">📦 Anggaran Tersedia</label>
            <input 
                type="number" 
                name="anggaran_tersedia" 
                class="form-control @error('anggaran_tersedia') is-invalid @enderror" 
                value="{{ old('anggaran_tersedia', $biaya->anggaran_tersedia) }}" 
                required
            >
            @error('anggaran_tersedia')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Bulan Berlaku --}}
        <div class="mb-3">
            <label class="form-label fw-semibold">📅 Bulan Berlaku</label>
            <input 
                type="date" 
                name="bulan_berlaku" 
                class="form-control @error('bulan_berlaku') is-invalid @enderror" 
                value="{{ old('bulan_berlaku', \Carbon\Carbon::parse($biaya->bulan_berlaku)->format('Y-m-d')) }}" 
                required
            >
            @error('bulan_berlaku')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Status --}}
        <div class="mb-3">
            <label class="form-label fw-semibold">📊 Status</label>
            <input 
                type="text" 
                name="status" 
                class="form-control @error('status') is-invalid @enderror" 
                value="{{ old('status', $biaya->status) }}" 
                required
            >
            @error('status')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Tombol --}}
        <div class="d-flex justify-content-between mt-4">
            <a href="{{ route('biaya-pemasaran.index') }}" class="btn btn-outline-secondary rounded-pill shadow-sm">
                ← Batal
            </a>
            <button type="submit" class="btn btn-warning rounded-pill px-4 fw-semibold shadow-sm">
                🔄 Update
            </button>
        </div>
    </form>
</div>
@endsection
