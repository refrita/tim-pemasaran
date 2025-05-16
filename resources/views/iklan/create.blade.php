@extends('layouts.app')

@section('title', 'Tambah Iklan')

@section('content')
<div class="card p-4 shadow-sm">
    <h2 class="mb-4">Tambah Iklan Baru</h2>

    <form method="POST" action="{{ route('iklan.store') }}">
        @csrf
        <div class="mb-3">
            <label class="form-label">Nama Iklan</label>
            <input type="text" name="nama" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Kategori</label>
            <input type="text" name="kategori" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Tanggal Peluncuran</label>
            <input type="date" name="tanggal_peluncuran" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Tanggal Selesai</label>
            <input type="date" name="tanggal_selesai" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">ID Biaya Pemasaran</label>
            <input type="number" name="id_biaya_pemasaran" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">ID Platform</label>
            <input type="number" name="id_platform" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Tambah</button>
        <a href="{{ route('iklan.index') }}" class="btn btn-secondary ms-2">← Kembali</a>
    </form>
</div>
@endsection
