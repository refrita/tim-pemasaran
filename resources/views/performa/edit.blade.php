@extends('layouts.app')

@section('title', 'Edit Performa')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Edit Performa</h2>

    <form method="POST" action="{{ route('performa.update', $performa['id']) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Jumlah Tayang</label>
            <input type="number" name="jumlah_tayang" class="form-control" value="{{ $performa['jumlah_tayang'] }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Jumlah Klik</label>
            <input type="number" name="jumlah_klik" class="form-control" value="{{ $performa['jumlah_klik'] }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Konversi</label>
            <input type="number" step="0.01" name="konversi" class="form-control" value="{{ $performa['konversi'] }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Tanggal</label>
            <input type="date" name="tanggal" class="form-control" value="{{ \Carbon\Carbon::parse($performa['tanggal'])->format('Y-m-d') }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">ID Platform</label>
            <input type="number" name="id_platform" class="form-control" value="{{ $performa['id_platform'] }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('performa.index') }}" class="btn btn-secondary ms-2">← Kembali ke daftar</a>
    </form>
</div>
@endsection
