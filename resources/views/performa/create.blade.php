@extends('layouts.app')

@section('title', 'Tambah Performa')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Tambah Performa Baru</h2>

    {{-- Flash messages --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">
            <strong>{{ session('error') }}</strong>
            @if($errors->any())
                <ul class="mb-0">
                    @foreach($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
    @endif

    <form method="POST" action="{{ route('performa.store') }}">
        @csrf

        <div class="mb-3">
            <label class="form-label">Jumlah Tayang</label>
            <input
                type="number"
                name="jumlah_tayang"
                class="form-control @error('jumlah_tayang') is-invalid @enderror"
                value="{{ old('jumlah_tayang') }}"
            >
            @error('jumlah_tayang')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Jumlah Klik</label>
            <input
                type="number"
                name="jumlah_klik"
                class="form-control @error('jumlah_klik') is-invalid @enderror"
                value="{{ old('jumlah_klik') }}"
            >
            @error('jumlah_klik')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Konversi</label>
            <input
                type="number"
                step="0.01"
                name="konversi"
                class="form-control @error('konversi') is-invalid @enderror"
                value="{{ old('konversi') }}"
            >
            @error('konversi')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Tanggal</label>
            <input
                type="date"
                name="tanggal"
                class="form-control @error('tanggal') is-invalid @enderror"
                value="{{ old('tanggal') }}"
            >
            @error('tanggal')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">ID Platform</label>
            <input
                type="number"
                name="id_platform"
                class="form-control @error('id_platform') is-invalid @enderror"
                value="{{ old('id_platform') }}"
            >
            @error('id_platform')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('performa.index') }}" class="btn btn-secondary ms-2">← Kembali ke daftar</a>
    </form>
</div>
@endsection
