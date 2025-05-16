@extends('layouts.app')

@section('title', 'Tambah Performa')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Tambah Performa Baru</h2>

    <form method="POST" action="{{ route('performa.store') }}">
        @csrf
        <div class="mb-3">
            <label class="form-label">Jumlah Tayang</label>
            <input type="number" name="jumlah_tayang" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Jumlah Klik</label>
            <input type="number" name="jumlah_klik" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Konversi</label>
            <input type="number" step="0.01" name="konversi" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Tanggal</label>
            <input type="date" name="tanggal" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">ID Platform</label>
            <input type="number" name="id_platform" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('performa.index') }}" class="btn btn-secondary ms-2">← Kembali ke daftar</a>
    </form>
</div>
@endsection
