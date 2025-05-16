@extends('layouts.app')

@section('title', 'Edit Platform')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Edit Platform</h2>

    <form action="{{ route('platform.update', $platform->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Nama Platform</label>
            <input type="text" name="nama_platform" value="{{ $platform->nama }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Jenis Platform</label>
            <input type="text" name="jenis_platform" value="{{ $platform->jenis }}" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('platform.index') }}" class="btn btn-secondary ms-2">← Kembali ke daftar</a>
    </form>
</div>
@endsection
