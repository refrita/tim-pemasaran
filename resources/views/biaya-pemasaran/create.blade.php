@extends('layouts.app')

@section('title', 'Tambah Biaya Pemasaran')

@section('content')
<div class="card p-4 shadow-sm">
    <h2 class="mb-4">Tambah Biaya Pemasaran</h2>

    {{-- Success message --}}
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- General error alert --}}
    @if (session('error'))
        <div class="alert alert-danger">
            <strong>{{ session('error') }}</strong>
            @if ($errors->any())
                <ul class="mb-0">
                    @foreach ($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            @endif
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
