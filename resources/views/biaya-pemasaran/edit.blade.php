@extends('layouts.app')

@section('title', 'Edit Biaya Pemasaran')

@section('content')
<div class="card p-4 shadow-sm">
    <h2 class="mb-4">Edit Biaya Pemasaran</h2>

    {{-- Pesan error dari session --}}
    @if (session('error'))
        <div class="alert alert-danger mb-3">{{ session('error') }}</div>
    @endif

    {{-- Validasi error --}}
    @if ($errors->any())
        <div class="alert alert-danger mb-3">
            <strong>Terjadi kesalahan:</strong>
            <ul class="mb-0">
                @foreach ($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('biaya-pemasaran.update', $biaya->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Total Anggaran</label>
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

        <div class="mb-3">
            <label class="form-label">Anggaran Tersedia</label>
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

        <div class="mb-3">
            <label class="form-label">Bulan Berlaku</label>
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

        <div class="mb-3">
            <label class="form-label">Status</label>
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

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('biaya-pemasaran.index') }}" class="btn btn-secondary ms-2">← Kembali</a>
    </form>
</div>
@endsection
