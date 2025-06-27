@extends('layouts.app')

@section('title', 'Tambah Biaya Pemasaran')

@section('content')
<div class="card p-4 shadow-sm">
    <h2 class="mb-4">Tambah Biaya Pemasaran</h2>

    {{-- Tampilkan pesan error dari session jika ada --}}
    @if (session('error'))
        <div class="alert alert-danger mb-3">
            {{ session('error') }}
        </div>
    @endif

    {{-- Tampilkan daftar error validasi --}}
    @if ($errors->any())
        <div class="alert alert-danger mb-3">
            <strong>Terjadi kesalahan:</strong>
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('biaya-pemasaran.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Total Anggaran</label>
            <input 
                type="number" 
                name="total_anggaran" 
                class="form-control @error('total_anggaran') is-invalid @enderror" 
                value="{{ old('total_anggaran') }}"
                required
            >
            @error('total_anggaran')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Anggaran Tersedia</label>
            <input 
                type="number" 
                name="anggaran_tersedia" 
                class="form-control @error('anggaran_tersedia') is-invalid @enderror" 
                value="{{ old('anggaran_tersedia') }}"
                required
            >
            @error('anggaran_tersedia')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Bulan Berlaku</label>
            <input 
                type="date" 
                name="bulan_berlaku" 
                class="form-control @error('bulan_berlaku') is-invalid @enderror" 
                value="{{ old('bulan_berlaku') }}"
                required
            >
            @error('bulan_berlaku')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Status</label>
            <input 
                type="text" 
                name="status" 
                class="form-control @error('status') is-invalid @enderror" 
                value="{{ old('status') }}"
                required
            >
            @error('status')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('biaya-pemasaran.index') }}" class="btn btn-secondary ms-2">← Kembali</a>
    </form>
</div>
@endsection
