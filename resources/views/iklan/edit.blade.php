@extends('layouts.app')

@section('title', 'Edit Iklan')

@section('content')
<div class="card p-4 shadow-sm">
    <h2 class="mb-4">Edit Iklan</h2>

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

    <form action="{{ route('iklan.update', $iklan->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Nama Iklan</label>
            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama', $iklan->nama) }}" required>
            @error('nama')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Kategori</label>
            <input type="text" name="kategori" class="form-control @error('kategori') is-invalid @enderror" value="{{ old('kategori', $iklan->kategori) }}" required>
            @error('kategori')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Tanggal Peluncuran</label>
            <input type="date" name="tanggal_peluncuran" class="form-control @error('tanggal_peluncuran') is-invalid @enderror" value="{{ old('tanggal_peluncuran', $iklan->tanggal_peluncuran) }}" required>
            @error('tanggal_peluncuran')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Tanggal Selesai</label>
            <input type="date" name="tanggal_selesai" class="form-control @error('tanggal_selesai') is-invalid @enderror" value="{{ old('tanggal_selesai', $iklan->tanggal_selesai) }}" required>
            @error('tanggal_selesai')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="mb-3">
            <label class="form-label">ID Biaya Pemasaran</label>
            <input type="number" name="id_biaya_pemasaran" class="form-control @error('id_biaya_pemasaran') is-invalid @enderror" value="{{ old('id_biaya_pemasaran', $iklan->id_biaya_pemasaran) }}" required>
            @error('id_biaya_pemasaran')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="mb-3">
            <label class="form-label">ID Platform</label>
            <input type="number" name="id_platform" class="form-control @error('id_platform') is-invalid @enderror" value="{{ old('id_platform', $iklan->id_platform) }}" required>
            @error('id_platform')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('iklan.index') }}" class="btn btn-secondary ms-2">← Kembali</a>
    </form>
</div>
@endsection
