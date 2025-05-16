@extends('layouts.app')

@section('title', 'Edit Iklan')

@section('content')
<div class="card p-4 shadow-sm">
    <h2 class="mb-4">Edit Iklan</h2>

    <form action="{{ route('iklan.update', $iklan->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Nama Iklan</label>
            <input type="text" name="nama" class="form-control" value="{{ $iklan->nama }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Kategori</label>
            <input type="text" name="kategori" class="form-control" value="{{ $iklan->kategori }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Tanggal Peluncuran</label>
            <input type="date" name="tanggal_peluncuran" class="form-control" value="{{ $iklan->tanggal_peluncuran }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Tanggal Selesai</label>
            <input type="date" name="tanggal_selesai" class="form-control" value="{{ $iklan->tanggal_selesai }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">ID Biaya Pemasaran</label>
            <input type="number" name="id_biaya_pemasaran" class="form-control" value="{{ $iklan->id_biaya_pemasaran }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">ID Platform</label>
            <input type="number" name="id_platform" class="form-control" value="{{ $iklan->id_platform }}" required>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('iklan.index') }}" class="btn btn-secondary ms-2">← Kembali</a>
    </form>
</div>
@endsection
